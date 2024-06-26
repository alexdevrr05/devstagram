@extends('layouts.app')

@section('titulo')
Crea una nueva publicación
@endsection

{{-- Hace que solo use los estilos SOLO donde se requiera --}}
@push('styles')
<link href="https://unpkg.com/dropzone@6.0.0-beta.1/dist/dropzone.css" rel="stylesheet" type="text/css" />
@endpush
{{-- Hace que solo use la config. de Dropzone SOLO donde se requiera --}}
@push('scripts')
{{-- Configuracion del dropzone --}}
@vite('resources/js/app.js')
@endpush

@section('contenido')
<div class="md:flex md:items-center">
    <div class="md:w-1/2 px-10">

        <form id="dropzone" action="{{ route('imagenes.store') }}" method="POST" enctype="multipart/form-data"
            class="dropzone border-dashed border-2 w-full h-96 rounded flex flex-col justify-center items-center">
            @csrf
        </form>

    </div>
    <div class="md:w-1/2 p-10 bg-white rounded-lg shadow-xl mt-10 md:mt-0">
        <form action="{{ route('posts.store') }}" method="POST">
            @csrf
            <div class="mb-5">
                <label for="titulo" class="mb-2 block uppercase text-gray-500 font-bold">titulo</label>
                <input type="text" id="titulo" name="titulo" placeholder="Título de la publicación"
                    class="border p-3 w-full rounded-lg @error('name') border-red-500 @enderror"
                    value="{{ old('titulo') }}">

                @error('titulo')
                <p class="bg-red-500 text-white my-2 rounded-lg texts-sm p-2 text-center">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-5">
                <label for="descripcion" class="mb-2 block uppercase text-gray-500 font-bold">Descripción</label>
                <textarea id="descripcion" name="descripcion" placeholder="Descripción de la publicación" class="border p-3 w-full rounded-lg @error('name') border-red-500 
                    @enderror">{{ old('descripcion') }}</textarea>

                @error('descripcion')
                <p class="bg-red-500 text-white my-2 rounded-lg texts-sm p-2 text-center">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-5">
                <input name="imagen" type="hidden" value="{{ old('imagen') }}">
                @error('imagen')
                <p class="bg-red-500 text-white my-2 rounded-lg texts-sm p-2 text-center">{{ $message }}</p>
                @enderror
            </div>

            <input type="submit" value="Publicar"
                class="cursor-pointer bg-sky-600 hover:bg-sky-700 transition-colors uppercase font-bold text-white w-full p-3 rounded-lg">
        </form>
    </div>
</div>
@endsection