<?php

namespace App\Http\Controllers\soporte;

use App\Http\Controllers\Controller;
use App\Models\Soporte\Novedad;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class btnnovedaddatabler extends Controller
{
    public function listarcobro(Request $request){
        

        $novedad = Novedad::join('cclicontratoclientes', 'cclicontratoclientes.id','=', 
        'novedads.cclicontratocliente_id')
        ->join('clientes', 'clientes.id','=', 'cclicontratoclientes.cliente_id')
       
        ->select('novedads.id',
        DB::raw('CONCAT(clientes.nombre,clientes.apellido) as nombres')
        ,'cclicontratoclientes.servicio','novedads.horainciar'
        ,'cclicontratoclientes.contratocodigo','novedads.created_at'
        ,'novedads.fechavisita','novedads.horavisita'
        ,'novedads.novedadopercance','novedads.especificar','novedads.eliminar')
        ->get();
        return datatables()->of($novedad)
        ->editColumn('eliminar', function($novedad){
            return ($novedad->eliminar==1) ? '<span class="badge badge-success">Activo</span>' : '<span class="badge badge-danger">Realizada</span>';
        })
        ->editColumn('servicio', function($novedad){
            return ($novedad->servicio==1) ? '<span class="badge badge-success">Radio</span>' : '<span class="badge badge-danger">Fibra</span>';
        })->editColumn('novedadopercance', function($novedad){
            
            return ($novedad->novedadopercance==1) ? '<span class="badge badge-success">Instalación</span>' : (($novedad->novedadopercance==2) ? '<span class="badge badge-info">Retiro de Equipo</span>' : (($novedad->novedadopercance==3) ? '<span class="badge badge-warning">Reinstalación</span>' : (($novedad->novedadopercance==4) ? '<span class="badge badge-success">Intermitente</span>' : (($novedad->novedadopercance==5) ? '<span class="badge badge-primary">Lento</span>' : (($novedad->novedadopercance==6) ? '<span class="badge badge-info">Desconf. Router</span>' : (($novedad->novedadopercance==7) ? '<span class="badge badge-warning">Cable. Dañado</span>' : (($novedad->novedadopercance==8) ? '<span class="badge badge-success">Problema Equipos</span>' : (($novedad->novedadopercance==9) ? '<span class="badge badge-info">Sin servicio</span>' : (($novedad->novedadopercance==10) ? '<span class="badge badge-warning">Otros</span>' : ''))))))))); 
        })->editColumn('created_at', function($novedad){
            return $novedad->created_at->toDateTimeString();
        })->addColumn('btn', 'novedadsmodificar.btn')
        ->rawColumns(['btn','eliminar','novedadopercance','servicio'])
        ->toJson();
    }
}
