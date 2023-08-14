@extends('layouts.app')

@section('title', 'Usuarios de Grupos')



@section('content')

    <div class="container">
        <h1>Pagina principal usersgrupo</h1><br>



        <ul><br>
     
            @foreach ($grupos as $grupo)
            <ul>
            <li>Grupo: {{ $grupo->name }}</li>
            <li>Usuarios: </li>
             
            @foreach ($usersgrupos as $usersgrupo)
         
            <ul>
                  
                        @if ($usersgrupo->idgrupo === $grupo->id)
                            
                          
                            @foreach ($usuarios as $user)
                                @if ($usersgrupo->iduser === $user->id)
                                    <li>{{ $user->name }}</li>
                                @endif
                            @endforeach
                        @endif
                    </ul>
                    @endforeach

                </ul><br>
            @endforeach
        


        </ul>

    </div>


@endsection
