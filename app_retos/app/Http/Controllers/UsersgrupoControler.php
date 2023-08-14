<?php

namespace App\Http\Controllers;

use App\Models\Usersgrupo;
use App\Models\Grupo;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use PharIo\Manifest\Author;

class UsersgrupoControler extends Controller
{

    public function index()
    {
        if (Auth::check()) {
            $grupos = Grupo::orderBy('id', 'desc')->paginate();

            $usuarios = User::all();

            $usersgrupos = Usersgrupo::orderBy('idgrupo', 'desc')->paginate();
            return view('usersgrupo.index', compact('usersgrupos', 'grupos', 'usuarios'));
        }
        return view('auth.login');
    }


    public function store(Request $request)
    {

        $usersgrupo = new Usersgrupo();

        $usersgrupo->iduser = $request->iduser;
        $usersgrupo->idgrupo = $request->idgrupo;

        $usersgrupo->save();

        return redirect()->route('grupos.index');
    }


    public function misgrupos()
    {
        if (Auth::check()) {
            $grupos = Grupo::orderBy('id', 'desc')->paginate();

            $usuarios = User::all();

            $misgrupos = Usersgrupo::where('iduser', Auth::user()->id)->get();


            return view('usersgrupo.misgrupos', compact('misgrupos', 'grupos', 'usuarios'));
        }
        return view('auth.login');
    }

    public function otrosgrupos()
    {
        if (Auth::check()) {
            $grupos = Grupo::orderBy('id', 'desc')->paginate();

            $usuarios = User::all();

            $misgrupos = Usersgrupo::where('iduser', Auth::user()->id)->get();

            $miColeccion = new Collection(); // Crea una colección vacía

            foreach ($misgrupos as $migrupo) {
                $miColeccion->push($migrupo->idgrupo);  // Agrega cada valor a la colección

            }

            return view('usersgrupo.otrosgrupos', compact('miColeccion', 'grupos', 'usuarios'));
        }
        return view('auth.login');
    }
}
