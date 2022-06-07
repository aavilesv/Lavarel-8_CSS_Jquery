<?php

namespace App\Http\Controllers\recursoshumanos;

use App\Http\Controllers\Controller;
use App\Models\Cliente\Provincia;
use App\Models\recursoshumanos\Rrhasistencia;
use App\Models\recursoshumanos\Rrhempleado;
use App\Models\Soporte\Novedad;
use Carbon\Carbon;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;

class rrhasistenciacontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fecha = new Date();

        return view('rrhasistencias.index', compact('fecha'));
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
        $empleado = Rrhempleado::where('cedula', '=', $request->cedula)
            ->select('nombre', 'apellido')->get();
        if ($empleado->isEmpty()) {
            return  redirect()->back()->with('cedula', "Por favor no es correcto la cedula");
        } else {
            if ($request->optionsRadios == "he") {
// unir 2 tablas
                $asistencia = Rrhasistencia::join('rrhempleados', 'rrhempleados.id', '=', 'rrhasistencias.rrhempleado_id')->where('rrhempleados.cedula', '=', $request->cedula)->where('fecha', '=', date('Y-m-d'))->get();
                $id = Rrhempleado::where('cedula', '=', $request->cedula)->first();
                if ($asistencia->isEmpty()) {
                    $asistencia = Rrhasistencia::create(['fecha' => date('Y-m-d'), 'horaentrada' => date("H:i:s"), 'rrhempleado_id' => $id->id]);
                    return  redirect()->back()->with('cedula', "Hora de entrada: " . $asistencia->rrhempleado->nombre . " " . date("H:i:s"));
                } else {
                    return  redirect()->back()->with('cedula', "Por favor ya puso su hora de entrada");
                }
                return  redirect()->back()->with('cedula', "Por favor  es correcto la cedula");
            } elseif ($request->optionsRadios == "hsa") {
                $asistencia = Rrhasistencia::join('rrhempleados', 'rrhempleados.id', '=', 'rrhasistencias.rrhempleado_id')
                    ->where('rrhempleados.cedula', '=', $request->cedula)
                    ->where('fecha', '=', date('Y-m-d'))
                    ->get();
                $asistenciaa = Rrhasistencia::join('rrhempleados', 'rrhempleados.id', '=', 'rrhasistencias.rrhempleado_id')
                    ->where('rrhempleados.cedula', '=', $request->cedula)
                    ->where('fecha', '=', date('Y-m-d'))->select('rrhasistencias.id')
                    ->first();
                if ($asistencia->isEmpty()) {
                    return  redirect()->back()->with('cedula', "Por favor ingresar hora de entrada primero");
                } else {
                    $rrhasistenciaa = Rrhasistencia::find($asistenciaa->id);


                    if ($rrhasistenciaa->horasalidaalmuerzo) {
                        return  redirect()->back()->with('cedula', "por favor ya puso su hora de salida de almuezo");
                    }
                    $datex7 = new DateTime($rrhasistenciaa->horaentrada);
                    $datex77 = new DateTime(date("H:i:s"));
                    $horax7 = date_diff($datex7, $datex77)->format('%H:%I:%S');
                   
           

                    $rrhasistenciaa->update(['horasalidaalmuerzo' => date("H:i:s"), 
                    'totalhoras' => $horax7]);

                    return  redirect()->back()->with('cedula', "Hora de Salida al almuerzo: " . $rrhasistenciaa->rrhempleado->nombre . " " . date("H:i:s"));
                }
            } elseif ($request->optionsRadios == "hea") {

                $asistencia = Rrhasistencia::join('rrhempleados', 'rrhempleados.id', '=', 'rrhasistencias.rrhempleado_id')
                    ->where('rrhempleados.cedula', '=', $request->cedula)
                    ->where('fecha', '=', date('Y-m-d'))
                    ->get();

                $asistenciaa = Rrhasistencia::join('rrhempleados', 'rrhempleados.id', '=', 'rrhasistencias.rrhempleado_id')
                    ->where('rrhempleados.cedula', '=', $request->cedula)
                    ->where('fecha', '=', date('Y-m-d'))->select('rrhasistencias.id')
                    ->first();

                if ($asistencia->isEmpty()) {
                    return  redirect()->back()->with('cedula', "Por favor ingresar hora de entrada primero");
                } else {
                    $rrhasistenciaa = Rrhasistencia::find($asistenciaa->id);
                    if ($rrhasistenciaa->horasalidaalmuerzo) {
                        if ($rrhasistenciaa->horaentralmuezo) {
                            return  redirect()->back()->with('cedula', "Por favor ya ingreso su hora de entrada de almuerzo");
                        }
                        $rrhasistenciaa->update(['horaentralmuezo' => date("H:i:s")]);
                        return  redirect()->back()->with('cedula', "Hora de entrada del almuerzo: " . $rrhasistenciaa->rrhempleado->nombre . " " . date("H:i:s"));
                    } else {
                        return  redirect()->back()->with('cedula', "Por favor ingresar primero hora de salida de Almuerzo");
                    }
                    //$rrhasistenciaa->update(['horasalidaalmuerzo' => date("H:i:s")]);

                    return  redirect()->back()->with('cedula', "Hora de Salida al almuerzo: " . $rrhasistenciaa->rrhempleado->nombre . " " . date("H:i:s"));
                }
            } elseif ($request->optionsRadios == "hs") {

                $asistencia = Rrhasistencia::join('rrhempleados', 'rrhempleados.id', '=', 'rrhasistencias.rrhempleado_id')
                    ->where('rrhempleados.cedula', '=', $request->cedula)
                    ->where('fecha', '=', date('Y-m-d'))
                    ->get();

                $asistenciaa = Rrhasistencia::join('rrhempleados', 'rrhempleados.id', '=', 'rrhasistencias.rrhempleado_id')
                    ->where('rrhempleados.cedula', '=', $request->cedula)
                    ->where('fecha', '=', date('Y-m-d'))->select('rrhasistencias.id')
                    ->first();

                if ($asistencia->isEmpty()) {
                    return  redirect()->back()->with('cedula', "Por favor ingresar hora de entrada primero");
                } else {
                    $rrhasistenciaa = Rrhasistencia::find($asistenciaa->id);
                    if ($rrhasistenciaa->horaentralmuezo) {
                        if ($rrhasistenciaa->horasalidaalmuerzo) {
                            if ($rrhasistenciaa->horasalida) {
                                return  redirect()->back()->with('cedula', "Por favor ya ingreso su hora de salida del trabajo");
                            }
                            $datex7 = new DateTime($rrhasistenciaa->horaentralmuezo);
                            $datex77 = new DateTime(date("H:i:s"));
                            $horax7 = date_diff($datex7, $datex77)->format('%H:%I:%S');
                            $rrhasistenciaa->update(['horasalida' => date("H:i:s"), 
                            'totalhoras' => $rrhasistenciaa->suma_horas($rrhasistenciaa->totalhoras,$horax7)]);
                            return  redirect()->back()->with('cedula', "Hora de salida del trabjo: " . $rrhasistenciaa->rrhempleado->nombre . " " . date("H:i:s"));
                        } else {
                            return  redirect()->back()->with('cedula', "Por favor ingresar primero hora de salida de Almuerzo");
                        }
                    } else {
                        return  redirect()->back()->with('cedula', "Por favor ingresar primero hora de entrada del  Almuerzo");
                    }
                    //$rrhasistenciaa->update(['horasalidaalmuerzo' => date("H:i:s")]);

                    return  redirect()->back()->with('cedula', "Hora de Salida al almuerzo: " . $rrhasistenciaa->rrhempleado->nombre . " " . date("H:i:s"));
                }
            }
        }
        return redirect()->route('rrhasistencias.index');
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
        $date = Carbon::now();
    }
}
