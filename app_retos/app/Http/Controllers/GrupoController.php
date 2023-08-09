<?php

namespace App\Http\Controllers;

use App\Models\Grupo;
use Illuminate\Http\Request;

class GrupoController extends Controller
{
    public function index()
    {

        $grupos = Grupo::orderBy('id', 'desc')->paginate();

      
        return view('grupos.index', compact('grupos'));
       
    }
    public function create()
    {
        return view('grupos.create');
    }

    public function store(Request $request){

        $grupo = new Grupo();

        $grupo->name = $request->name;
        $grupo->description = $request->description;
        $grupo->category = $request->category;

        $grupo->save();

        return redirect()->route('grupos.show', $grupo);
    }

    public function show(Grupo $grupo)
    {
        
        return view('grupos.show',compact('grupo'));
    }

    public function edit(Grupo $grupo)
    {
       
        return view('grupos.edit',compact('grupo'));
    }

    public function update(Request $request, Grupo $grupo)
    {
        $grupo->name = $request->name;
        $grupo->description = $request->description;
        $grupo->category = $request->category;

        $grupo->save();

        return redirect()->route('grupos.show', $grupo);
    }
}
