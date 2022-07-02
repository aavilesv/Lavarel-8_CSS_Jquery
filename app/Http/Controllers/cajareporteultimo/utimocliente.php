<?php

namespace App\Http\Controllers\cajareporteultimo;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cobro\Caja;
use App\Models\Cobro\Cajadetalle;
use App\Models\Cobro\Cajaextra;
use App\Models\Cobro\Gastocaja;
use App\Models\cuentascobrar\Cuentasporcobrar;
use App\Models\cuentascobrar\Detallecuentasporcobrar;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
class utimocliente extends Controller
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
        DB::beginTransaction();
        try {
        $gastocaja = GastoCaja::find($id);
        return $gastocaja;
        $cuentasporcorar=Cuentasporcobrar::find($caja->cuentasporcobrar_id);
        if(Cuentasporcobrar::find($caja->cuentasporcobrar_id)){
            $cuentasporcobrardetalle=Detallecuentasporcobrar::find($cuentasporcorar->cuentasporcobrar_id);
            if(Detallecuentasporcobrar::find($cuentasporcorar->cuentasporcobrar_id)){
                $cuentasporcobrardetalle->delete();
                $cuentasporcorar->delete();
            }
        }
        $cajaa = Caja::find($caja->caja_id);
        
        $cajaa->cajafinal=$cajaa->cajafinal-($caja->monto+$caja->abonado);
        $cajaa->saldocaja=$cajaa->saldocaja-($caja->monto+$caja->abonado);
        $cajaa->save();
        $caja->delete();
        DB::commit();

        return  redirect()->back();
        
       
        
    } catch (\Exception $exception) {
        DB::rollback();
        return  redirect()->back()->with('error', "Error" . $exception->getMessage());
    }
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
        DB::beginTransaction();
        try {
        $caja = Cajadetalle::find($id);
        $cuentasporcorar=Cuentasporcobrar::find($caja->cuentasporcobrar_id);
        if(Cuentasporcobrar::find($caja->cuentasporcobrar_id)){
            $cuentasporcobrardetalle=Detallecuentasporcobrar::find($cuentasporcorar->cuentasporcobrar_id);
            if(Detallecuentasporcobrar::find($cuentasporcorar->cuentasporcobrar_id)){
                $cuentasporcobrardetalle->delete();
                $cuentasporcorar->delete();
            }
        }
        $cajaa = Caja::find($caja->caja_id);
        
        $cajaa->cajafinal=$cajaa->cajafinal-($caja->monto+$caja->abonado);
        $cajaa->saldocaja=$cajaa->saldocaja-($caja->monto+$caja->abonado);
        $cajaa->save();
        $caja->delete();
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
