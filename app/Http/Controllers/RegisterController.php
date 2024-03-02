<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class RegisterController extends Controller
{
    function index()
    {
        return view('auth.register');
    }

    // dd = dump and die
    /** para imprimir los datos de forma legible para 
     * humanos y luego detener la ejecución del script */
    public function store(Request $request)
    {
        // dd($request);
        // 'get' es el atributo del input
        // dd($request->get('email'));

        // Generate a URL friendly "slug" from a given string.
        // Modificar el Request
        $request->request->add(['username' => Str::slug($request->username)]);

        // TODO: Validación

        //  existe esta sintáxis
        $this->validate($request, [
            'name' => 'required|max:30',
            'username' => 'required|unique:users|min:3|max:20',
            'email' => "required|unique:users|email|max:60",
            'password' => "required|confirmed|min:6",
            'password_confirmation' => "",
        ]);

        // Es el equivalente INSERT INTO usuarios;
        User::create([
            'name' => $request->name,
            // En este punto, username ya viene reescrito (como slug)
            'username' => $request->username,
            'email' => $request->email,
            'password' => $request->password,
        ]);

        // Redireccionar
        return redirect()->route('posts.index');
    }
}
