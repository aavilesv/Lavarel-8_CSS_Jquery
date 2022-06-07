<?php

namespace App\Http\Controllers\Cobro;

use App\Http\Controllers\Controller;
use App\Models\cuentascobrar\Cuentasporcobrar;
use Illuminate\Http\Request;

class cobropendientecontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $buscador = "" . $request->buscador;
        $buscarincial = "" . $request->fechainicial;
        $buscarfinal = "" . $request->fechafinal;
        $cuentascobrar = Cuentasporcobrar::
            join('cclicontratoclientes', 'cclicontratoclientes.id',
             '=', 'cuentasporcobrars.cclicontratocliente_id')
             ->where('status','=',0)
            ->whereDate('cuentasporcobrars.fecha','=',date('Y-m-d'))->select(
                'cuentasporcobrars.id',
                'cuentasporcobrars.cclicontratocliente_id',
                'cuentasporcobrars.saldo',
                'cuentasporcobrars.fecha',
                'cuentasporcobrars.abonado',
                'cuentasporcobrars.status',
                'cuentasporcobrars.updated_at',
                'cuentasporcobrars.created_at',
            )->orderBy('id')->paginate(8);
        return view('cobropendiente.index', 
        
        compact('cuentascobrar', 'buscador','buscarincial','buscarfinal'));
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
