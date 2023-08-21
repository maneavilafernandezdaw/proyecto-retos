@extends('layouts.app')

@section('title', 'Mis Grupos')



@section('content')

    <div class="container">
        <h4><a href="{{ route('grupos.index') }}">Volver a Grupos</a></h4>
        <h1>Mis Grupos</h1><br>



        <ul>
            @foreach ($grupos as $grupo)
                @foreach ($misgrupos as $migrupo)
                    @if ($grupo->id === $migrupo->idgrupo)
                        <li>

                            <p><strong>Grupo: </strong>{{ $grupo->name }}</p>
                            <p><strong>Descripción: </strong>{{ $grupo->description }}</p>
                            <p><strong>Categoría: </strong>{{ $grupo->category }}</p>
                            @foreach ($usuarios as $user)
                                @if ($grupo->user === $user->id)
                                    <p><strong>Creado por: </strong>{{ $user->name }}</p>
                                @endif
                            @endforeach

                            <form action="{{ route('usersgrupo.delete') }}" method="POST">

                                @csrf
                                @method('delete')
                                <input type="hidden" name="iduser" id="iduser" value="{{ Auth::user()->id }}">
                                <input type="hidden" name="idgrupo" id="idgrupo" value="{{ $grupo->id }}">
    
                                <button type="submit">Borrar</button>
                            </form><br>

                    @endif
                @endforeach
            @endforeach

        </ul>

    </div>


@endsection
