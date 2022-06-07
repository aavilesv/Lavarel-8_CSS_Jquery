<?php
namespace App\Http\Controllers\Cobro;
use App\Http\Controllers\Controller;
use App\Models\Cobro\Caja;
use App\Models\Cobro\Cajadetalle;
use App\Models\Cobro\Cajaextra;
use App\Models\Cobro\Gastocaja;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
class Cajascontroller extends Controller
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
                return redirect()->route('cuentasporcobrar.index')->with('success', "Primero ingresar valores a Caja");
            }
            $caja = Cajadetalle::join('cuentasporcobrars', 'cuentasporcobrars.id', '=', 'cajadetalles.cuentasporcobrar_id')
                ->join('cajas', 'cajas.id', '=', 'cajadetalles.caja_id')
                ->whereDate('cajas.fecha', '=', date('Y-m-d'))
                ->select('cajas.id as caja', 'cajadetalles.id', 'cajadetalles.cuentasporcobrar_id',
                 'cajadetalles.fechainicio', 'cajadetalles.fechafinal', 'cajadetalles.monto','cajadetalles.usuariocreado', 
                 
                 'cajadetalles.abonado', 'cajadetalles.status', 'cajadetalles.created_at')->orderBy('cajadetalles.id')->get();
            $cobroextra = Cajaextra::join('cajas', 'cajas.id', '=', 'cajaextras.caja_id')
                ->whereDate('cajas.fecha', '=', date('Y-m-d'))->get();
            $cajaa = Caja::whereDate('fecha', '=', date('Y-m-d'))
                ->select('fecha', 'id', 'saldocaja', 'cajaprincipal', 'saldoingeniero', 'cajafinal', 'status',)
                ->orderBy('id')->first();

            $totalgasto = Gastocaja::join('cajas', 'cajas.id', '=', 'gastocajas.caja_id')
                ->whereDate('cajas.fecha', '=', date('Y-m-d'))
                ->select('cajas.id', DB::raw('SUM(gastocajas.monto) as total_sales'))
                ->groupBy('cajas.id')->first();

            $gasto = Gastocaja::join('cajas', 'cajas.id', '=', 'gastocajas.caja_id')
                ->whereDate('cajas.fecha', '=', date('Y-m-d'))
                ->select('gastocajas.caja_id', 'gastocajas.id', 'gastocajas.nombre', 'gastocajas.factura', 'gastocajas.soporte', 'gastocajas.descripcion', 'gastocajas.observacion', 'gastocajas.monto', 'gastocajas.image','gastocajas.usuariocreado')->orderBy('gastocajas.id')->get();
            DB::commit();
            return view('cobro.index', compact('caja', 'gasto', 'cajaa', 'totalgasto', 'cobroextra'));
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
            Caja::create([
                'fecha' => date('Y-m-d'), 'saldocaja' => $request->saldocaja, 'cajaprincipal' => $request->saldocaja, 'cajafinal' => $request->saldocaja
            ]);
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
        return view('cobro.gasto', compact('id'));
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
            $gasto = Gastocaja::create($request->all());
            if ($request->image) {
                $image = $request->file('image')->store('public/gastoimage');
                $url = Storage::url($image);
                $gasto->image = $url;
            }
            $gasto->usuariocreado=auth()->user()->nombre . " " . auth()->user()->apellido;

            $gasto->save();
            $caja = Caja::find($id);
            $dato = $caja->saldocaja - $request->monto;
            if ($dato >= 0) {
                $caja->saldocaja = $caja->saldocaja - $request->monto;
                $caja->cajafinal = $caja->cajafinal - $request->monto;
                $caja->save();
                DB::commit();
            } else {
                return  redirect()->back()->with('error', "No existe esa cantidad en caja:$" . $request->monto);
            }



            return redirect()->route('diariacobro.index');
        } catch (\Exception $exception) {
            DB::rollback();
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
