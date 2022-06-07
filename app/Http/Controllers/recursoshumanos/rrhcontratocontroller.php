<?php

namespace App\Http\Controllers\recursoshumanos;

use App\Http\Controllers\Controller;
use App\Models\recursoshumanos\Rrhcontrato;
use App\Models\recursoshumanos\Rrhempleado;
use App\Models\recursoshumanos\Rrhtipocontrato;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class rrhcontratocontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $rrhcontrato = Rrhcontrato::all();
        return view('rhcontratos.index',compact('rrhcontrato'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $empleados = Rrhempleado::where('eliminar', '=', 1)->get();
        $tipocontrato = Rrhtipocontrato::all();
        return view('rhcontratos.create',compact('empleados','tipocontrato'));
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
            'descripcion'=>'required',
         'rrhempleado_id'=>'required'
         ,'rrhtipocontrato_id'=>'required',
         'sueldo'=>'required']);
        try {
            DB::beginTransaction();
            $rrhcontrato = Rrhcontrato::Create($request->all());
            if ($request->archivo) {
                $image = $request->file('archivo')->store('public/archivos/contratos');
                $url = Storage::url($image);
                $rrhcontrato->archivo = $url;
            }
            $rrhcontrato->save();
            DB::commit();
            return redirect()->route('rhcontratos.index');
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
        //
        $empleados = Rrhempleado::where('eliminar', '=', 1)->get();
        $tipocontrato = Rrhtipocontrato::all();
        $rrhcontrato = Rrhcontrato::find($id);
        return view('rhcontratos.edit',compact('rrhcontrato','empleados','tipocontrato'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {  $request->validate([
        'descripcion'=>'required',
     'rrhempleado_id'=>'required'
     ,'rrhtipocontrato_id'=>'required',
     'sueldo'=>'required']);
        
        try {
            DB::beginTransaction();
            $rrhcontrato = Rrhcontrato::find($id);
            //    Storage::deleteDirectory($rrhcontrato->archivo);

            $rrhcontrato->update($request->all());
            if ($request->archivo) {
                if ($rrhcontrato->archivo) {
                    $cade = str_replace('storage', 'public', $rrhcontrato->archivo);
                    Storage::delete($cade);
               
                }

               
                
                $image = $request->file('archivo')->store('public/archivos/contratos');
                $url = Storage::url($image);
                $rrhcontrato->archivo = $url;
            }
            $rrhcontrato->save();
            DB::commit();
            return redirect()->route('rhcontratos.index');
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
