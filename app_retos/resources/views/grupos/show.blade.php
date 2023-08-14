@extends('layouts.app')

@section('title', 'Grupo: ' . $grupo->name)

@section('content')

    <h2><a href="{{ route('grupos.index') }}">Volver a Grupos</a></h2>

    @if(Auth::user()->id == $grupo->user)

    <h2><a href="{{ route('grupos.edit', $grupo) }}">Editar Grupo</a></h2>

    @endif


    <h1>Grupo: {{ $grupo->name }} </h1>

    <p><strong>Descripción: </strong>{{ $grupo->description }}</p>
    <p><strong>Categoría: </strong>{{ $grupo->category }}</p>
    <p><strong>Creado por: </strong>{{ $grupo->user }}</p>
@endsection
