@extends('layouts.app')

@section('content')
<div class="container">
    <h2><a href="{{ route('grupos.index') }}">Ver Grupos</a></h2>
    <h2><a href="{{ route('grupos.create') }}">Crear Grupo</a></h2>

</div>
@endsection
