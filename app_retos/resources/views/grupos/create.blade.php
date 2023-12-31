@extends('layouts.app')

@section('title','Crear Grupo')

@section('content')

<h4><a href="{{ route('grupos.index') }}">Volver a Grupos</a></h4>

<h1>Pagina para crear un grupo</h1> 

<form action="{{ route('grupos.store') }}" method="POST">

    @csrf

    <label for="name">Nombre:</label>
    <br>
    <input type="text" name="name" id="name">
    <br><br>
    <label for="description">Descripción:</label>
    <br>
    <textarea name="description" id="description" rows="5"></textarea>
    <br>
    <label for="category">Categoría:</label>
    <br>
    <input type="text" name="category" id="category">
    <br><br>
    <input type="hidden" name="user" id="user" value="{{ Auth::user()->id }}">
<br>
<button type="submit">Crear</button>
</form>

@endsection

