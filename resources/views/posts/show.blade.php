@extends('layouts.app')

@section('titulo')
Post: {{ $post->titulo }}
@endsection


@section('contenido')

Descripción: {{ $post->descripcion }}
@endsection