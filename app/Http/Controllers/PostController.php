<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function __construct()
    {
        // protege la ruta (solo se muestra si hay una sesion iniciada)
        $this->middleware('auth');
    }

    public function index(User $user)
    {
        return view('dashboard', [
            'user' => $user
        ]);
    }

    public function create()
    {
        dd('Desde create');
    }
}
