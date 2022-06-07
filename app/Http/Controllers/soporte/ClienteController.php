<?php

namespace App\Http\Controllers\soporte;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCliente;
use App\Models\Cliente;
use App\Models\Cliente\Canton;
use App\Models\contratosclientes\Cclicontratocliente;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use PDF;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $buscador=$request->buscador;
        $clientes = DB::table('clientes')->where("eliminar", "=", 1)
        ->select('id','nombre','apellido','cedula','fechanacimiento'
        ,'email','estadocivil','sexo','eliminar','ffoto','fotocedula2')->get();
        
        $clientes = Cliente::where("eliminar", "=", 1)
        ->select('id','nombre','apellido','cedula','fechanacimiento'
        ,'email','estadocivil','sexo','eliminar','ffoto','fotocedula2')->paginate(10);
        if (isset($_GET['buscador']) !="" ) {
                $clientes = Cliente::
                where('nombre', 'LIKE','%'.$request->buscador.'%')
                ->where("eliminar", "=", 1)
                ->orWhere('apellido', 'LIKE','%'.$request->buscador.'%')
                ->orWhere('cedula', 'LIKE','%'.$request->buscador.'%')
                ->orWhere('email', 'LIKE','%'.$request->buscador.'%')
                ->select('id','nombre','apellido','cedula','fechanacimiento'
        ,'email','estadocivil','sexo','eliminar','ffoto','fotocedula2')->paginate(10);
        }
        return view('clientes.index', compact('clientes','buscador'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //$clientes = Cliente::where('eliminar','=',1)->get();
        $action = "new";
        $cantons = Canton::all();
        return view('clientes.create', compact('cantons', 'action'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCliente $request)
    {

        try {

            
         
            //  $request->foto=$url;

            $cliente = Cliente::Create($request->all());
            if ($request->ffoto) {
                $image = $request->file('ffoto')->store('public/image');
                $url = Storage::url($image);
                $cliente->ffoto = $url;
            }
            if ($request->fotocedula2) {
                $image = $request->file('fotocedula2')->store('public/image/cedula');
                $url = Storage::url($image);
                $cliente->fotocedula2 = $url;
            }
            
            $cliente->save();
            return redirect()->route('clientes.index');
        } catch (\Exception $exception) {
            return  redirect()->back()->with('error', "Error" . $exception->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $action = "show";
        $cliente = Cliente::find($id);
        return view('clientes.show', compact('cliente'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Cliente $cliente)
    {
        $action = "edit";
        $cantons = Canton::all();
        return view('clientes.edit', compact('cliente', 'action', 'cantons'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreCliente $request, Cliente $cliente)
    {
        try {

            DB::beginTransaction();
           // Storage::deleteDirectory($cliente->ffoto);
            $cliente->update($request->all());
            if ($request->ffoto) {
                 if ($cliente->ffoto) {
                          $cade = str_replace('storage', 'public', $cliente->ffoto);
                          Storage::delete($cade);
                 }

                    $image = $request->file('ffoto')->store('public/image');
                $url = Storage::url($image);
                $cliente->ffoto = $url;
            }
            if ($request->fotocedula2) {
                if ($cliente->fotocedula2) {
                         $cade = str_replace('storage', 'public', $cliente->fotocedula2);
                         Storage::delete($cade);
                }
                   $image = $request->file('fotocedula2')->store('public/image/cedula');
               $url = Storage::url($image);
               $cliente->fotocedula2 = $url;
           }
          

            // $cliente->fcedula1=$urll;
            //$cliente->fcedula2=$urlll;
            $cliente->save();
            DB::commit();
            return redirect()->route('clientes.index');
        } catch (\Exception $exception) {
            DB::rollback();
            return  redirect()->back()->with('error', "Error" . $exception->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {

        $id = $request->get('id');
        $Cliente = Cliente::find($id);
        $Cliente->eliminar = 0;
        $Cliente->save();

        return  redirect()->route('clientes.index');
    }
}
