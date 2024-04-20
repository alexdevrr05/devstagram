<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\ImageManager;

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

    public function store(Request $request)
    { 
        // Modificar el Request
        $request->request->add(['username' => Str::slug($request->username)]);

        /** .auth()->user()->id: esto es útil cuando estás actualizando un registro y quieres
         *  asegurarte de que no estás duplicando el nombre de usuario de otro usuario, pero permitiendo 
         *  que el usuario actual mantenga su propio nombre de usuario.*/ 

        $this->validate($request, [
            // cuando hay mas de 3 reglas de validacion es recomendable usar un arreglo
            'username' => ['required', 'unique:users,username,'.auth()->user()->id, 'min:3', 'max:20', 'not_in:twitter,editar-perfil'],
        ]);

        if($request->imagen) {
            $imagen = $request->file('imagen');
            $nombreImagen = Str::uuid() . "." . $imagen->extension();
            $imagenServidor = ImageManager::imagick()->read($imagen);
            $imagenServidor->resize(1000, 1000);
            $imagenPath = public_path('perfiles') . '/' . $nombreImagen;
            $imagenServidor->save($imagenPath);
        }

        $usuario = User::find(auth()->user()->id);
        
        $usuario->username = $request->username;
        $usuario->imagen = $nombreImagen ?? '';
        // Guardar cambios
        $usuario->save();

        // Redireccionar al perfil del usuario
        // $usuario->username = "ultima copia" (por si actualiza el username)
        return redirect()->route('posts.index', $usuario->username);
    }
}
