
@extends('layouts.plantilla')

@section('title','Grupo: ' . $grupo->name)

@section('content')

<h2><a href="{{ route('grupos.index') }}">Volver a Grupos</a></h2>

<h2><a href="{{ route('grupos.edit', $grupo) }}">Editar Grupo</a></h2>

<h1>Grupo: {{$grupo->name}} </h1>

<p><strong>Descripción: </strong>{{$grupo->description}}</p>
<p><strong>Categoría: </strong>{{$grupo->category}}</p>
@endsection

