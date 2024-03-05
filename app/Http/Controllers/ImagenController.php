<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\ImageManager;

class ImagenController extends Controller
{
    public function store(Request $request)
    {
        $imagen = $request->file('file');

        // Nombramos la imagen con un uudi y agregamos su formato/extension
        $nombreImagen = Str::uuid() . "." . $imagen->extension();
        // Leemos la imagen
        $imagenServidor = ImageManager::imagick()->read($imagen);
        // Cambiamos las dimensiones de la imagen
        $imagenServidor->resize(1000, 1000);
        // Creamos el path donde se guardará la imagen
        $imagenPath = public_path('uploads') . '/' . $nombreImagen;
        // Guardamos la imagen
        $imagenServidor->save($imagenPath);

        return response()->json(['imagen' => $nombreImagen]);
    }
}
