<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Grupo;
use App\Models\Usersgrupo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            $users = User::orderBy('id', 'desc')->paginate();
            return view('users.index', compact('users'));
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

        $usersgrupo = new Usersgrupo();

        $usersgrupo->idgrupo = $grupo->id;
     
        $usersgrupo->iduser = $request->user;

        $usersgrupo->save();

        return redirect()->route('grupos.show', $grupo);
    }

    public function show(User $user)
    {
        if (Auth::check()) {
            return $user;
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
