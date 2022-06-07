<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{


    public function login()
    {
        return view('login');
    }
    public function validar(Request $request)
    {
        $request->validate([
            'email' => ['required','email','string'], 'password' => ['required','string']
        ]);

        // te ayuda que este seguro el inicio de sessión
        request()->session()->regenerate();
        if (Auth::attempt(['email' => $request->email, 'password' =>  $request->password])) {
            return redirect('/');
        };
        
        throw ValidationException::withMessages([
                'email'=> __('auth.failed')
        ]);
   
    }

    public function logout(Request $request)
    {    Auth::logout();
         $request->session()->invalidate();
         $request->session()->regenerateToken();
         return redirect('login');

    }
}
