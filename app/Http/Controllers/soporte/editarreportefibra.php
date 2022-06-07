<?php

namespace App\Http\Controllers\soporte;

use App\Http\Controllers\Controller;
use App\Models\Soporte\Soportefibra;
use App\Models\Soporte\Soporteradio;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
class editarreportefibra extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request  $request)
    {
        
        $fibraa = Soportefibra::all();
        $buscarincial = "" . $request->fechainicial;
        $buscarfinal = "" . $request->fechafinal;
        $novedadopercance = "" . $request->novedadopercance;
        $novedad = "" . $request->novedadopercance;
        if($request->novedadopercance){
            $novedadopercance = ($request->novedadopercance==1) ? 'Instalación' : (($request->novedadopercance==2) ? 'Retiro de Equipo' : (($request->novedadopercance==3) ? 'Reinstalación' : (($request->novedadopercance==4) ? 'Intermitente' : (($request->novedadopercance==5) ? 'Lento' : (($request->novedadopercance==6) ? 'Desconf. Router' : (($request->novedadopercance==7) ? 'Cable. Dañado' : (($request->novedadopercance==8) ? 'Problema Equipos' : (($request->novedadopercance==9) ? 'Sin servicio' : '')))))))); 
            $fibraa = Soportefibra::
            join('novedads', 'novedads.id',
             '=', 'soportefibras.novedad_id')
            ->where('novedads.novedadopercance','=',$request->novedadopercance)->get();
    
        }
        
        if (isset($_GET['fechainicial']) and isset($_GET['fechafinal']) ) {
            
            if ($buscarincial  != $buscarfinal) {
                $fibraa = Soportefibra::whereBetween('fecha', [$request->fechainicial,
                 $request->fechafinal])
                ->orderBy('id', 'asc')->get();
            }else
            {
                $fibraa = Soportefibra::whereDate('fecha','=', $request->fechafinal)
                ->get();
            
            }
           
                
        }

        return view('editarsoportefibra.index', compact('novedad','fibraa','novedadopercance','buscarincial','buscarfinal'));
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
        
        
        $reportefibra=Soportefibra::find($id);
        
        return view('editarsoportefibra.edit',compact('reportefibra'));
        
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
            $fibra=Soportefibra::find($id);
            $fibra->usuario=$request->usuario;
            $fibra->fecha=$request->fecha;
            $fibra->horallegada=$request->horallegada;
            $fibra->horasalida=$request->horasalida;
            $fibra->idbm=$request->idbm;
            $fibra->iupc=$request->iupc;
            $fibra->ionuanterior=$request->ionuanterior;
            $fibra->iapc=$request->iapc;
            $fibra->iodb=$request->iodb;
            $fibra->inconectores=$request->inconectores;
            $fibra->inmarcadelrouter=$request->inmarcadelrouter;
            $fibra->imetroscable=$request->imetroscable;
            $fibra->observaciones=$request->observaciones;
            $fibra->nombreresponsable=$request->nombreresponsable;
            $fibra->parentescoresponsable=$request->parentescoresponsable;
            $fibra->ionunueva=$request->ionunueva;
            $fibra->conu=($request->conu) ? 1 : null;
            $fibra->crouter=($request->crouter) ? 1 : null;
            $fibra->ccambiowiffi=($request->ccambiowiffi) ? 1 : null;
            $fibra->arouter=($request->arouter) ? 1 : null;
            $fibra->iconectores=($request->iconectores) ? 1 : null;
            $fibra->irouter=($request->irouter) ? 1 : null;
            $fibra->icablered=($request->icablered) ? 1 : null;
            $fibra->icablefibra=($request->icablefibra) ? 1 : null;
            $fibra->save();
            DB::commit(); 
            return redirect()->route('editarreportefibra.index');
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
