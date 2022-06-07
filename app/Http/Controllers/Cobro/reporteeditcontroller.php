<?php

namespace App\Http\Controllers\Cobro;

use App\Http\Controllers\Controller;
use App\Models\Cobro\Caja;
use App\Models\Cobro\Cajadetalle;
use App\Models\contratosclientes\Cclicontratocliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Models\cuentascobrar\Cuentasporcobrar;
use App\Models\cuentascobrar\Detallecuentasporcobrar;

class reporteeditcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        DB::beginTransaction();
        try {

            $caja = Caja::whereDate('fecha', '=',$request->fecha)->get();
            if ($caja->isEmpty()) {
                Caja::create([
                    'fecha' => $request->fecha, 'saldocaja' => $request->saldocaja,
                    'cajaprincipal' => $request->saldocaja, 'cajafinal' => $request->saldocaja
                ]);
            }else {
                return  redirect()->back()->with('error', "Ya se encuentra esa fecha registra en caja");    
            }

            DB::commit();
            return  redirect()->back()->with('success', "Guardado con exito");
        } catch (\Exception $exception) {
            DB::rollback();
            return  redirect()->back()->with('error', "Error" . $exception->getMessage());
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
        $caja = Caja::find($id);
        $contratocliente = Cclicontratocliente::where('eliminar', '=', '1')->get();
        return view('cajareporte.edit', compact('contratocliente', 'caja')); //
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

            $saldocaja = $request->sumatotal;
            $cajaa = Caja::find($id);
            $cajaa->cajafinal = $cajaa->saldocaja + $saldocaja;
            $cajaa->saldocaja = $cajaa->saldocaja + $saldocaja;
            $cajaa->save();
            $cobrar = new Cuentasporcobrar;
            $cobrar->saldo = $request->saldo;
            $cobrar->valorpagado = $request->valorpagado;
            $cobrar->sumatotal = $request->sumatotal;
            $cobrar->abonadoanterior = $request->abonadoanterior;
            $cobrar->saldoanterior = $request->totalpagar;
            $cobrar->abonado = $request->abonado;
            $cobrar->created_at = $cajaa->fecha ;
            $cobrar->fecha = $cajaa->fecha;
            $cobrar->usuariocreador = auth()->user()->nombre . " " . auth()->user()->apellido;
            $cobrar->cclicontratocliente_id = $request->cclicontratocliente_id;
            if ($request->saldo == 0) {
                $cobrar->status = 1;
            } else {
                $cobrar->status = 0;
            }
            $cobrar->save();
            $detallecobra = new Detallecuentasporcobrar;
            $detallecobra->cuentasporcobrar_id = $cobrar->id;
            $detallecobra->recibo = $request->recibo;
            $detallecobra->online = $request->online;
            $detallecobra->factura = $request->factura;
            $detallecobra->observacion = $request->observacion;
            $detallecobra->banco = $request->banco;
            $detallecobra->documento = $request->documento;
            $detallecobra->fechadeposito = $request->fechadeposito;
            $detallecobra->valorpagado = $request->valorpagado;
            $detallecobra->parentezco = $request->parentezco;
            if ($request->archivo) {
                $image = $request->file('archivo')->store('public/documentos');
                $url = Storage::url($image);
                $detallecobra->archivo = $url;
            }
            $detallecobra->save();
           

            $cobrodetallees = new Cajadetalle();
            $cobrodetallees->caja_id = $cajaa->id;
            $cobrodetallees->cuentasporcobrar_id = $cobrar->id;
            $cobrodetallees->fechainicio = $request->fechainicio;
            $cobrodetallees->usuariocreado = auth()->user()->nombre . " " . auth()->user()->apellido;
            $cobrodetallees->fechafinal = $request->fechafinal;
            $cobrodetallees->monto = $request->valorpagado;
            $cobrodetallees->abonado = $request->abonado;
            $cobrodetallees->save();
            DB::commit();
            return redirect()->route('reportecaja.show', $id);
        } catch (\Exception $exception) {
            DB::rollBack();
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
