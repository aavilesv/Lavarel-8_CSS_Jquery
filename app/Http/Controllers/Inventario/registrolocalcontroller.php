<?php

namespace App\Http\Controllers\Inventario;

use App\Http\Controllers\Controller;
use App\Models\Cliente;
use App\Models\Compras\Articulo;
use App\Models\inventarios\Inventario;
use App\Models\salidas\Salida;
use ArithmeticError;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class registrolocalcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        
        $salidas = Salida::all();
        return view('salidas.index',compact('salidas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $action="Nuevo";
        $clientes=Cliente::all();
        $articulo=Articulo::where('status','=',1)->get();
        return view('salidas.save',compact('action','clientes','articulo'));
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
            $inventario = Inventario::join('articulos', 'articulos.id', '=', 'inventarios.articulo_id')
            
            ->where('articulos.id', '=', $request->articulo)->select('inventarios.id')
            ->first();
            
            $inventar = Inventario::find($inventario->id);
            $salid=$inventar->articulosalida+$request->cantidad;
            $existencia=($inventar->incial+$inventar->ingreso)-$salid;
            $existen=$inventar->existencia;
            $inventari='Instalaciones en postes o en caja';
            if($existencia>=0){
                $inventar->update(['articulosalida' => 
                $salid,'descripcion'=>$request->accion, 'usermodifica' => auth()->user()->nombre . " " . auth()->user()->apellido
                ,'existencia' => $existencia
                ]);
                if($request->cliente_id !='Instalaciones en postes o en caja')
                {
                    $cliente=Cliente::find($request->cliente_id);
                    $inventari=$cliente->nombre." ".$cliente->apellido;
                    
                }
                $articulo=Articulo::find($request->articulo);
                
                $salida =new Salida();
                $salida->cantidad=$request->cantidad;
                $salida->codigo=$request->codigo;
                $salida->codig=$request->codig;
                $salida->factura=$request->factura;
                $salida->accion=$request->accion;
                $salida->cliente=$inventari;
                $salida->articulo=$articulo->marca->nombres." ".$articulo->nombres;
                $salida->save();
                
            }
            else{
                return  redirect()->back()->with('error', "Cantidad fuera del stock en almacen en existencia: ".$existen." y Usted ingreso: " .$request->cantidad);
            }
           
           
            
            
            DB::commit();
            return redirect()->route('LocalInventario.index');
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
        
        $action="Editar";
        
        $salida=Salida::find($id);
        return view('salidas.save',compact('action','salida'));
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
            
                $salida =Salida::find($id);
                $salida->factura=$request->factura;
                $salida->accion=$request->accion;
                $salida->save();
            DB::commit();
            return redirect()->route('LocalInventario.index');
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
