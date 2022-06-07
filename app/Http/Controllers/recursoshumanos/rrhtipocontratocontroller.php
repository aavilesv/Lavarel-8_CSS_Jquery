<?php

namespace App\Http\Controllers\recursoshumanos;

use App\Http\Controllers\Controller;
use App\Models\recursoshumanos\Rrhtipocontrato;
use Illuminate\Http\Request;

class rrhtipocontratocontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $tipocontrato = Rrhtipocontrato::all();
        return view('rhtipocontratos.index',compact('tipocontrato'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('rhtipocontratos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'descripcion'=>'required']);
            //
            try {
    
               
                    $tipocontrato =new Rrhtipocontrato();
                    $tipocontrato->descripcion=$request->descripcion;
                    $tipocontrato->save();
              return redirect()->route('rhtipocontratos.index');
             
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
        
        $rrhtipocontrato = Rrhtipocontrato::find($id);
        return view('rhtipocontratos.edit', compact('rrhtipocontrato'));
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
       
        
                $rrhtipocontrato = Rrhtipocontrato::find($id);
                $rrhtipocontrato->descripcion=$request->descripcion;
                $rrhtipocontrato->save();
          return redirect()->route('rhtipocontratos.index');
         
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
