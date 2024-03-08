@extends('layouts.app')

@section('titulo')
Post: {{ $post->titulo }}
@endsection


@section('contenido')
<div class="container mx-auto md:flex px-5">
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
        @auth
        {{-- Mostrar delete button solo si es propietario del post --}}
        @if($post->user_id === auth()->user()->id)
        <form method="POST" action="{{ route('posts.destroy', [ 'post' => $post ]) }}">
            {{-- Método spoofing --}}
            @method('DELETE')
            @csrf
            <input type="submit" value="Eliminar Publicación"
                class="bg-red-500 hover:bg-red-600 p-2 rounded text-white font-bold mt-4 cursor-pointer">
        </form>
        @endif
        @endauth
    </div>
    <div class="md:w-1/2 p-5">
        <div class="shadow bg-white p-5 mb-5">
            @auth
            <p class="text-xl font-bold text-center mb-4">Agrega un nuevo comentario</p>

            @if(session('mensaje'))
            <div id="mensaje" class="bg-green-500 p-2 rounded-lg mb-6 text-white text-center uppercase font-bold">
                {{ session('mensaje') }}
            </div>
            @endif

            <script>
                setTimeout(function() {
                    document.getElementById('mensaje').style.display = 'none';
                }, 3000);
            </script>


            <form action="{{ route('comentarios.store', ['user' => $user, 'post' => $post]) }}" method="POST">
                @csrf
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
            @endauth

            <div class="bg-white shadow mb-5 max-h-96 overflow-y-scroll mt-10">
                @if ($post->comentarios->count())
                @foreach ($post->comentarios as $comentario)
                <div class="p-5 border-gray-300 border-b">
                    <a href="{{ route('posts.index', $comentario->user) }}" class="font-bold">
                        {{ $comentario->user->username }}
                    </a>
                    <p class="">
                        {{ $comentario->comentario }}
                    </p>
                    <p class="text-sm text-gray-500">
                        {{ $comentario->created_at->diffForHumans() }}
                    </p>
                </div>
                @endforeach
                @else
                <p class="p-10 text-center">No hay comentarios aún</p>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection