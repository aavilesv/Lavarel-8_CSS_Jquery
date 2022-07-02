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
    
    class cajareportecontroller extends Controller
    {
        /**
         * Display a listing of the resource.
         *
         * @return \Illuminate\Http\Response
         */
        public function index(Request $request)
        {
            $buscador = "" . $request->buscador;
            $buscarincial = "" . $request->fechainicial;
            $buscarfinal = "" . $request->fechafinal;
            $caja = Caja::orderBy('fecha', 'DESC')->paginate(15);
            if (isset($_GET['fechainicial']) and isset($_GET['fechafinal']) ) {
                if ($buscarincial  != $buscarfinal) {
                    $caja = Caja::whereBetween('fecha',[$request->fechainicial, $request->fechafinal])
                    ->orderBy('fecha', 'DESC')->paginate(15);
                    
                }
                else
                {
                    $caja = Caja::whereDate('fecha','=', $request->fechafinal)
                    ->orderBy('fecha', 'DESC')->paginate(15);
                }
            }
            
                return view('cajareporte.index', compact('buscador','buscarincial','buscarfinal','caja'));
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
            try {
    
                
                $cajaa = Caja::find($id);
                
                $caja = Cajadetalle::join('cuentasporcobrars', 'cuentasporcobrars.id', '=', 'cajadetalles.cuentasporcobrar_id')
                    ->join('cajas', 'cajas.id', '=', 'cajadetalles.caja_id')
                    ->where('cajas.id', '=', $cajaa->id)
                    ->select('cajas.id as caja', 'cajadetalles.id', 'cajadetalles.cuentasporcobrar_id', 
                    'cajadetalles.fechainicio', 'cajadetalles.fechafinal', 'cajadetalles.monto','cajadetalles.usuariocreado', 
                    'cajadetalles.abonado', 'cajadetalles.status', 'cajadetalles.created_at')->orderBy('cajadetalles.id')->get();
                $cobroextra = Cajaextra::join('cajas', 'cajas.id', '=', 'cajaextras.caja_id')
                    ->where('cajas.id', '=',  $cajaa->id) ->select('cajaextras.id','cajaextras.descripcion'
                    ,'cajaextras.nombre','cajaextras.ingresapor','cajaextras.caja_id','cajaextras.monto','cajaextras.observacion'
                    ,'cajaextras.factura' ,'cajaextras.recibo' ,'cajaextras.online' ,'cajaextras.image','cajaextras.usuariocreado')->get();
                

                $totalgasto = Gastocaja::join('cajas', 'cajas.id', '=', 'gastocajas.caja_id')
                    ->where('cajas.id', '=', $cajaa->id)
                    ->select('cajas.id', DB::raw('SUM(gastocajas.monto) as total_sales'))
                    ->groupBy('cajas.id')->first();
    
                $gasto = Gastocaja::join('cajas', 'cajas.id', '=', 'gastocajas.caja_id')
                    ->where('cajas.id', '=', $cajaa->id)
                    ->select('gastocajas.caja_id', 'gastocajas.id', 'gastocajas.nombre', 
                    'gastocajas.factura', 'gastocajas.soporte', 'gastocajas.descripcion', 
                    'gastocajas.observacion', 'gastocajas.monto', 'gastocajas.image','gastocajas.usuariocreado')
                    ->orderBy('gastocajas.id')->get();
                
                return view('cajareporte.show', compact('caja', 'gasto', 'cajaa', 'totalgasto', 'cobroextra'));
            } catch (\Exception $exception) {
                
                return  redirect()->back()->with('error', "Error" . $exception->getMessage());
            }
        }
    
        /**
         * Show the form for editing the specified resource.
         *
         * @param  int  $id
         * @return \Illuminate\Http\Response
         */
        public function edit($id)
        {
            return view('cajareporte.gasto', compact('id'));
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
                $gasto->usuariocreado=auth()->user()->nombre . " " . auth()->user()->apellido;;
                if ($request->image) {
                    $image = $request->file('image')->store('public/gastoimage');
                    $url = Storage::url($image);
                    $gasto->image = $url;
                }
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
    
    
    
                return  redirect()->back();
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
