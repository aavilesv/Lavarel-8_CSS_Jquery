<?php

namespace App\Http\Controllers\Compras;

use App\Http\Controllers\Controller;
use App\Models\Compras\Articulo;
use App\Models\Compras\Marca;
use App\Models\inventarios\Inventario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class Articulocontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $articulo = Articulo::all();
        return view('articulos.index', compact('articulo'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $action = "Nuevo";
        $marca = Marca::where('status', '=', '1')->get();
        return view('articulos.save', compact('action', 'marca'));
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

            $articulo = Articulo::create($request->all());
            if ($request->image) {
                $image = $request->file('image')->store('public/articulo');
                $url = Storage::url($image);
                $articulo->image = $url;
            }
            $articulo->save();
            Inventario::Create(['articulo_id' => $articulo->id,'incial' => 
            $request->existencia, 'usercrear' => auth()->user()->nombre . " " . auth()->user()->apellido, 
            'precio' => $request->precio,'existencia' => $request->existencia
            ]);
            DB::commit();
            return redirect()->route('articulo.index');
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
        $action = "Editar";
        $marca = Marca::all();
        $articulo = Articulo::find($id);
        return view('articulos.save', compact('action', 'marca', 'articulo'));
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
            //auth()->user()->id
        
            $articulo = Articulo::find($id);
            $articulo->update($request->all());
            if ($request->image) {
                if ($articulo->image) {
                    $cade = str_replace('storage', 'public', $articulo->image);
                    Storage::delete($cade);
                }

                $image = $request->file('image')->store('public/articulo');
                $url = Storage::url($image);
                $articulo->image = $url;
            }
            $articulo->save();
            $inventario = Inventario::join('articulos', 'articulos.id', '=', 'inventarios.articulo_id')
            
            ->where('articulos.id', '=', $articulo->id)->select('inventarios.id')
            ->first();
            $inventar = Inventario::find($inventario->id);
            $existencia=($request->existencia +$inventar->ingreso)-$inventar->articulosalida;
            $inventar->update(['articulo_id' => $articulo->id,'incial' => 
            $request->existencia, 'usercrear' => auth()->user()->nombre . " " . auth()->user()->apellido, 'precio' => $request->precio
            ,'existencia' => $existencia
            ]);
            DB::commit();
            return redirect()->route('articulo.index');
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
