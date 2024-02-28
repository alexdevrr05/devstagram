<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

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

        // TODO: Validación

        //  existe esta sintáxis
        $this->validate($request, [
            'name' => 'required|max:30',
            'username' => 'required|unique:users|min:3|max:20',
            'email' => "required|unique:users|email|max:60",
            'password' => "required|confirmed|min:6",
            'password_confirmation' => "",
        ]);

        // otra sintáxis
        // $this->validate($request, [
        //     'name' => ['required', 'max:30'],
        //     'username' => ['required', 'unique:users'],
        // ]);

        // Es el equivalente INSERT INTO usuarios;
        User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => $request->password,
        ]);
    }
}
