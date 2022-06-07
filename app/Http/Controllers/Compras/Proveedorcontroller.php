<?php

namespace App\Http\Controllers\Compras;

use App\Http\Controllers\Controller;
use App\Models\Compras\Proveedor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Proveedorcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $proveedor = Proveedor::where('status','=','1')->get();
        return view('proveedores.index', compact('proveedor'));
   
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $action = "Nuevo";
        return view('proveedores.save', compact('action'));
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
            Proveedor::create($request->all());
            DB::commit();
            return redirect()->route('proveedor.index');
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
        $action = "Editar";
       
        $proveedor = Proveedor::find($id);
        return view('proveedores.save', compact('action', 'proveedor'));
   
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
            $proveedor = Proveedor::find($id);
            $proveedor->update($request->all());
            DB::commit();
            return redirect()->route('proveedor.index');
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

        try {
            DB::beginTransaction();
       
            $id = $request->get('id');
            $proveedor = Proveedor::find($id);
            $proveedor->status = 0;
            $proveedor->save();
            DB::commit();
            return redirect()->route('proveedor.index');
        } catch (\Exception $exception) {
            DB::rollback();
            return  redirect()->back()->with('error', "Error" . $exception->getMessage());
        }
       
    }
}
