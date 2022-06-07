<?php

namespace App\Http\Controllers\Cobro;

use App\Http\Controllers\Controller;
use App\Models\Cobro\Caja;
use App\Models\Cobro\Gastocaja;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class gerentecontroller extends Controller
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
        return view('cobro.gerente', compact('id'));
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
        DB::beginTransaction();
        try {
            
            $caja = Caja::find($id);
            $dato = $caja->saldocaja - $request->saldoingeniero;
            if ($dato >= 0) {
                $caja->cajafinal = $caja->saldocaja;
                $caja->saldocaja = $caja->saldocaja - $request->saldoingeniero;
                $caja->saldoingeniero =  $request->saldoingeniero;

                $caja->save();
                DB::commit();
            } else {
                return  redirect()->back()->with('error', "Solo existe esa cantidad en caja:$" .  $caja->saldocaja);
            }



            return redirect()->route('diariacobro.index');
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
