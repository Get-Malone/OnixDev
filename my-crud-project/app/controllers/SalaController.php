<?php

namespace App\Controllers;

use App\Models\Sala;
use App\Models\Conferencista;

class SalaController
{
    public function index()
    {
        $salas = Sala::all();
        return view('salas.index', compact('salas'));
    }

    public function create()
    {
        $conferencistas = Conferencista::all();
        return view('salas.create', compact('conferencistas'));
    }

    public function store()
    {
        $sala = new Sala();
        $sala->nombre = request('nombre');
        $sala->capacidad = request('capacidad');
        $sala->conferencista_id = request('conferencista_id');
        $sala->save();

        return redirect('/salas');
    }

    public function show($id)
    {
        $sala = Sala::find($id);
        return view('salas.show', compact('sala'));
    }

    public function edit($id)
    {
        $sala = Sala::find($id);
        $conferencistas = Conferencista::all();
        return view('salas.edit', compact('sala', 'conferencistas'));
    }

    public function update($id)
    {
        $sala = Sala::find($id);
        $sala->nombre = request('nombre');
        $sala->capacidad = request('capacidad');
        $sala->conferencista_id = request('conferencista_id');
        $sala->save();

        return redirect('/salas');
    }

    public function destroy($id)
    {
        $sala = Sala::find($id);
        $sala->delete();

        return redirect('/salas');
    }
}