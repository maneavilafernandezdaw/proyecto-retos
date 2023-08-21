@extends('layouts.app')

@section('title', 'Grupo: ' . $grupo->name)

@section('content')

    <h4><a href="{{ route('grupos.index') }}">Volver a Grupos</a></h4>

    @if(Auth::user()->id == $grupo->user)

    <h2><a href="{{ route('grupos.edit', $grupo) }}">Editar Grupo</a></h2>

    @endif


    <h1>Grupo: {{ $grupo->name }} </h1>

    <p><strong>Descripción: </strong>{{ $grupo->description }}</p>
    <p><strong>Categoría: </strong>{{ $grupo->category }}</p>
    
        @foreach ($usuarios as $user)
        @if ($grupo->user === $user->id)
            <p><strong>Creado por: </strong>{{ $user->name }}</p>
        @endif
    @endforeach
      
@endsection
