<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'email' => "required|email",
            'password' => "required",
        ]);

        // back: redirigir al usuario de vuelta al formulario
        if(!auth()->attempt($request->only('email', 'password'), $request->remember)) {
            return back()->with('mensaje', 'Credenciales incorrectas');
        }
        
        // Si las credenciales son correctas
        return redirect()->route('posts.index');
    }
}
