@extends('layouts.app')

@section('title', 'Lista Grupos')



@section('content')

    <div class="container">
        <h1>Lista de grupos</h1><br>



        <ul>
           
            
       


            @foreach ($grupos as $grupo)
               
                   
                    @if (!$miColeccion->contains($grupo->id)) 
                       
                
                    
                        <p><strong>Grupo: </strong>{{ $grupo->name }}</p>
                        <p><strong>Descripción: </strong>{{ $grupo->description }}</p>
                        <p><strong>Categoría: </strong>{{ $grupo->category }}</p>
                        @foreach ($usuarios as $user)
                            @if ($grupo->user === $user->id)
                                <p><strong>Creado por: </strong>{{ $user->name }}</p>
                            @endif
                        @endforeach



                        <form action="{{ route('usersgrupo.store') }}" method="POST">

                            @csrf

                            <input type="hidden" name="iduser" id="iduser" value="{{ Auth::user()->id }}">
                            <input type="hidden" name="idgrupo" id="idgrupo" value="{{ $grupo->id }}">

                            <button type="submit">Inscribirse</button>
                        </form><br>
                    @endif
                
            @endforeach

        </ul>

    </div>


@endsection
