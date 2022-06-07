<?php
namespace App\Http\Controllers\soporte;
use App\Http\Controllers\Controller;
use App\Models\Cliente\Canton;
use App\Models\Cliente\Provincia;
use Illuminate\Http\Request;
class CantonController extends Controller
{
    public function cantonlistar(){
        $cantons = Canton::all();
        return view('cantons.cantonlistar',compact('cantons'))
            ->with('i');
    
    }
    public function listarcanton(){
        $cantons = Canton::
        join('provincias', 'provincias.id',
        '=', 'cantons.provincia_id')
        ->select('cantons.id','cantons.name','cantons.created_at','provincias.name as provincia_id')->get();
        return datatables()->of($cantons)
        /*->editColumn('created_at', function($cantons){
            return $cantons->created_at->diffForHumans();
        })*/
       // ->addColumn('edit','<a class="btn btn-link btn-primary btn-lg" href="{{ route(\'cantons.editar\',$id) }}"><i class="fa fa-edit"></i></a>')
       // le pones poner todo  
       ->addColumn('btn', 'cantons.datatable.btn')
        ->rawColumns(['btn'])
        ->toJson();
    }
    public function create()
    {
        $provincia = Provincia::all();
        $action="new";
        return view('cantons.create',compact('provincia','action'));
    }
        
    public function ingresar(Request $request){
        // esto retorna al formulario 
        $request->validate([
            'name'=>'required','provincia_id'=>'required']);
            $canton =new Canton();
            $canton->name=$request->name;
            $canton->provincia_id=$request->provincia_id;
            $canton->save();
      return redirect()->route('cantons.cantonlistar');
    }
    public function editar(Canton $canton)
    {   $action="edit";
        $provincias = Provincia::all();
        return view('cantons.editar', compact('canton','action','provincias'));
    }
    public function update(Request $request,Canton $canton){
        $request->validate([
            'name'=>'required','provincia_id'=>'required']);
        $canton->name=$request->name;
        $canton->provincia_id=$request->provincia_id;
        $canton->save();
        return redirect()->route('cantons.cantonlistar');
    }
}
