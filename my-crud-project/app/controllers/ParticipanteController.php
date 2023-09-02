<?php

namespace App\Controllers;

use App\Models\Participante;
use App\Models\Sala;

class ParticipanteController
{
    public function index()
    {
        $participantes = Participante::all();
        return view('participantes.index', compact('participantes'));
    }

    public function create()
    {
        $salas = Sala::all();
        return view('participantes.create', compact('salas'));
    }

    public function store()
    {
        $participante = new Participante();
        $participante->nombre = request('nombre');
        $participante->apellido = request('apellido');
        $participante->email = request('email');
        $participante->sala_id = request('sala_id');
        $participante->save();

        return redirect('/participantes');
    }

    public function show($id)
    {
        $participante = Participante::find($id);
        return view('participantes.show', compact('participante'));
    }

    public function edit($id)
    {
        $participante = Participante::find($id);
        $salas = Sala::all();
        return view('participantes.edit', compact('participante', 'salas'));
    }

    public function update($id)
    {
        $participante = Participante::find($id);
        $participante->nombre = request('nombre');
        $participante->apellido = request('apellido');
        $participante->email = request('email');
        $participante->sala_id = request('sala_id');
        $participante->save();

        return redirect('/participantes');
    }

    public function destroy($id)
    {
        $participante = Participante::find($id);
        $participante->delete();

        return redirect('/participantes');
    }
}