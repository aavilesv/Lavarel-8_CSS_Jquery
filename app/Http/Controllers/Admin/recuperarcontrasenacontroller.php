<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\Sendemail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class recuperarcontrasenacontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('recuperar');
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
        $request->validate([
            'email'=>'required']);
          
        $user = User::where('email', '=',$request->email)->first();
        $userr = User::where('email', '=',$request->email)->get();
       
        if ($userr->isEmpty()){
            return  redirect()->back()->with('status','Credenciales incorrectas');
          
            /*$user = new User;
            $user->where('email', '=', Auth::user()->email)
                 ->update(['password' => bcrypt($request->password)]);*/
            //     return  redirect()->back()->with('message','Credenciales incorrectas');
             //    return redirect()->route('usuario.index')->with('status', 'Password cambiado con éxito');
        }
        else
        {   
            
            $users = new User;
            $users->where('email', '=', $request->email)
            ->update(['password' => bcrypt('quantika324')]);
            $data='quantika324';
            Mail::to($request->email)->send(new Sendemail($data));
            return  redirect()->back()->with('status','Password cambiado con éxito revisar su correo');

           
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
