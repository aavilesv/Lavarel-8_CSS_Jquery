<?php

namespace App\Http\Controllers\recursoshumanos;

use App\Http\Controllers\Controller;
use App\Models\recursoshumanos\Rrhcargafamiliar;
use App\Models\recursoshumanos\Rrhempleado;
use Illuminate\Http\Request;

class rrhcargafamiliarcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $carga = Rrhcargafamiliar::all();
        return view('rhcargafamiliars.index',compact('carga'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
        $empleados = Rrhempleado::where('eliminar', '=', 1)->get();
       
        return view('rhcargafamiliars.create',compact('empleados'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre'=>'required',
         'rrhempleado_id'=>'required'
         ,'parentezco'=>'required',
         'fechanacimiento'=>'required']);
         try {

                $cargos =new Rrhcargafamiliar();
                $cargos->nombre=$request->nombre;
                $cargos->rrhempleado_id=$request->rrhempleado_id;
                $cargos->parentezco=$request->parentezco;
                $cargos->fechanacimiento=$request->fechanacimiento;
                $cargos->save();
          return redirect()->route('rhcargafamiliar.index');
         
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
        $empleados = Rrhempleado::where('eliminar', '=', 1)->get();
        $rrhcargafamiliar = Rrhcargafamiliar::find($id);
        return view('rhcargafamiliars.edit',compact('rrhcargafamiliar','empleados'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre'=>'required',
         'rrhempleado_id'=>'required'
         ,'parentezco'=>'required',
         'fechanacimiento'=>'required']);
         try {

            $cargos = Rrhcargafamiliar::find($id);
                $cargos->nombre=$request->nombre;
                $cargos->rrhempleado_id=$request->rrhempleado_id;
                $cargos->parentezco=$request->parentezco;
                $cargos->fechanacimiento=$request->fechanacimiento;
                $cargos->save();
          return redirect()->route('rhcargafamiliar.index');
         
        } catch (\Exception $exception) {
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
