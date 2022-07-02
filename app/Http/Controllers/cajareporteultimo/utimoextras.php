<?php

namespace App\Http\Controllers\cajareporteultimo;

use App\Http\Controllers\Controller;
use App\Models\Cobro\Caja;
use App\Models\Cobro\Cajadetalle;
use App\Models\Cobro\Cajaextra;
use App\Models\Cobro\Gastocaja;
use App\Models\cuentascobrar\Cuentasporcobrar;
use App\Models\cuentascobrar\Detallecuentasporcobrar;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class utimoextras extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
              
        DB::beginTransaction();
        try {
        $Cajaextra = Cajaextra::find($id);
        $cajaa = Caja::find($Cajaextra->caja_id);
        $cajaa->cajafinal=$cajaa->cajafinal-($Cajaextra->monto);
        $cajaa->saldocaja=$cajaa->saldocaja-($Cajaextra->monto);
        $cajaa->save();
        $Cajaextra->delete();
        DB::commit();

        return  redirect()->back();
        
       
        
    } catch (\Exception $exception) {
        DB::rollback();
        return  redirect()->back()->with('error', "Error" . $exception->getMessage());
    }
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
        //
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
