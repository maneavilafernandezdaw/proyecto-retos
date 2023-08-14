@extends('layouts.app')

@section('title', 'Mis Grupos')



@section('content')

    <div class="container">
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
                        </li><br>
                    @endif
                @endforeach
            @endforeach

        </ul>

    </div>


@endsection
