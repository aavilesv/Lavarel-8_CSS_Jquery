<?php

namespace App\Http\Controllers\soporte;

use App\Http\Controllers\Controller;
use App\Models\Soporte\Novedad;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class novedadupdatecontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $novedads = Novedad::all();

        return view('novedadsmodificar.index', compact('novedads'));
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
        $novedad = Novedad::find($id);

        return view('novedadsmodificar.edit', compact('novedad'));
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

        $request->validate([
            'fechavisita' => 'required', 'horavisita' => 'required',
            'novedadopercance' => 'required'
        ]);
        DB::beginTransaction();
        try {
            $novedad = Novedad::find($id);
            $novedad->novedadopercance = $request->novedadopercance;
            $novedad->horainciar = $request->horainciar;
            $novedad->especificar = $request->especificar;
            $novedad->nombre = $request->nombre;
            $novedad->fechavisita = $request->fechavisita;
            $novedad->horavisita = $request->horavisita;
            $novedad->parentesco = $request->parentesco;
            $novedad->celular = $request->celular;
            $novedad->save();
            DB::commit();
            return redirect()->route('novedadupdatecontroller.index');
        } catch (\Exception $exception) {
            return  redirect()->back()->with('error', "Error" . $exception->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        $id = $request->get('id');
        $Cclicontratocliente = Novedad::find($id);
        $Cclicontratocliente->delete();
      
        return  redirect()->route('novedadupdatecontroller.index');
    }
}
