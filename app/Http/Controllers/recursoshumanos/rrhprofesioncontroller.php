<?php

namespace App\Http\Controllers\recursoshumanos;

use App\Http\Controllers\Controller;
use App\Models\recursoshumanos\Rrhprofesion;
use Illuminate\Http\Request;

class rrhprofesioncontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $profesiones = Rrhprofesion::all();
        return view('rhprofesiones.index',compact('profesiones'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('rhprofesiones.create');
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
            'descripcion'=>'required']);
            //
            try {
    
               
                    $profesion =new Rrhprofesion();
                    $profesion->descripcion=$request->descripcion;
                    $profesion->save();
              return redirect()->route('rhprofesiones.index');
             
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
    public function edit($profesion)
    {
        $rhprofesion = Rrhprofesion::find($profesion);
        return view('rhprofesiones.edit', compact('rhprofesion'));
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
            'descripcion'=>'required']);
        try {
       
        
                $rhprofesion = Rrhprofesion::find($id);
                $rhprofesion->descripcion=$request->descripcion;
                $rhprofesion->save();
          return redirect()->route('rhprofesiones.index');
         
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
