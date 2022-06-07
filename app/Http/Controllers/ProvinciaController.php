<?php

namespace App\Http\Controllers;

use App\Models\Cliente\Provincia;
use Illuminate\Http\Request;

class ProvinciaController extends Controller
{
    //
    public function provincialistar()
    {
        $provincias = Provincia::all();
        return view('provincias.provincialistar', compact('provincias'))
            ->with('i');
    }
    public function ingresar(Request $request)
    {
        $request->validate([
            'name' => 'required|max:15'
        ]);
        $provincia = new Provincia();
        $provincia->name = $request->name;
        $provincia->save();
        return redirect()->route('provincias.provincialistar');
    }
    public function create()
    {
        return view('provincias.create');
    }
    public function editar(Provincia $provincia)
    {
        return view('provincias.editar', compact('provincia'));
    }
    public function update(Request $request, Provincia $provincia)
    {
        $request->validate([
           
            'name' => 'required|max:15'
        ]);
        $provincia->name = $request->name;
        $provincia->save();
        return redirect()->route('provincias.provincialistar');
    }

}
