@extends('layouts.app')

@section('title', 'Grupos')



@section('content')

    <div class="container">

        <h1>Pagina principal grupos</h1><br>
        <h2><a href="{{ route('grupos.create') }}">Crear Grupo</a></h2>
        <h2><a href="{{ route('usersgrupo.index') }}">usuarios de grupos</a></h2>


        <h2><a href="{{ route('usersgrupo.misgrupos', Auth::user()->id) }}">Mis grupos</a></h2>
        <h2><a href="{{ route('usersgrupo.otrosgrupos', Auth::user()->id) }}">Inscribirme en un grupo</a></h2>
        <ul><br>
            <h3>Lista de grupos</h3>
            @foreach ($grupos as $grupo)
                <li>
                    <a href="{{ route('grupos.show', $grupo->id) }}"><strong>{{ $grupo->name }}</strong>
                </li>
            @endforeach
        </ul>

        {{ $grupos->links() }}

    </div>
@endsection
