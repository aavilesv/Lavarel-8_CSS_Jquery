<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Models\admin\Role;
use Illuminate\Support\Str;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $data = User::all();//where('id','!=',auth()->user()->id)->get()
        return view('users.index', compact('data'))
            ->with('i');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = Role::all();
        return view('users.create', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required', 'apellido' => 'required', 'cedula' => 'required|max:10|min:10', 'email' => 'required', 'telefono' => 'required', 'nacimiento' => 'required', 'direccion' => 'required', 'role' => 'required'
        ]);
        try {

            
            DB::beginTransaction();
            $url = "";
            $role = Role::find($request->role);
            if ($request->image) {
                $image = $request->file('image')->store('public/usuarios');
                $url = Storage::url($image);
            }
            $user = User::create([
                $url, 'nombre' => $request->nombre, 'apellido' => $request->apellido,
                 'email' => $request->email, 'cedula' => $request->cedula,
                'direccion' => $request->direccion, 'telefono' => $request->telefono,
                'nacimiento' => $request->nacimiento,
                'email_verified_at' => now(),
                'password' => bcrypt('quantika324'),
                 'remember_token' => Str::random(10)
            ])->assignRole($role->name);
            $user->image = $url;
            $user->save();
            DB::commit();
            return redirect()->route('users.index');
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
        $user = User::find($id);
        return view('users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $user = User::find($id);
        return view('users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
        $request->validate([
            'nombre' => 'required', 'apellido' => 'required', 'cedula' => 'required|max:10|min:10', 'email' => 'required', 'telefono' => 'required', 'direccion' => 'required'
        ]);
        try {


            DB::beginTransaction();
            $user->update($request->all()); //->assignRole('Administrativo');
            if ($request->image) {
                if ($user->image) {
                    $cade = str_replace('storage', 'public', $user->image);
                    Storage::delete($cade);
                }
               
                $image = $request->file('image')->store('public/usuarios');
                $url = Storage::url($image);
                $user->image = $url;
                $user->save();
            }
            DB::commit();
            return redirect()->route('users.index');
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
    public function destroy(Request $request)
    {
        $id = $request->get('id');
        $flight = User::find($id);
        $flight->delete();
        return redirect()->route('users.index');
    }
}
