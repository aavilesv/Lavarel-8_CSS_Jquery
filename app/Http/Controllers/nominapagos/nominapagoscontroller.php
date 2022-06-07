<?php

namespace App\Http\Controllers\nominapagos;

use App\Http\Controllers\Controller;
use App\Http\Requests\nominapagos\nominarequest;
use App\Models\Cliente;
use App\Models\nominapagos\Nominapago;
use App\Models\recursoshumanos\Rrhempleado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class nominapagoscontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request) {
            $nominas = "";
            $nominass = Nominapago::paginate(10);
            $buscarincial = "" . $request->fechainicial;
            $buscarfinal = "" . $request->fechafinal;
            if (isset($_GET['fechainicial']) and isset($_GET['fechafinal']) ) {
                if ($buscarincial  != $buscarfinal) {
                    $nominas = Nominapago::whereBetween('created_at',
                     [$request->fechainicial, $request->fechafinal])
                    ->orderBy('id', 'asc')->paginate(4);
                }else
                {
                    $nominas = Nominapago::whereDate('created_at','=', $request->fechafinal)
                    ->paginate(4);
                
                }
               
                    
            }
            if ($request->apellido) {
                //$clientes = Cliente::where('apellido', 'LIKE', '%' . $request->apellido . '%')->get();
                //return $clientes;
                
                $nominass = Nominapago::join('rrhempleados','rrhempleados.id','=','nominapagos.rrhempleado_id')
                    ->where('rrhempleados.apellido', 'LIKE','%'.$request->apellido.'%')->paginate(4);

                   
                // $nominas =DB::table('nominapagos')->join('rrhempleados','nominapagos.rrhempleado_id','=','rrhempleados.id')
                //where('rrhempleado.apellido', 'LIKE','%'.$request->apellido.'%')
                // ->orderBy('id','desc')->paginate(10);
            }

            return view('nominapagos.index', compact('nominass','nominas', 'buscarincial', 'buscarfinal'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clientes = Rrhempleado::where('eliminar', '=', 1)->get();

        return view('nominapagos.create', compact('clientes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(nominarequest $request)
    {

        try {
            DB::beginTransaction();
            $rrhempleado = Nominapago::Create($request->all());
            if ($request->archivo) {
                $image = $request->file('archivo')->store('public/rolpago/empleado');
                $url = Storage::url($image);
                $rrhempleado->archivo = $url;
            }
            $rrhempleado->save();
            DB::commit();
            return redirect()->route('nominapago.index');
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $clientes = Rrhempleado::where('eliminar', '=', 1)->get();
        $nominas=Nominapago::find($id);
        return view('nominapagos.edit', compact('clientes','nominas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(nominarequest $request, $id)
    {
        try {
            DB::beginTransaction();
            $rrhempleado = Nominapago::find($id);
              
            $rrhempleado->update($request->all());
            if ($request->ffoto) {
                if ($rrhempleado->ffoto) {
                    $cade = str_replace('storage', 'public', $rrhempleado->ffoto);
                    Storage::delete($cade);
                }
              
                
                $image = $request->file('ffoto')->store('public/rolpago/empleado');
                $url = Storage::url($image);
                $rrhempleado->ffoto = $url;
            }
            $rrhempleado->save();
            DB::commit();
            return redirect()->route('rhempleados.index');
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
    public function destroy($id)
    {
        //
    }
}
