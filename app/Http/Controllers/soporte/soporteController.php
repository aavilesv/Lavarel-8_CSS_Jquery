<?php

namespace App\Http\Controllers\soporte;

use App\Http\Controllers\Controller;
use App\Models\Cliente;
use App\Models\contratosclientes\Cclicontratocliente;
use App\Models\Soporte\Novedad;
use App\Models\Soporte\Soportefibra;
use App\Models\Soporte\Soporteradio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class soporteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $soportes = Novedad::where('eliminar','=',1)->get();
        $config = array();
        $config['center']='-2.1714613594917402, -79.46931796727694';
        $config['zoom'] = '16';
        $config['map_height'] = '500px';
//        $config['scrollwheel'] =false;
       $config['onboundschanged'] = 'if (!centreGot) {
                var mapCentre = map.getCenter();
                marker_0.setOptions({
                    position: new google.maps.LatLng(mapCentre.lat(), mapCentre.lng())
                });
            }
            centreGot = true;';
    
        app('map')->initialize($config);
        
        $marker['position'] ='-2.1714613594917402, -79.46931796727694';
        $marker['infowindow_content'] = "Quantika";
        $marker['icon'] = 'http://maps.google.com/mapfiles/kml/paddle/grn-blank.png';
        //$marker =array(); //start and end point should be same
        app('map')->add_marker($marker);
        foreach ($soportes as $valor) {
            
        $marker['position'] =$valor->cclicontratocliente->latitud.",".$valor->cclicontratocliente->longitud;
        $marker['infowindow_content'] = $valor->cclicontratocliente->cliente->nombre." ".$valor->cclicontratocliente->cliente->apellido;
        $marker['icon'] = 'http://maps.google.com/mapfiles/kml/paddle/red-blank.png';
        //$marker =array(); //start and end point should be same
        app('map')->add_marker($marker);
        }
       

        $map = app('map')->create_map();
        return view('soportes.index',compact('soportes','map'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        
        $clientes = Cliente::where('eliminar','=',1)->get();
        return view('soportes.create',compact('clientes'));
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
    public function edit($novedad)
    {   
        // $novedad->id;
        
        $novedad=Novedad::find($novedad);
        if($novedad->cclicontratocliente->servicio==1 ){
            return view('soportes.edit',compact('novedad'));
        }else {
            return view('soportes.fibra',compact('novedad'));
        }
        //$Novedad = Cliente::where('eliminar','=',1)->get();
        
       
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
           
            $novedad=Novedad::find($id);
            $cliente=Cclicontratocliente::find($novedad->cclicontratocliente->id);
            $novedad->eliminar=0;
            $novedad->save();
            if($cliente->servicio==1){
                 $Soporteradio=Soporteradio::Create($request->all());
                 $Soporteradio->save();
               
            }elseif($cliente->servicio==0){
                $Soportefibra=Soportefibra::Create($request->all());
                $Soportefibra->save();
          
            }
            DB::commit();
            return redirect()->route('soportes.index');
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
    public function destroy($id)
    {
        //
    }
}
