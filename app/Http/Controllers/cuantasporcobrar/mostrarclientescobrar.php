<?php
namespace App\Http\Controllers\cuantasporcobrar;
use App\Http\Controllers\Controller;
use App\Models\contratosclientes\Cclicontratocliente;
use App\Models\cuentascobrar\Cuentasporcobrar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class mostrarclientescobrar extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        try {
            $contratocliente=Cclicontratocliente::find($request->id);
            $cuentascobrar = Cuentasporcobrar::
            join('cclicontratoclientes', 'cclicontratoclientes.id',
             '=', 'cuentasporcobrars.cclicontratocliente_id')
             ->where('cclicontratoclientes.id','=', $contratocliente->id)
             ->where(function($query){
                    return $query->where('cuentasporcobrars.saldo','!=', 0)
                    ->where('cuentasporcobrars.abonado','!=', 0);})
            ->select('cuentasporcobrars.id','cuentasporcobrars.cclicontratocliente_id',
                'cuentasporcobrars.saldo','cuentasporcobrars.fecha','cuentasporcobrars.abonado',
                'cuentasporcobrars.status')
            ->orderBy('id')->get();

            $cuentascobrarsaldo = Cuentasporcobrar::
            join('cclicontratoclientes', 'cclicontratoclientes.id',
             '=', 'cuentasporcobrars.cclicontratocliente_id')
             ->where('cclicontratoclientes.id','=', $contratocliente->id)
             ->where(function($query){
                    return $query->where('cuentasporcobrars.saldo','!=', 0)
                    ->where('cuentasporcobrars.abonado','==', 0);})
            ->select('cuentasporcobrars.id','cuentasporcobrars.cclicontratocliente_id',
                'cuentasporcobrars.saldo','cuentasporcobrars.fecha','cuentasporcobrars.abonado',
                'cuentasporcobrars.status')
            ->orderBy('id')->get();
            $cuentascobrarabonado = Cuentasporcobrar::
            join('cclicontratoclientes', 'cclicontratoclientes.id',
             '=', 'cuentasporcobrars.cclicontratocliente_id')
             ->where('cclicontratoclientes.id','=', $contratocliente->id)
             ->where(function($query){
                    return $query->where('cuentasporcobrars.saldo','==', 0)
                    ->where('cuentasporcobrars.abonado','!=', 0);})
            ->select('cuentasporcobrars.id','cuentasporcobrars.cclicontratocliente_id',
                'cuentasporcobrars.saldo','cuentasporcobrars.fecha','cuentasporcobrars.abonado',
                'cuentasporcobrars.status')
            ->orderBy('id')->get();
            $data =[
                'contratocliente'=>$contratocliente,
                'cuentascobrarsaldo'=>$cuentascobrarsaldo,
                'cuentascobrar'=>$cuentascobrar,
                'cuentascobrarabonado'=>$cuentascobrarabonado,
            ];
            return response()->json($data);
            
            // response()->json("Transacción con éxito"+$data);
        } catch (\Exception $exception) {
            
            return response()->json("Error" . $exception->getMessage());
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        try {

                        
            $cuentascobrar = Cuentasporcobrar:: find($request->id);
            $cuentascobrar->saldo=$cuentascobrar->saldo-$request->saldo;
            $cuentascobrar->usuariomodificar=auth()->user()->nombre . " " . auth()->user()->apellido;
            $cuentascobrar->status=1;
            $cuentascobrar->save();
            return response()->json($request->saldo);
            
            // response()->json("Transacción con éxito"+$data);
        } catch (\Exception $exception) {
            
            return response()->json("Error" . $exception->getMessage());
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
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
    }
}
