<?php

namespace App\Http\Controllers\recursoshumanos;

use App\Http\Controllers\Controller;
use App\Models\recursoshumanos\Rrhcargo;
use Illuminate\Http\Request;

class Rrhcargocontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cargos = Rrhcargo::all();
        return view('rhcargos.rrhcargos',compact('cargos'));
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('rhcargos.rrhcargoscreate');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      try {

        $request->validate([
            'nombre'=>'required']);
            $cargos =new Rrhcargo();
            $cargos->nombre=$request->nombre;
            $cargos->save();
      return redirect()->route('rhcargos.index');
     
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
      
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($rrcargo)
    {
       
        $rrhcargo = Rrhcargo::find($rrcargo);
        return view('rhcargos.rrcargosedit', compact('rrhcargo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $rrcargo)
    {
        try {
       
            $request->validate([
                'nombre'=>'required']);
                $rrcargo = Rrhcargo::find($rrcargo);
                $rrcargo->nombre=$request->nombre;
                $rrcargo->save();
          return redirect()->route('rhcargos.index');
         
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
