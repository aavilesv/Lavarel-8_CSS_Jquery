<?php

namespace App\Http\Controllers\recursoshumanos;

use App\Http\Controllers\Controller;
use App\Models\recursoshumanos\Rrhasistencia;
use Illuminate\Http\Request;

class rrhasistenciacontrollerdiaria extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
      
            $asistencia = "";
            $asistencia = Rrhasistencia::where('fecha', '=', date('Y-m-d'))
            ->get();
            $buscarfinal = "" . $request->fechafinal;
            if (isset($_GET['fechafinal']) ) {
                    $asistencia = Rrhasistencia::
                    where('fecha', '=',$buscarfinal)
                   ->get();
            }

        return view('rrhasistencias.diariaasistencia', compact('asistencia', 'buscarfinal'));
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
        //
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
