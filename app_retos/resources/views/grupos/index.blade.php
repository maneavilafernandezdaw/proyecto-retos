@extends('layouts.app')

@section('title', 'Grupos')



@section('content')

    <div class="container">
        <h1>Pagina principal grupos</h1><br>
        <h2><a href="{{ route('grupos.create') }}">Crear Grupo</a></h2>
        <h2><a href="{{ route('usersgrupo.index') }}">usuarios de grupos</a></h2>

     
        <h2><a href="{{ route('usersgrupo.misgrupos', Auth::user()->id) }}">Mis grupos</a></h2>
        <h2><a href="{{ route('usersgrupo.otrosgrupos', Auth::user()->id) }}">Otros grupos</a></h2>
        <ul><br>
            @foreach ($grupos as $grupo)
                <li>
                    <a href="{{ route('grupos.show', $grupo->id) }}"><strong>{{ $grupo->name }}</strong> Creado por
                        {{ $grupo->user }}</a>

                    <form action="{{ route('usersgrupo.store') }}" method="POST">

                        @csrf

                        <input type="hidden" name="iduser" id="iduser" value="{{ Auth::user()->id }}">
                        <input type="hidden" name="idgrupo" id="idgrupo" value="{{ $grupo->id }}">

                        <button type="submit">Inscribirse</button>
                    </form>

                </li>
            @endforeach
        </ul>

        {{ $grupos->links() }}

    </div>
@endsection
