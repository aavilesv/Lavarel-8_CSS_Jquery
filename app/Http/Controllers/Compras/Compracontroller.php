<?php

namespace App\Http\Controllers\Compras;

use App\Http\Controllers\Controller;
use App\Library\Response;
use App\Models\Compras\Articulo;
use App\Models\Compras\Compra;
use App\Models\Compras\Detallecompra;
use App\Models\Compras\Proveedor;
use App\Models\inventarios\Inventario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Compracontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $compra = Compra::all();
        return view('compras.index', compact('compra'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $articulo = Articulo::where('status', '=', '1')->get();
        $proveedor = Proveedor::where('status', '=', '1')->get();
        return view('compras.save', compact('articulo', 'proveedor'));
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
            $data = $request->json()->all();
            $compr = Compra::Create(['proveedor_id' => $data['cliente'], 'factura' => $data['factura'], 'subtotal' => $data['subtotal'], 'total' => $data['total'], 'iva' => '12']);
            $factura = $data['factura'];
            foreach ($data['items']  as &$valor) {
                Detallecompra::Create(['cantidad' => $valor['cantidad'], 'precio' => $valor['precio'], 'totalprecio'  => round($valor['subtotal'], 2), 'compra_id' => $compr->id, 'articulo_id' => $valor['id']]);
                $articulo = Articulo::find($valor['id']);
              
                $articulo->cajanumero += $valor['cajanumero'];

                $articulo->save();
                $inventario = Inventario::join('articulos', 'articulos.id', '=', 'inventarios.articulo_id')

                    ->where('articulos.id', '=', $articulo->id)->select('inventarios.id')
                    ->first();
                
                $inventar = Inventario::find($inventario->id);
                $la=$inventar->ingreso+$valor['cantidad'];
                $vi=($la+$inventar->incial)-$inventar->articulosalida;
                $inventar->update(['factura'=>$factura,
                    'ingreso' =>$la,
                    'usercrear' => auth()->user()->nombre . " " . auth()->user()->apellido,
                    'precio' => $valor['precio'], 'existencia' => $vi
                ]);
                //auth()->user()->id
            }
            DB::commit();
            return response()->json("Transacción con éxito");
        } catch (\Exception $exception) {
            DB::rollBack();
            return response()->json("Error" . $exception->getMessage());
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
        $compra = Compra::find($id);
        $detallecompra = Detallecompra::join("compras", "compras.id", "=", "detallecompras.compra_id")
            ->where('compras.id', '=', $compra->id)->get();
        return view('compras.buscar', compact('compra', 'detallecompra'));
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
