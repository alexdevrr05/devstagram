<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PerfilController extends Controller
{
    public function __construct()
    {
       $this->middleware('auth'); 
    }
    public function index()
    {
        dd('Desde el index');
    }

    public function store()
    {
       dd('Desde el store'); 
    }
}
