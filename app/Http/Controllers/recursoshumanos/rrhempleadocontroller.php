<?php

namespace App\Http\Controllers\recursoshumanos;

use App\Http\Controllers\Controller;
use App\Http\Requests\recursoshumanos\empleado;
use App\Models\Cliente\Canton;
use App\Models\recursoshumanos\Rrharea;
use App\Models\recursoshumanos\Rrhcargo;
use App\Models\recursoshumanos\Rrhempleado;
use App\Models\recursoshumanos\Rrhprofesion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;


class rrhempleadocontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $empleados = Rrhempleado::where('eliminar', '=', 1)->get();
        return view('rhempleados.index', compact('empleados'));
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
        $cargos = Rrhcargo::all();
        $profesiones = Rrhprofesion::all();
        $areas = Rrharea::all();
        return view('rhempleados.create', compact('cantons', 'action','cargos','profesiones','areas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(empleado $request)
    {
        //
        
        try {
            DB::beginTransaction();
            $rrhempleado = Rrhempleado::Create($request->all());
            if ($request->ffoto) {
                $image = $request->file('ffoto')->store('public/empleado');
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
        $action = "edit";
        $rrhempleado = Rrhempleado::find($id);  $cantons = Canton::all(); $cargos = Rrhcargo::all();
        $profesiones = Rrhprofesion::all(); $areas = Rrharea::all();
       
        return view('rhempleados.edit', compact('rrhempleado','cantons', 'action','cargos','profesiones','areas'));
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(empleado $request, $id)
    {
        
        try {
            DB::beginTransaction();
            $rrhempleado = Rrhempleado::find($id);
            $rrhempleado->update($request->all());
            if ($request->ffoto) {

                if ($rrhempleado->ffoto) {

                    $cade = str_replace('storage', 'public', $rrhempleado->ffoto);
                    Storage::delete($cade);
                }
                
                $image = $request->file('ffoto')->store('public/empleado');
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
    public function destroy(Request $request)
    {
        //
        $id = $request->get('id');
        $Cliente = Rrhempleado::find($id);
        $Cliente->eliminar = 0;
        $Cliente->save();

        return  redirect()->route('rhempleados.index');
    }
}
