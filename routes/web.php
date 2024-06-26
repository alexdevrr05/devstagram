<?php

use App\Http\Controllers\ComentarioController;
use App\Http\Controllers\ImagenController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\PerfilController;
use App\Http\Controllers\PostController;
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
Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'store']);
Route::post('/logout', [LogoutController::class, 'store'])->name('logout');


// Route::get('/muro', [PostController::class, 'index'])->name('posts.index');

// Route Model Binding
Route::get('/{user:username}', [PostController::class, 'index'])->name('posts.index');
Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create'); // muestra formulario
Route::post('/posts', [PostController::class, 'store'])->name('posts.store'); // Guardar en la base de datos
Route::get('/{user:username}/posts/{post}', [PostController::class, 'show'])->name('posts.show'); // mostrar post particular
Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');

// Comentarios
Route::post('/{user:username}/posts/{post}', [ComentarioController::class, 'store'])->name('comentarios.store');

Route::post('/imagenes', [ImagenController::class, 'store'])->name('imagenes.store');

// Like a las fotos
Route::post('/post/{post}/likes', [LikeController::class, 'store'])->name('posts.likes.store');
Route::delete('/post/{post}/likes', [LikeController::class, 'destroy'])->name('posts.likes.destroy');


// Perfil
Route::get('/{user:username}/editar-perfil', [PerfilController::class, 'index'])->name('perfil.index');
Route::post('/{user:username}/editar-perfil', [PerfilController::class, 'store'])->name('perfil.store');
