@extends('layouts.app')

@section('titulo')
Post: {{ $post->titulo }}
@endsection


@section('contenido')
<div class="container mx-auto flex">
    <div class="md:w-1/2">
        <img src="{{ asset('uploads') . '/' . $post->imagen }}" alt="Imagen del post {{ $post->titulo }}">
        <div class="p-3">
            <p>0 Likes</p>
        </div>
        <div class="">
            {{-- user se llama la funcion/relacion - Post.php - --}}
            {{-- Obtenemos el usuario asociado al post --}}
            <p class="font-bold">{{ $post->user->username }}</p>
            {{-- Timestamps: Automáticamente manejado por Laravel para fechas de creación/actualización --}}
            {{-- diffForHumans: Carbon (integrado en Laravel) muestra diferencia en formato fácil de entender --}}
            <p class="text-sm text-gray-500">{{ $post->created_at->diffForHumans() }}</p>
            <p class="mt-5">{{ $post->descripcion }}</p>
        </div>
    </div>
    <div class="md:w-1/2 p-5">
        <div class="shadow bg-white p-5 mb-5">
            <p class="text-xl font-bold text-center mb-4">Agrega un nuevo comentario</p>
            <form action="">
                <div class="mb-5">
                    <label for="comentario" class="mb-2 block uppercase text-gray-500 font-bold">Añade un
                        comentario</label>
                    <textarea id="comentario" name="comentario" placeholder="Escribe tu comentario" class="border p-3 w-full rounded-lg @error('name') border-red-500 
                    @enderror"></textarea>

                    @error('comentario')
                    <p class="bg-red-500 text-white my-2 rounded-lg texts-sm p-2 text-center">{{ $message }}</p>
                    @enderror
                </div>

                <input type="submit" value="Comentar"
                    class="cursor-pointer bg-sky-600 hover:bg-sky-700 transition-colors uppercase font-bold text-white w-full p-3 rounded-lg">

            </form>
        </div>
    </div>
</div>
@endsection