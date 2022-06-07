<?php

namespace App\Http\Controllers\nominapagos;

use App\Http\Controllers\Controller;
use App\Models\nominapagos\Nominapago;
use Illuminate\Http\Request;

class nominareporteescontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
          if($request){
            $nomina = Nominapago::all();
              $buscarincial="".$request->fechainicial;
              $buscarfinal="".$request->fechafinal;
              if($request->fechafinal){
                $nomina = Nominapago::whereBetween('created_at', [$request->fechainicial, $request->fechafinal])
                ->orderBy('id','desc')->get();
              }
         
            return view('nominapagos.reporte',compact('nomina','buscarincial','buscarfinal'));
          }
       
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
