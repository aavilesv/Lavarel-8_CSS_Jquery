<?php

namespace App\Http\Controllers\soporte;

use App\Http\Controllers\Controller;
use App\Models\Cliente;
use App\Models\contratosclientes\Cclicontratocliente;
use App\Models\Soporte\Novedad;
use Illuminate\Http\Request;

class NovedadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexds()
    {
        $novedads = Novedad::where('eliminar','=',1)->get();
        return view('novedads.index',compact('novedads'));
    }
     public function index()
    {
        $novedads = Novedad::where('eliminar','=',1)->get();
        return view('novedads.index',compact('novedads'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $clientes = Cclicontratocliente::where('eliminar','=',1)->get();
        return view('novedads.create',compact('clientes'));
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
        'especificar'=>'required',
        'fechavisita'=>'required','horavisita'=>'required',
         'novedadopercance'=>'required','cclicontratocliente_id'=>'required']);
        try {
            
             $novedad =new Novedad();
             $novedad->cclicontratocliente_id=$request->cclicontratocliente_id;
             $novedad->novedadopercance=$request->novedadopercance;
             $novedad->horainciar= now(); 
             $novedad->especificar=$request->especificar;
             $novedad->nombre=$request->nombre;
             $novedad->fechavisita=$request->fechavisita;
             $novedad->horavisita=$request->horavisita;
             $novedad->parentesco=$request->parentesco;
             $novedad->tecnico= $request->user()->nombre." ".$request->user()->apellido;
             $novedad->celular=$request->celular;
             $novedad->save();
       return redirect()->route('novedads.index');    
    }catch(\Exception $exception){
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
        return $id;
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
    public function destroy(Request $request,$id)
    {
        $id = $request->get('id');
        $Cclicontratocliente = Novedad::find($id);
        $Cclicontratocliente->delete();
      
        return  redirect()->route('novedads.index');
    }
}
