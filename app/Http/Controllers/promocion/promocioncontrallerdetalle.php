<?php

namespace App\Http\Controllers\promocion;

use App\Http\Controllers\Controller;
use App\Models\contratosclientes\Cclicontratocliente;
use App\Models\Promocion\Promocion;
use App\Models\Promocion\Promociondetalle;
use Illuminate\Http\Request;

class promocioncontrallerdetalle extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        try {
            $contratocliente=Cclicontratocliente:: find($request->id);
            
            $promocion = Promocion::where('servicio','='
            ,$request->id)->select(
                'promocions.id',
                'promocions.titulo',
                'promocions.descripcion',
                'promocions.fechainicio',
                'promocions.fechafinal'
            )->orderBy('id')->get();
            $boolen=false;
            
            if ($promocion->isEmpty()) {
                $boolen=true;
            }
            $data =[
                'respuesta'=>$boolen,
                'promocion'=>$promocion,
            ];
            return response()->json($data);
            
            // response()->json("Transacción con éxito"+$data);
        } catch (\Exception $exception) {
            
            return response()->json("Error" . $exception->getMessage());
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
    public function destroy(Request $request,$id)
    {
        
        $id = $request->get('id');
        $promociondetalle = Promociondetalle::find($id);
        $cclicontratocliente=Cclicontratocliente::find($promociondetalle->cclicontratocliente_id);
        $cclicontratocliente->promocion=0;
        $cclicontratocliente->save();
        $promociondetalle->delete();
        
        return  redirect()->route('promocion.index');
    
    }
}
