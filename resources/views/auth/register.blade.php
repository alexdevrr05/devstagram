@extends('layouts.app')

@section('titulo')
Regístrate en Devstagram
@endsection

@section('contenido')
<div class="md:flex md:justify-center md:gap-6 md:items-center">
    <div class="md:w-6/12 p-5">
        {{-- asset apunta directamente hacia /public --}}
        <img src="{{ asset('imgs/registrar.jpg') }}" alt="Imagen de registro de usuarios">
    </div>

    <div class="md:w-4/12 bg-white p-6 rounded-lg shadow">
        <form>
            <div class="mb-5">
                <label for="name" class="mb-2 block uppercase text-gray-500 font-bold">Nombre</label>
                <input type="text" id="name" name="name" placeholder="Tu nombre" class="border p-3 w-full rounded-lg">
            </div>

            <div class="mb-5">
                <label for="username" class="mb-2 block uppercase text-gray-500 font-bold">Username</label>
                <input type="text" id="username" name="username" placeholder="Tu nombre de usuario"
                    class="border p-3 w-full rounded-lg">
            </div>

            <div class="mb-5">
                <label for="email" class="mb-2 block uppercase text-gray-500 font-bold">Email</label>
                <input type="text" id="email" name="email" placeholder="Tu email de registro"
                    class="border p-3 w-full rounded-lg">
            </div>

            <div class="mb-5">
                <label for="password" class="mb-2 block uppercase text-gray-500 font-bold">Password</label>
                <input type="password" id="password" name="password" placeholder="Contraseña de usuario"
                    class="border p-3 w-full rounded-lg">
            </div>

            <div class="mb-5">
                <label for="password_confirmation" class="mb-2 block uppercase text-gray-500 font-bold">Repetir
                    password</label>
                <input type="password" id="password_confirmation" name="password_confirmation"
                    placeholder="Repite tu contraseña" class="border p-3 w-full rounded-lg">
            </div>

            <input type="submit" value="Crear cuenta"
                class="cursor-pointer bg-sky-600 hover:bg-sky-700 transition-colors uppercase font-bold text-white w-full p-3 rounded-lg">

        </form>
    </div>
</div>
@endsection