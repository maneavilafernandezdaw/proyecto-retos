
@extends('layouts.plantilla')

@section('title','Grupos')

@section('content')

<h1>Pagina principal grupos</h1><br>
<h2><a href="{{ route('grupos.create') }}">Crear Grupo</a></h2>
<ul><br>
    @foreach ($grupos as $grupo)
    <li>
       <a href="{{ route('grupos.show', $grupo->id) }}">{{ $grupo->name }} </a> 
    </li>
        
    @endforeach
</ul>

{{ $grupos->links() }}
@endsection
