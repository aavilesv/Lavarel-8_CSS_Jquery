<?php

namespace App\Http\Controllers\cuantasporcobrar;

use App\Http\Controllers\Controller;
use App\Models\Cliente\Canton;
use App\Models\cuentascobrar\Cuentasporcobrar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class datatablecuentasporcobrar extends Controller
{
    //
    public function listarcuentacobrar(Request $request){
        

        $cuentascobrar = Cuentasporcobrar::join('cclicontratoclientes', 'cclicontratoclientes.id','=', 'cuentasporcobrars.cclicontratocliente_id')
        ->join('clientes', 'clientes.id','=', 'cclicontratoclientes.cliente_id')
        //->where('cuentasporcobrars.fecha','=',date('Y-m-d'))
        ->select('cuentasporcobrars.id',
        DB::raw('CONCAT(clientes.nombre,clientes.apellido) as nombres')
        ,'clientes.cedula','cuentasporcobrars.created_at'
        ,'cclicontratoclientes.tarifa','cuentasporcobrars.sumatotal'
        ,'cuentasporcobrars.saldo','cuentasporcobrars.fecha'
        ,'cuentasporcobrars.abonado','cuentasporcobrars.status','cuentasporcobrars.eliminar')
        ->orderBy('cuentasporcobrars.created_at', 'DESC')->get();
        return datatables()->of($cuentascobrar)
        ->editColumn('tarifa', function($cuentascobrar){
            return "$".$cuentascobrar->tarifa;
        })->editColumn('sumatotal', function($cuentascobrar){
            return "$".$cuentascobrar->sumatotal;
        })->editColumn('saldo', function($cuentascobrar){
            return "$".$cuentascobrar->saldo;
        })->editColumn('status', function($cuentascobrar){
            return ($cuentascobrar->status==1) ? '<span class="badge badge-success">Pagado</span>' : '<span class="badge badge-danger">Pediente</span>';
        })->editColumn('eliminar', function($cuentascobrar){
            return ($cuentascobrar->eliminar==0) ? '<span class="badge badge-success">Cobro abierto</span>' : '<span class="badge badge-danger">Cobro cancelado</span>';
        })->editColumn('abonado', function($cuentascobrar){
            return "$".$cuentascobrar->abonado;
        })->editColumn('created_at', function($cuentascobrar){
            return $cuentascobrar->created_at->toDateTimeString();
        })->addColumn('btn', 'cuentasporcobrars.btn')
        ->rawColumns(['btn','status','eliminar'])
        ->toJson();
    }

}
