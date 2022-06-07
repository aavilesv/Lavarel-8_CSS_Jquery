<?php

namespace App\Http\Controllers\cuantasporcobrar;

use App\Http\Controllers\Controller;
use App\Models\Cobro\Caja;
use App\Models\Cobro\Cajadetalle;
use App\Models\Compras\Articulo;
use App\Models\Compras\Detallecompra;
use App\Models\contratosclientes\Cclicontratocliente;
use App\Models\cuentascobrar\Cuentasporcobrar;
use App\Models\cuentascobrar\Detallecuentasporcobrar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class cuentascontrollerpoocobrar extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        DB::beginTransaction();
        try {


            $caja = Caja::whereDate('fecha', '=', date('Y-m-d'))
                ->select('id',)->orderBy('id')->get();
            if ($caja->isEmpty()) {
                $caja = "";
            } else {
                $caja = "null";
            }

            DB::commit();
            return view('cuentasporcobrars.index', compact('caja'));
        } catch (\Exception $exception) {
            DB::rollback();
            return  redirect()->back()->with('error', "Error" . $exception->getMessage());
        }
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $action = "Nuevo";
        $contratocliente = Cclicontratocliente::where('eliminar', '=', '1')->get();
        return view('cuentasporcobrars.save', compact('action', 'contratocliente')); //
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
            $cobrar = new Cuentasporcobrar;
            $cobrar->saldo = $request->saldo;
            $cobrar->valorpagado = $request->valorpagado;
            $cobrar->sumatotal = $request->sumatotal;
            $cobrar->abonadoanterior = $request->abonadoanterior;
            $cobrar->saldoanterior = $request->totalpagar;
            $cobrar->abonado = $request->abonado;
            $cobrar->fecha = date('Y-m-d');
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
            $saldocaja = $request->sumatotal;
            $caja = Caja::whereDate('fecha', '=', date('Y-m-d'))->get();
            if ($caja->isEmpty()) {
                $cajaa = Caja::create([
                    'fecha' => date('Y-m-d'), 'saldocaja' => $saldocaja
                ]);
            } else {
                $caja = Caja::whereDate('fecha', '=', date('Y-m-d'))
                    ->select('id')->first();
                $cajaa = Caja::find($caja->id);
                $cajaa->cajafinal = $cajaa->saldocaja + $saldocaja;
                $cajaa->saldocaja = $cajaa->saldocaja + $saldocaja;
                $cajaa->save();
            }
            $cobrodetallees = new Cajadetalle;
            $cobrodetallees->caja_id = $cajaa->id;
            $cobrodetallees->cuentasporcobrar_id = $cobrar->id;
            $cobrodetallees->fechainicio = $request->fechainicio;
            $cobrodetallees->usuariocreado = auth()->user()->nombre . " " . auth()->user()->apellido;
            $cobrodetallees->fechafinal = $request->fechafinal;
            $cobrodetallees->monto = $request->valorpagado;
            $cobrodetallees->abonado = $request->abonado;
            $cobrodetallees->save();
            DB::commit();
            return redirect()->route('cuentasporcobrar.index');
        } catch (\Exception $exception) {
            DB::rollBack();
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
        $cuentacobrar = Cuentasporcobrar::find($id)->first();
        //return $cuentacobrar->id;

        $detallecuentascobrar = Detallecuentasporcobrar::join(
                'cuentasporcobrars',
                'cuentasporcobrars.id',
                '=',
                'detallecuentasporcobrars.cuentasporcobrar_id'
            )
            ->where('detallecuentasporcobrars.cuentasporcobrar_id', '=', $cuentacobrar->id)->select(
                'detallecuentasporcobrars.id',
                'detallecuentasporcobrars.cuentasporcobrar_id',
                'detallecuentasporcobrars.recibo',
                'detallecuentasporcobrars.online',
                'detallecuentasporcobrars.factura',
                'detallecuentasporcobrars.observacion',
                'detallecuentasporcobrars.banco',
                'detallecuentasporcobrars.documento',
                'detallecuentasporcobrars.fechadeposito',
                'detallecuentasporcobrars.valorpagado',
                'detallecuentasporcobrars.fechaapagar',
                'detallecuentasporcobrars.archivo',
                'detallecuentasporcobrars.parentezco',
                'detallecuentasporcobrars.created_at',
                'detallecuentasporcobrars.created_at',

            )->orderBy('id')->get();

        return view('cuentasporcobrars.show', compact('detallecuentascobrar', 'cuentacobrar')); //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cuentacobrar = Cuentasporcobrar::find($id);

        $detallecuentascobrar = Detallecuentasporcobrar::join(
                'cuentasporcobrars',
                'cuentasporcobrars.id',
                '=',
                'detallecuentasporcobrars.cuentasporcobrar_id'
            )
            ->where('detallecuentasporcobrars.cuentasporcobrar_id', '=', $cuentacobrar->id)->select(
                'detallecuentasporcobrars.id',
                'detallecuentasporcobrars.cuentasporcobrar_id',
                'detallecuentasporcobrars.recibo',
                'detallecuentasporcobrars.online',
                'detallecuentasporcobrars.factura',
                'detallecuentasporcobrars.observacion',
                'detallecuentasporcobrars.banco',
                'detallecuentasporcobrars.documento',
                'detallecuentasporcobrars.fechadeposito',
                'detallecuentasporcobrars.valorpagado',
                'detallecuentasporcobrars.fechaapagar',
                'detallecuentasporcobrars.archivo',
                'detallecuentasporcobrars.parentezco',
                'detallecuentasporcobrars.created_at',
                'detallecuentasporcobrars.created_at',
            )->orderBy('id')->get();
        return view('cuentasporcobrars.pendiente', compact('detallecuentascobrar', 'cuentacobrar')); //
    }
    /**
     * Update the specified resource in storage.

     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {


        DB::beginTransaction();
        try {
            $cobrar = Cuentasporcobrar::find($id);
            $cobrar->saldo = $request->saldo;
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

            DB::commit();
            return redirect()->route('cuentasporcobrar.index');
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

    public function destroy(Request $request)
    {
        DB::beginTransaction();
        try {

            $id = $request->get('id');

            //$flight = User::find($id);
            //$flight->delete();
            //return redirect()->route('users.index');
            $cuentacobrar = Cuentasporcobrar::find($id);

            $detallecuentascobrar = Detallecuentasporcobrar::join(
                    'cuentasporcobrars',
                    'cuentasporcobrars.id',
                    '=',
                    'detallecuentasporcobrars.cuentasporcobrar_id'
                )
                ->where('detallecuentasporcobrars.cuentasporcobrar_id', '=', $cuentacobrar->id)->select(
                    'detallecuentasporcobrars.id',
                    'detallecuentasporcobrars.cuentasporcobrar_id',

                )->orderBy('id')->first();

            $detallecuentascobrarr = Detallecuentasporcobrar::join(
                    'cuentasporcobrars',
                    'cuentasporcobrars.id',
                    '=',
                    'detallecuentasporcobrars.cuentasporcobrar_id'
                )
                ->where('detallecuentasporcobrars.cuentasporcobrar_id', '=', $cuentacobrar->id)->select(
                    'detallecuentasporcobrars.id',
                    'detallecuentasporcobrars.cuentasporcobrar_id',

                )->orderBy('id')->get();
            if ($detallecuentascobrarr->isEmpty()) {


                return  redirect()->back()->with('Error', "No existe ese detalle en la tabla detalles por cobrar");
            } else {
                Detallecuentasporcobrar::find($detallecuentascobrar->id)->delete();
            }
            $cajadetalles = Cajadetalle::join(
                    'cuentasporcobrars',
                    'cuentasporcobrars.id',
                    '=',
                    'cajadetalles.cuentasporcobrar_id'
                )
                ->where('cajadetalles.cuentasporcobrar_id', '=', $cuentacobrar->id)
                ->select('cajadetalles.id', 'cajadetalles.cuentasporcobrar_id',)
                ->orderBy('id')->first();
            $cajadetalless = Cajadetalle::join(
                    'cuentasporcobrars',
                    'cuentasporcobrars.id',
                    '=',
                    'cajadetalles.cuentasporcobrar_id'
                )
                ->where('cajadetalles.cuentasporcobrar_id', '=', $cuentacobrar->id)
                ->select('cajadetalles.id', 'cajadetalles.cuentasporcobrar_id',)
                ->orderBy('id')->get();
            if ($cajadetalless->isEmpty()) {


                return  redirect()->back()->with('Error', "No se genero cobros con ese cliente");
            } else {
                Cajadetalle::find($cajadetalles->id)->delete();
            }


            $caja = Caja::whereDate('fecha', '=', $cuentacobrar->fecha)
                ->select('id')->first();
            $cajaa = Caja::whereDate('fecha', '=', $cuentacobrar->fecha)
                ->select('id')->get();
            if ($cajaa->isEmpty()) {
                return  redirect()->back()->with('Error', "No se genero en esa fecha");
            } else {
                $cajaa = Caja::find($caja->id);
                $cajaa->cajafinal = $cajaa->cajafinal - $cuentacobrar->sumatotal;
                $cajaa->saldocaja = $cajaa->saldocaja - $cuentacobrar->sumatotal;
                $cajaa->save();
            }
            $cuentacobrar->eliminar = 1;
            $cuentacobrar->usuariomodificar = auth()->user()->nombre . " " . auth()->user()->apellido;
            $cuentacobrar->save();
            DB::commit();
            return redirect()->route('cuentasporcobrar.index');
        } catch (\Exception $exception) {
            DB::rollBack();
            return  redirect()->back()->with('error', "Error" . $exception->getMessage());
        }
    }
}
