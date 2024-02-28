<?php

use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

// closure
Route::get('/', function () {
    return view('principal');
});

/**
 * una convención común nombrar el método
 *  que devuelve la vista principal de un recurso como "index"
 */
// controlador
Route::get('/crear-cuenta', [RegisterController::class, 'index'])->name('register');
Route::post('/crear-cuenta', [RegisterController::class, 'store']);
