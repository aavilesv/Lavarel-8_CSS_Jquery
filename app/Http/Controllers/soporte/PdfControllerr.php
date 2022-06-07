<?php

namespace App\Http\Controllers\soporte;
use Dompdf\Dompdf;
use App\Http\Controllers\Controller;
use App\Models\Cliente;
use App\Models\Compras\Compra;
use App\Models\Compras\Detallecompra;
use App\Models\nominapagos\Nominapago;
use App\Models\recursoshumanos\Rrhasistencia;
use App\Models\recursoshumanos\Rrhempleado;
use App\Models\Soporte\Novedad;
use App\Models\Soporte\Soportefibra;
use App\Models\Soporte\Soporteradio;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\View;

class PdfControllerr extends Controller
{


    public function nominapdfall()
    {

        $nominas = Nominapago::all();
        $pdf = PDF::loadView('nominapagos.pdfall', compact('nominas'));

        return $pdf->setPaper('a4', 'landscape')->stream('Clientes.pdf'); // esto hace horizotal la hoja
        //return $pdf->stream('Clientes.pdf');
        // return $pdf->download('prueba.pdf');
    }

    public function nominapdlista($fechainicial, $fechafinal)
    {
            if ($fechainicial  != $fechafinal) {
                $nominas = Nominapago::whereBetween('created_at', [$fechainicial, $fechafinal])
                ->orderBy('id', 'asc')->get();
            }else
            {
                $nominas = Nominapago::whereDate('created_at','=', $fechafinal)->orderBy('id', 'asc')->get();
            }
        $pdf = PDF::loadView('nominapagos.pdffechas', compact('nominas', 'fechainicial', 'fechafinal'));

        return $pdf->setPaper('a4', 'landscape')->stream('Nomina.pdf'); // esto hace horizotal la hoja
        //return $pdf->stream('Clientes.pdf');
        // return $pdf->download('prueba.pdf');
    }

    public function nominaone($id)
    {

        $nomina = Nominapago::find($id);
        $pdf = PDF::loadView('nominapagos.pdfone', compact('nomina'));

        return $pdf->setPaper('a4', 'landscape')->stream('Nomina.pdf'); // esto hace horizotal la hoja
        //return $pdf->stream('Clientes.pdf');
        // return $pdf->download('prueba.pdf');
    }

    public function empleadospdfall()
    {

        $empleados = Rrhempleado::where('eliminar', '=', 1)->orderBy('id', 'asc')->get();
        $pdf = PDF::loadView('rhempleados.pdfall', compact('empleados'));

        return $pdf->setPaper('a4', 'landscape')->stream('empleados.pdf'); // esto hace horizotal la hoja
        //return $pdf->stream('Clientes.pdf');
        // return $pdf->download('prueba.pdf');
    }
    public function empleadospdfgetone($id)
    {

        $cliente = Rrhempleado::find($id);
        $pdf = PDF::loadView('rhempleados.pdfgetone', compact('cliente'));

        return $pdf->setPaper('a4', 'landscape')->stream('Empleado.pdf'); // esto hace horizotal la hoja
        //return $pdf->stream('Clientes.pdf');
        // return $pdf->download('prueba.pdf');
    }
    public function clientespdfall()
    {

        $clientes = Cliente::where('eliminar', '=', 1)->orderBy('id', 'asc')->get();
        $pdf = PDF::loadView('clientes.clientespdfall', compact('clientes'));

        return $pdf->setPaper('a4', 'landscape')->stream('Clientes.pdf'); // esto hace horizotal la hoja
        //return $pdf->stream('Clientes.pdf');
        // return $pdf->download('prueba.pdf');
    }
    public function clientegetone($id)
    {

        $cliente = Cliente::find($id);
        $pdf = PDF::loadView('clientes.clientegetone', compact('cliente'));

        return $pdf->setPaper('a4', 'landscape')->stream('Cliente.pdf'); // esto hace horizotal la hoja
        //return $pdf->stream('Clientes.pdf');
        // return $pdf->download('prueba.pdf');
    }

    public function novedadall()
    {

        $novedades = Novedad::join('cclicontratoclientes', 'cclicontratoclientes.id',
        '=', 'novedads.cclicontratocliente_id')->where('novedads.eliminar', '=', 1)
        ->select(	'novedads.id',
        'novedads.horainciar',
            'novedads.fechavisita',
        'novedads.horavisita',
            'novedads.novedadopercance',
        'novedads.cclicontratocliente_id',
            'novedads.created_at',
        'novedads.updated_at',
            'novedads.especificar',
        'novedads.nombre',
            'novedads.parentesco',
        'novedads.tecnico',
            'novedads.celular',
        'novedads.estado',
        'novedads.eliminar')
        ->orderBy('cclicontratoclientes.servicio', 'desc')->get();
        $pdf = PDF::loadView('novedads.novedadall', compact('novedades'));

        return $pdf->setPaper('a4', 'landscape')->stream('Novedades.pdf'); // esto hace horizotal la hoja
        //return $pdf->stream('Clientes.pdf');
        // return $pdf->download('prueba.pdf');
    }
    public function novedadgetone($id)
    {

        $novedad = Novedad::find($id);
        $pdf = PDF::loadView('novedads.novedadgetone', compact('novedad'));

        return $pdf->setPaper('a4', 'landscape')->stream('Novedad.pdf'); // esto hace horizotal la hoja
        //return $pdf->stream('Clientes.pdf');
        // return $pdf->download('prueba.pdf');
    }

    public function soporteallfibra()
    {

        $informefibra = Soportefibra::all();
        $pdf = PDF::loadView('soportes.reportefibra', compact('informefibra'));

        return $pdf->setPaper('a4', 'landscape')->stream('Informefibra.pdf'); // esto hace horizotal la hoja
        //return $pdf->stream('Clientes.pdf');
        // return $pdf->download('prueba.pdf');
    }

    public function soportegetonefibra($id)
    {

        $informefibra = Soportefibra::find($id);
        $pdf = PDF::loadView('soportes.soportepdfgetoneefibra', compact('informefibra'));

        return $pdf->setPaper('a4', 'landscape')->stream('Informefibra.pdf'); // esto hace horizotal la hoja
        //return $pdf->stream('Clientes.pdf');
        // return $pdf->download('prueba.pdf');
    }

    
    public function soportegetonefibranovedad($id)
    {
        $novedadopercance = ($id==1) ? 'Instalación' : (($id==2) ? 'Retiro de Equipo' : (($id==3) ? 'Reinstalación' : (($id==4) ? 'Intermitente' : (($id==5) ? 'Lento' : (($id==6) ? 'Desconf. Router' : (($id==7) ? 'Cable. Dañado' : (($id==8) ? 'Problema Equipos' : (($id==9) ? 'Sin servicio' : '')))))))); 
        $informefibr = Soportefibra::
            join('novedads', 'novedads.id',
             '=', 'soportefibras.novedad_id')
            ->where('novedads.novedadopercance','=',$id)->get();
        $pdf = PDF::loadView('soportes.soportepdfgetnovedadfibra', compact('informefibr','novedadopercance'));

        return $pdf->setPaper('a4', 'landscape')->stream('Informefibra.pdf'); // esto hace horizotal la hoja
        //return $pdf->stream('Clientes.pdf');
        // return $pdf->download('prueba.pdf');
    }

    public function soporteallgetfechafibra($fechainicial, $fechafinal)
    {
        
        if ($fechainicial  != $fechafinal) {
            $informefibra = Soportefibra::whereBetween('fecha', [$fechainicial, $fechafinal])
            ->orderBy('id', 'asc')->get();
        }else
        {
            $informefibra = Soportefibra::whereDate('fecha','=', $fechafinal)
            ->orderBy('id', 'asc')->get();
        
        }
        $pdf = PDF::loadView('soportes.pdffechafibra', compact('informefibra', 'fechainicial', 'fechafinal'));

        return $pdf->setPaper('a4', 'landscape')->stream('Informefibra.pdf'); // esto hace horizotal la hoja
        //return $pdf->stream('Clientes.pdf');
        // return $pdf->download('prueba.pdf');
    }
    // Always
    public function soporteallradio()
    {
        $informeradio = Soporteradio::all();
        $pdf = PDF::loadView('soportes.soporteallradio',compact('informeradio'));
       // $pdf->loadView($html);
        return $pdf->setPaper('a4', 'landscape')->stream( date('Y-m-d').'Informefibra.pdf'); // esto hace horizotal la hoja
    }

    public function soporteallgetoneradio($id)
    {


        $informeradio = Soporteradio::find($id);

        $pdf = PDF::loadView('soportes.soporteallgetoneradio', compact('informeradio'));

        return $pdf->setPaper('a4', 'landscape')->stream('InformeRadio.pdf'); // esto hace horizotal la hoja
        //return $pdf->stream('Clientes.pdf');
        // return $pdf->download('prueba.pdf');
    }

    public function soporteallgetoneradionovedad($id)
    {

        $novedadopercance = ($id==1) ? 'Instalación' : (($id==2) ? 'Retiro de Equipo' : (($id==3) ? 'Reinstalación' : (($id==4) ? 'Intermitente' : (($id==5) ? 'Lento' : (($id==6) ? 'Desconf. Router' : (($id==7) ? 'Cable. Dañado' : (($id==8) ? 'Problema Equipos' : (($id==9) ? 'Sin servicio' : '')))))))); 
        $informeradi = Soporteradio::
            join('novedads', 'novedads.id',
             '=', 'soporteradios.novedad_id')
            ->where('novedads.novedadopercance','=',$id)->get();

        $pdf = PDF::loadView('soportes.soporteallgetoneradionovedad', compact('novedadopercance','informeradi'));

        return $pdf->setPaper('a4', 'landscape')->stream('InformeRadio.pdf'); // esto hace horizotal la hoja
        //return $pdf->stream('Clientes.pdf');
        // return $pdf->download('prueba.pdf');
    }
    public function soporteallgetfecharadio($fechainicial, $fechafinal)
    {
        
        if ($fechainicial  != $fechafinal) {
            $informeradio = Soporteradio::whereBetween('fecha', [$fechainicial, $fechafinal])
            ->orderBy('id', 'asc')->get();
        }else
        {
            $informeradio = Soporteradio::whereDate('fecha','=', $fechafinal)
            ->orderBy('id', 'asc')->get();
        
        }
        $pdf = PDF::loadView('soportes.pdfradiofecha', compact('informeradio', 'fechainicial', 'fechafinal'));
        return $pdf->setPaper('a4', 'landscape')->stream('InformeRadio.pdf'); // esto hace horizotal la hoja
        //return $pdf->stream('Clientes.pdf');
        // return $pdf->download('prueba.pdf');
    }


    
    public function reporteasistenciadiariahoy()
    {
        
        $asistencia = Rrhasistencia::whereDate('fecha', '=', "".date('Y-m-d'))
        ->get();
        $pdf = PDF::loadView('rrhasistencias.pdfdiariaasistenciahoy', compact('asistencia'));

       
        return $pdf->setPaper('a4', 'landscape')->stream('Asistenciadiaria.pdf'); // esto hace horizotal la hoja
        //return $pdf->stream('Clientes.pdf');
        // return $pdf->download('prueba.pdf');
    }
    public function reporteasistenciadiaria($id)
    {     
        $asistencia = Rrhasistencia::whereDate('fecha', '=', "".$id)
        ->get();
        
       
        $pdf = PDF::loadView('rrhasistencias.pdfdiariaasistencia', compact('asistencia', 'id'));

        return $pdf->setPaper('a4', 'landscape')->stream('Asistenciadiaria.pdf'); // esto hace horizotal la hoja
        //return $pdf->stream('Clientes.pdf');
        // return $pdf->download('prueba.pdf');
    }


    public function reportemensualasistencia()
    {
        $fechainicial=date('Y-m-d');
        $fechafinal=date('Y-m-d');
        $asistencia = Rrhasistencia::whereDate('fecha', '=', "".date('Y-m-d'))
        ->get();
        $pdf = PDF::loadView('rrhasistencias.pdfmensualasistencia', compact('asistencia', 'fechainicial', 'fechafinal'));

        return $pdf->setPaper('a4', 'landscape')->stream('Informefibra.pdf'); // esto hace horizotal la hoja
        //return $pdf->stream('Clientes.pdf');
        // return $pdf->download('prueba.pdf');
    }
    public function reportemensualasistenciafecha($fechainicial, $fechafinal)
    {
        
        if ($fechainicial  != $fechafinal) {
            $asistencia = Rrhasistencia::whereBetween('fecha', [$fechainicial, $fechafinal])
            ->orderBy('id', 'asc')->get();
        }else
        {
            $asistencia = Rrhasistencia::whereDate('fecha','=', $fechafinal)
            ->orderBy('id', 'asc')->get();
        
        }
        $pdf = PDF::loadView('rrhasistencias.pdfmensualasistenciafecha', compact('asistencia', 'fechainicial', 'fechafinal'));
        return $pdf->setPaper('a4', 'landscape')->stream('MensualAsistencia.pdf'); // esto hace horizotal la hoja
        //return $pdf->stream('Clientes.pdf');
        // return $pdf->download('prueba.pdf');
    }
    public function compraone($id)
    {
        $compra=Compra::find($id);
        $detallecompra=Detallecompra::join("compras","compras.id","=","detallecompras.compra_id")
        ->where('compras.id','=',$compra->id)->get();
        $pdf = PDF::loadView('compras.pdfcompraone', compact('compra','detallecompra', 'id'));

        return $pdf->setPaper('a4', 'landscape')->stream('Asistenciadiaria.pdf'); // esto hace horizotal la hoja
        //return $pdf->stream('Clientes.pdf');
        // return $pdf->download('prueba.pdf');
    }

}
