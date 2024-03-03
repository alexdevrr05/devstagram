<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function __construct()
    {
        // protege la ruta (solo se muestra si hay una sesion iniciada)
        $this->middleware('auth');
    }

    public function index()
    {
        return view('dashboard');
    }
}
