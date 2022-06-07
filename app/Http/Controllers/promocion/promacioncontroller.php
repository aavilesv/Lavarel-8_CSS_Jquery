<?php

namespace App\Http\Controllers\promocion;

use App\Http\Controllers\Controller;
use App\Models\Promocion\Promocion;
use App\Models\Promocion\Promociondetalle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class promacioncontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $promocioncliente = Promociondetalle::all();
        $promocion = Promocion::where('status','=',1)->get();
        return view('promocions.index', compact('promocion','promocioncliente'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('promocions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::beginTransaction();
        try {
            Promocion::Create($request->all());
            DB::commit();
            return redirect()->route('promocion.index');
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
        $promocion = Promocion::find($id);
        return view('promocions.edit',compact('promocion'));//
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
            $promocion=Promocion::find($id);
            $promocion->update($request->all());
            DB::commit();
            return redirect()->route('promocion.index');
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
    public function destroy(Request $request,$id)
    {
        
        $id = $request->get('id');
        $promociondetalle = Promociondetalle::find($id);
        $promociondetalle->delete();
        
        return  redirect()->route('promocion.index');
    
    }
}
