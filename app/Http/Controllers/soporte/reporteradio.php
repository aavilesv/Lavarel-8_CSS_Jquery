<?php

namespace App\Http\Controllers\soporte;

use App\Http\Controllers\Controller;
use App\Models\Soporte\Soporteradio;
use Illuminate\Http\Request;

class reporteradio extends Controller
{

    public function index(Request $request)
    {
        $soportefibraradioo = Soporteradio::all();
        $buscarincial = "" . $request->fechainicial;
        $buscarfinal = "" . $request->fechafinal;
        $novedadopercance = "" . $request->novedadopercance;
        $novedad = "" . $request->novedadopercance;
        $numeropercance = "" . $request->novedadopercance;
        if($request->novedadopercance){
            $novedadopercance = ($request->novedadopercance==1) ? 'Instalación' : (($request->novedadopercance==2) ? 'Retiro de Equipo' : (($request->novedadopercance==3) ? 'Reinstalación' : (($request->novedadopercance==4) ? 'Intermitente' : (($request->novedadopercance==5) ? 'Lento' : (($request->novedadopercance==6) ? 'Desconf. Router' : (($request->novedadopercance==7) ? 'Cable. Dañado' : (($request->novedadopercance==8) ? 'Problema Equipos' : (($request->novedadopercance==9) ? 'Sin servicio' : (($request->novedadopercance==10) ? 'Otros' : ''))))))))); 
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

        return view('soportes.reporteradio', compact('novedad','novedadopercance','soportefibraradioo', 'buscarincial', 'numeropercance','buscarfinal'));
    }
}
