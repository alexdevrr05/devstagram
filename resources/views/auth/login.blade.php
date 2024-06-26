@extends('layouts.app')

@section('titulo')
Inicia sesión en Devstagram
@endsection

@section('contenido')
<div class="md:flex md:justify-center md:gap-6 md:items-center">
    <div class="md:w-6/12 p-5">
        <img src="{{ asset('imgs/login.jpg') }}" alt="Imagen login de usuarios">
    </div>

    <div class="md:w-4/12 bg-white p-6 rounded-lg shadow-xl">
        <form method="POST" action="{{route('login')}}">
            {{-- Cross-Site Request Forgery --}}
            @csrf

            @if(session('mensaje'))
            <p class="bg-red-500 text-white my-2 rounded-lg texts-sm p-2 text-center">{{ session('mensaje') }}</p>
            @endif

            <div class="mb-5">
                <label for="email" class="mb-2 block uppercase text-gray-500 font-bold">Email</label>
                <input type="text" id="email" name="email" placeholder="Tu email de registro"
                    class="border p-3 w-full rounded-lg @error('email') border-red-500 @enderror"
                    value="{{ old('email') }}">
                @error('email')
                <p class="bg-red-500 text-white my-2 rounded-lg texts-sm p-2 text-center">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-5">
                <label for="password" class="mb-2 block uppercase text-gray-500 font-bold">Password</label>
                <input type="password" id="password" name="password" placeholder="Contraseña de usuario"
                    class="border p-3 w-full rounded-lg @error('password') border-red-500 @enderror">
                @error('password')
                <p class="bg-red-500 text-white my-2 rounded-lg texts-sm p-2 text-center">{{ $message }}</p>
                @enderror
            </div>

            {{-- Mantener sesion activa --}}
            <div class="mb-5">
                <input type="checkbox" name="example"> <label class="text-gray-500 text-sm">Mantener mi sesión
                    abierta</label>
            </div>

            <input type="submit" value="Iniciar sesión"
                class="cursor-pointer bg-sky-600 hover:bg-sky-700 transition-colors uppercase font-bold text-white w-full p-3 rounded-lg">

        </form>
    </div>
</div>
@endsection