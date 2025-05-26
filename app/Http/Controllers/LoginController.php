<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Models\User;
use Auth;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index(){
        return view('login');
    }

    public function store(LoginRequest $request){
        $credentials = $request->only('user', 'password');
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            
            return redirect()->intended('/panel-control');
            
        } else {
             return back()->withErrors(['message_incorrect_credentials'
                                                    => 
                                                  'Credenciales incorrectos'
                                                 ]);
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/iniciar-sesion');
    }
}
