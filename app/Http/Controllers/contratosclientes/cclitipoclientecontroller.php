<?php

namespace App\Http\Controllers\contratosclientes;

use App\Http\Controllers\Controller;

use App\Models\contratosclientes\Cclicontratotipocliente;
use Illuminate\Http\Request;

class cclitipoclientecontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tipocontrato = Cclicontratotipocliente::all();
        return view('cclicontratotipoclientes.index',compact('tipocontrato'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cclicontratotipoclientes.create');
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
            try {
    
               
                $tipocontrato =new Cclicontratotipocliente();
                $tipocontrato->descripcion=$request->descripcion;
                $tipocontrato->save();
          return redirect()->route('tipocontrato.index');
         
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
        $rrhtipocontrato = Cclicontratotipocliente::find($id);
        return view('cclicontratotipoclientes.edit', compact('rrhtipocontrato'));
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
       
        
                $rrhtipocontrato = Cclicontratotipocliente::find($id);
                $rrhtipocontrato->descripcion=$request->descripcion;
                $rrhtipocontrato->save();
          return redirect()->route('tipocontrato.index');
         
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
