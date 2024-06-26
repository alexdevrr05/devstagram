@extends('layouts.app')

@section('titulo')
Editar perfil: {{ auth()->user()->username }}
@endsection


@section('contenido')
<div class="md:flex md:justify-center">
    <div class="md:w-1/2 bg-white shadow p-6">
        <form method="POST" action="{{ route('perfil.store', auth()->user()->username) }}" class="mt-10 md:mt-0"
            enctype="multipart/form-data">
            @csrf
            <div class="mb-5">
                <label for="username" class="mb-2 block uppercase text-gray-500 font-bold">username</label>
                <input type="text" id="username" name="username" placeholder="Tu nombre de usuario"
                    class="border p-3 w-full rounded-lg @error('username') border-red-500 @enderror"
                    value="{{ auth()->user()->username }}">
                @error('username')
                <p class="bg-red-500 text-white my-2 rounded-lg texts-sm p-2 text-center">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-5">
                <label for="imagen" class="mb-2 block uppercase text-gray-500 font-bold">imagen</label>
                <input type="file" id="imagen" name="imagen"
                    class="border p-3 w-full rounded-lg @error('imagen') border-red-500 @enderror" value=""
                    accept=".jpg, .jpeg, .png">
                @error('imagen')
                <p class="bg-red-500 text-white my-2 rounded-lg texts-sm p-2 text-center">{{ $message }}</p>
                @enderror
            </div>

            <input type="submit" value="Guardar cambios" class="cursor-pointer bg-sky-600 hover:bg-sky-700 transition-colors uppercase 
                    font-bold text-white w-full p-3 rounded-lg">

        </form>
    </div>
</div>
@endsection