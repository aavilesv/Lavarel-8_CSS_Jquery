<?php

namespace App\Http\Controllers\Cobro;

use App\Http\Controllers\Controller;
use App\Models\Cobro\Caja;
use App\Models\Cobro\Cajaextra;
use App\Models\contratosclientes\Cclicontratocliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class cobroextras extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        try {
            $caja = Caja::whereDate('fecha', '=', date('Y-m-d'))
            ->select('id',)->orderBy('id')->get();
            if ($caja->isEmpty()) {
                $caja="";
            }else{
                $caja="null";
            }
            $cobroextra = Cajaextra::
            join('cajas','cajas.id','=','cajaextras.caja_id')
            ->whereDate('cajas.fecha','=',date('Y-m-d'))->paginate(6);
            return view('cobroextras.cobro', compact('cobroextra','caja'));
        } catch (\Exception $exception) {
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
        $action="Nuevo";

                $caja=Caja::whereDate('fecha','=',date('Y-m-d'))
                ->select('id')->first();
                $caja=Caja::find($caja->id);
                $contratocliente=Cclicontratocliente::where('eliminar','=','1')->get();
        return view('cobroextras.save',compact('action', 'contratocliente','caja'));//
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
        
            $cobrar =Cajaextra::create($request->all());
            if ($request->image) {

                $image = $request->file('image')->store('public/cobrosextras');
                $url = Storage::url($image);
                $cobrar->image = $url;
            }
            $cobrar->usuariocreado=auth()->user()->nombre . " " . auth()->user()->apellido;
            $cobrar->save();
            $caja=Caja::whereDate('fecha','=',date('Y-m-d'))
            ->select('id')->first();
            $cajaa=Caja::find($caja->id);
            $cajaa->cajafinal=$cajaa->saldocaja+$request->monto;
            $cajaa->saldocaja=$cajaa->saldocaja+$request->monto;
            
            $cajaa->save();

            DB::commit();
            return redirect()->route('cobroextra.index');

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
        $caja=Caja::find($id);
        $contratocliente=Cclicontratocliente::where('eliminar','=','1')->get();
        return view('cajareporte.extra',compact('contratocliente','caja'));//
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
            $cobrar =Cajaextra::create($request->all());
            if ($request->image) {
                $image = $request->file('image')->store('public/cobrosextras');
                $url = Storage::url($image);
                $cobrar->image = $url;
            }
            $cobrar->usuariocreado=auth()->user()->nombre . " " . auth()->user()->apellido;
            $cobrar->save();
            $cajaa=Caja::find($id);
            $cajaa->cajafinal=$cajaa->saldocaja+$request->monto;
            $cajaa->saldocaja=$cajaa->saldocaja+$request->monto;
            
            $cajaa->save();

            DB::commit();
            return redirect()->route('reportecaja.show',$id);

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
