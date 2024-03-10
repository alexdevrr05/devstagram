<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class PerfilController extends Controller
{
    public function __construct()
    {
       $this->middleware('auth'); 
    }
    public function index(User $user)
    {
        $this->authorize('viewAny', $user);
        return view('perfil.index');
    }

    public function store()
    {
       dd('Desde el store'); 
    }
}
