<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Grupo;
use App\Models\Usersgrupo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GrupoController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            $grupos = Grupo::orderBy('id', 'desc')->paginate();
           
            return view('grupos.index', compact('grupos'));
        }
        return view('auth.login');
    }

    public function create()
    {
        if (Auth::check()) {
            return view('grupos.create');
        }
        return view('auth.login');
    }

    public function store(Request $request)
    {

        $grupo = new Grupo();

        $grupo->name = $request->name;
        $grupo->description = $request->description;
        $grupo->category = $request->category;
        $grupo->user = $request->user;

        $grupo->save();

     
        $Existe = Usersgrupo::where('idgrupo', $grupo->id)
            ->where('iduser', $request->user)
            ->first();

        if ($Existe) {
            // El producto ya existe en la base de datos
            echo "El producto ya existe.";
        } else {
            $usersgrupo = new Usersgrupo();

            $usersgrupo->idgrupo = $grupo->id;

            $usersgrupo->iduser = $request->user;

            $usersgrupo->save();

            return redirect()->route('grupos.show', $grupo);
        }
    }

    public function show(Grupo $grupo)
    {
        if (Auth::check()) {
            $usuarios = User::all();
            return view('grupos.show', compact('grupo','usuarios'));
        }
        return view('auth.login');
    }

    public function edit(Grupo $grupo)
    {
        if (Auth::check()) {
            return view('grupos.edit', compact('grupo'));
        }
        return view('auth.login');
    }

    public function update(Request $request, Grupo $grupo)
    {
        $grupo->name = $request->name;
        $grupo->description = $request->description;
        $grupo->category = $request->category;
        $grupo->user = $request->user;

        $grupo->save();

        return redirect()->route('grupos.show', $grupo);
    }
}
