<?php

namespace App\Http\Controllers\Compras;

use App\Http\Controllers\Controller;
use App\Models\Compras\Marca;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Marcacontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $marca = Marca::all();
        return view('marcas.index',compact('marca'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $action="Nuevo";
        return view('marcas.save',compact('action'));
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
          
            DB::beginTransaction();
            Marca::Create($request->all());
            DB::commit();
            return redirect()->route('marca.index');
         }catch(\Exception $exception){
            DB::rollback();
             return  redirect()->back()->with('error',"Error".$exception->getMessage());
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
        $action="Editar";
        $marca = Marca::find($id);
        return view('marcas.save',compact('action','marca'));
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
        try {
            DB::beginTransaction();
            $marca=Marca::find($id);
            $marca->update($request->all());
            DB::commit();
            return redirect()->route('marca.index');
         }catch(\Exception $exception){
            DB::rollback();
             return  redirect()->back()->with('error',"Error".$exception->getMessage());
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
