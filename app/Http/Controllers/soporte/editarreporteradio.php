<?php

namespace App\Http\Controllers\soporte;

use App\Http\Controllers\Controller;
use App\Models\Soporte\Soportefibra;
use App\Models\Soporte\Soporteradio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class editarreporteradio extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   
    public function index(Request $request)
    {
        $soportefibraradioo = Soporteradio::all();
        $buscarincial = "" . $request->fechainicial;
        $buscarfinal = "" . $request->fechafinal;
        $novedadopercance = "" . $request->novedadopercance;
        $novedad = "" . $request->novedadopercance;
        if($request->novedadopercance){
            $novedadopercance = ($request->novedadopercance==1) ? 'Instalación' : (($request->novedadopercance==2) ? 'Retiro de Equipo' : (($request->novedadopercance==3) ? 'Reinstalación' : (($request->novedadopercance==4) ? 'Intermitente' : (($request->novedadopercance==5) ? 'Lento' : (($request->novedadopercance==6) ? 'Desconf. Router' : (($request->novedadopercance==7) ? 'Cable. Dañado' : (($request->novedadopercance==8) ? 'Problema Equipos' : (($request->novedadopercance==9) ? 'Sin servicio' : '')))))))); 
            $soportefibraradioo = Soporteradio::
            join('novedads', 'novedads.id',
             '=', 'soporteradios.novedad_id')
            ->where('novedads.novedadopercance','=',$request->novedadopercance)->get();
        }
        if (isset($_GET['fechainicial']) and isset($_GET['fechafinal']) ) {
            if ($buscarincial  != $buscarfinal) {
                $soportefibraradioo = Soporteradio::whereBetween('fecha', [$request->fechainicial,
                 $request->fechafinal])
                ->orderBy('id', 'asc')->get();
            }else
            {
                $soportefibraradioo = Soporteradio::whereDate('fecha','=', $request->fechafinal)
                ->get();
            
            }
           
                
        }

        return view('editarssoporteradio.index', compact('novedad','novedadopercance','soportefibraradioo', 'buscarincial', 'buscarfinal'));
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
        $reporteradio=Soporteradio::find($id);
        
        return view('editarssoporteradio.edit',compact('reporteradio'));
        
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
            $fibra=Soporteradio::find($id);
            
            $fibra->cap=$request->cap;
            $fibra->cip=$request->cip;
            $fibra->cred=$request->cred;
            $fibra->accq=$request->accq;
            $fibra->aseñal=$request->aseñal;
            $fibra->inconectores=$request->inconectores;
            $fibra->imarcadelrouter=$request->imarcadelrouter;
            $fibra->iantenaanterior=$request->iantenaanterior;
            $fibra->iantenanueva=$request->iantenanueva;
            $fibra->imetroscable=$request->imetroscable;
            $fibra->fecha=$request->fecha;
            $fibra->usuario=$request->usuario;
            $fibra->horallegada=$request->horallegada;
            $fibra->horasalida=$request->horasalida;
            $fibra->observaciones=$request->observaciones;
            $fibra->nombreresponsable=$request->nombreresponsable;
            $fibra->parentescoresponsable=$request->parentescoresponsable;
            
            $fibra->cantena=($request->cantena) ? 1 : null;
            $fibra->crouter=($request->crouter) ? 1 : null;
            $fibra->ccambiowiffi=($request->ccambiowiffi) ? 1 : null;
            $fibra->cfrecuencias=($request->cfrecuencias) ? 1 : null;
            $fibra->aanterior=($request->aanterior) ? 1 : null;
            $fibra->arouter=($request->arouter) ? 1 : null;
            $fibra->iconectores=($request->iconectores) ? 1 : null;
            $fibra->irouter=($request->irouter) ? 1 : null;
            $fibra->ipoe=($request->ipoe) ? 1 : null;
            $fibra->itubogalvanizado=($request->itubogalvanizado) ? 1 : null;
            $fibra->icable=($request->icable) ? 1 : null;
            $fibra->iadicionocaña=($request->iadicionocaña) ? 1 : null;
            $fibra->ituboaluminio=($request->ituboaluminio) ? 1 : null;
            
            $fibra->save();
            DB::commit(); 
            return redirect()->route('editarreporteradio.index');
        } catch (\Exception $exception) {
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
