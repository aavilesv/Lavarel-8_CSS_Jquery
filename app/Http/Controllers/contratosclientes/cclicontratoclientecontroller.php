<?php

namespace App\Http\Controllers\contratosclientes;

use App\Http\Controllers\Controller;
use App\Http\Requests\contratosclientes\contratoclientestore;
use App\Models\Cliente;
use App\Models\Cliente\Canton;
use App\Models\contratosclientes\Cclicontratocliente;
use App\Models\contratosclientes\Cclicontratotipocliente;
use App\Models\Promocion\Promociondetalle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class cclicontratoclientecontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        DB::beginTransaction();
        try {

            $buscador = "" . $request->buscador;
            $buscarincial = "" . $request->fechainicial;
            $buscarfinal = "" . $request->fechafinal;
            $rrhcontrato = Cclicontratocliente::select('id','direccion','cdaorecinto','sector','tipodevivienda','contacto','contacto1','cclicontratotipocliente_id','canton_id','cliente_id','ffoto','archivo','eliminar','contratocodigo','fecha','tarifa','created_at','eliminar'
            )->orderBy('id')->paginate(8);
            if (isset($_GET['fechainicial']) and isset($_GET['fechafinal']) ) {
                if ($buscarincial  != $buscarfinal) {
                    $rrhcontrato = Cclicontratocliente::whereBetween('fecha',
                     [$request->fechainicial, $request->fechafinal])->
                     select(
                        'id',
                        'direccion',
                        'cdaorecinto',
                        'sector',
                        'tipodevivienda',
                        'contacto',
                        'contacto1',
                        'cclicontratotipocliente_id',
                        'canton_id',
                        'cliente_id',
                        'ffoto',
                        'archivo',
                        'contratocodigo',
                        'fecha',
                        'tarifa',
                        'eliminar',
                        'created_at',
                        'eliminar'
                    )->orderBy('id')->paginate(8);
                }else
                {
                    $rrhcontrato = Cclicontratocliente::whereDate('fecha','=', $request->fechafinal)
                    ->
                     select(
                        'id',
                        'direccion',
                        'cdaorecinto',
                        'sector',
                        'tipodevivienda',
                        'contacto',
                        'contacto1',
                        'cclicontratotipocliente_id',
                        'canton_id',
                        'cliente_id',
                        'ffoto',
                        'archivo',
                        'contratocodigo',
                        'fecha',
                        'tarifa',
                        'eliminar',
                        'created_at',
                        'eliminar'
                    )->orderBy('id')->paginate(8);;
                }
            }
            if (isset($_GET['buscador'])) {
    
                $rrhcontrato = Cclicontratocliente::
                join('cantons', 'cantons.id', '=', 'cclicontratoclientes.canton_id')
                ->join('clientes', 'clientes.id', '=', 'cclicontratoclientes.cliente_id')
                ->join('cclicontratotipoclientes', 'cclicontratotipoclientes.id', '=',
                 'cclicontratoclientes.cclicontratotipocliente_id')
                 ->join('provincias', 'provincias.id', '=',
                 'cantons.provincia_id')
                    ->where('estado', '=', 1)
                    ->where('cantons.name', 'LIKE', '%' . $request->buscador . '%')
                    ->orWhere('clientes.nombre', 'LIKE', '%' . $request->buscador . '%')
                    ->orWhere('clientes.apellido', 'LIKE', '%' . $request->buscador . '%')
                    ->orWhere('clientes.cedula', 'LIKE', '%' . $request->buscador . '%')
                    ->orWhere('cclicontratotipoclientes.descripcion', 'LIKE', '%' . $request->buscador . '%')
                    ->orWhere('clientes.email', 'LIKE', '%' . $request->buscador . '%')
                    ->orWhere('provincias.name', 'LIKE', '%' . $request->buscador . '%')
                    ->orWhere('cclicontratoclientes.contratocodigo', 'LIKE', '%' . $request->buscador . '%')
                    ->orWhere('cclicontratoclientes.tipodeservicio', 'LIKE', '%' . $request->buscador . '%')
                    ->orWhere('cclicontratoclientes.modalidadequipo', 'LIKE', '%' . $request->buscador . '%')
                    ->orWhere('cclicontratoclientes.anchodebanda', 'LIKE', '%' . $request->buscador . '%')
                    ->
                    select(
                        'cclicontratoclientes.id',
                        'cclicontratoclientes.direccion',
                        'cclicontratoclientes.cdaorecinto',
                        'cclicontratoclientes.sector',
                        'cclicontratoclientes.tipodevivienda',
                        'cclicontratoclientes.contacto',
                        'cclicontratoclientes.contacto1',
                        'cclicontratoclientes.cclicontratotipocliente_id',
                        'cclicontratoclientes.canton_id',
                        'cclicontratoclientes.cliente_id',
                        'cclicontratoclientes.ffoto',
                        'cclicontratoclientes.archivo',
                        'cclicontratoclientes.contratocodigo',
                        'cclicontratoclientes.fecha',
                        'cclicontratoclientes.tarifa',
                        'cclicontratoclientes.eliminar',
                        'cclicontratoclientes.created_at',
                        'cclicontratoclientes.eliminar'
                    )->orderBy('cclicontratoclientes.id')->
                    paginate(8);
                    
            }
         
            DB::commit();
            return view('cclicontratoclientes.index', compact('rrhcontrato', 'buscador','buscarincial','buscarfinal'));
         
        } catch (\Exception $exception) {
            DB::rollback();
            return  redirect()->back()->with('error', "Error" . $exception->getMessage());
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cantons = Canton::all();
        $clientes = Cliente::where('eliminar', '=', 1)->get();
        $tipocontrato = Cclicontratotipocliente::all();
        return view('cclicontratoclientes.create', compact('cantons', 'clientes', 'tipocontrato'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(contratoclientestore $request)
    {
        
        DB::beginTransaction();
        try {
           
            $rrhcontrato = Cclicontratocliente::Create($request->all());
            
            if ($request->archivo) {
                $image = $request->file('archivo')->store('public/clientes/contratos');
                $url = Storage::url($image);
                $rrhcontrato->archivo = $url;
            }
         
            if ($request->ffoto) {
                $image = $request->file('ffoto')->store('public/clientes/vivienda');
                $url = Storage::url($image);
                $rrhcontrato->ffoto = $url;
            }
            $rrhcontrato->save();
            if ($request->promocion_id) {
                Promociondetalle::Create([
                   'promocion_id'=>$request->promocion_id
                   ,'cclicontratocliente_id'=>$rrhcontrato->id
               ]);
            }
            DB::commit();
            return redirect()->route('contratoclientes.index');
        } catch (\Exception $exception) {
            DB::rollback();
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
       
        $cantons = Canton::all();
        $clientes = Cliente::where('eliminar', '=', 1)->get();
        $tipocontrato = Cclicontratotipocliente::all();
        $Cclicontratocliente = Cclicontratocliente::find($id);
        return view('cclicontratoclientes.show', compact('Cclicontratocliente', 'cantons', 'clientes', 'tipocontrato'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cantons = Canton::all();
        $clientes = Cliente::where('eliminar', '=', 1)->get();
        $tipocontrato = Cclicontratotipocliente::all();
        $Cclicontratocliente = Cclicontratocliente::find($id);
        return view('cclicontratoclientes.edit', compact('Cclicontratocliente', 'cantons', 'clientes', 'tipocontrato'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(contratoclientestore $request, $id)
    {   DB::beginTransaction();
        try {

         
            $rrhcontrato = Cclicontratocliente::find($id);
            $rrhcontrato->update($request->all());

            if ($request->archivo) {
                if ($rrhcontrato->archivo) {
                    $cade = str_replace('storage', 'public', $rrhcontrato->archivo);
                    Storage::delete($cade);
                }

                $image = $request->file('archivo')->store('public/clientes/contratos');
                $url = Storage::url($image);
                $rrhcontrato->archivo = $url;
            }
            if ($request->ffoto) {
                if ($rrhcontrato->ffoto) {
                    $cade = str_replace('storage', 'public', $rrhcontrato->ffoto);
                    Storage::delete($cade);
                }

                $image = $request->file('ffoto')->store('public/clientes/vivienda');
                $url = Storage::url($image);
                $rrhcontrato->ffoto = $url;
            }
            $rrhcontrato->save();
            DB::commit();
            return redirect()->route('contratoclientes.index');
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
        $Cclicontratocliente = Cclicontratocliente::find($id);
        $r=$Cclicontratocliente->eliminar;
        if($r==0){
            $r=1;
        }else{
            $r=0;
        }
        
        $Cclicontratocliente->eliminar = $r;
      
        $Cclicontratocliente->save();

        return  redirect()->route('contratoclientes.index');
    }
}
