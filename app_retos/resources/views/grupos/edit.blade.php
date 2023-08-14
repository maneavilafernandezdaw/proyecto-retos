@extends('layouts.app')

@section('title','Editar Grupo')

@section('content')

<h1>Pagina para editar un grupo</h1> 

<form action="{{ route('grupos.update',$grupo )}}" method="POST">

    @csrf

    @method('put')

    <label for="name">Nombre:</label>
    <br>
    <input type="text" name="name" id="name" value="{{ $grupo->name }}">
    <br><br>
    <label for="description">Descripción:</label>
    <br>
    <textarea name="description" id="description" rows="5" >{{ $grupo->description }}</textarea>
    <br>
    <label for="category">Categoría:</label>
    <br>
    <input type="text" name="category" id="category" value="{{ $grupo->category }}">
    <br><br>
<br>
<button type="submit">Editar</button>
</form>

@endsection

