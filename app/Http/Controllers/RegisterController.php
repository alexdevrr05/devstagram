<?php

namespace App\Http\Controllers;

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
    public function store()
    {
        dd('post...');
    }
}
