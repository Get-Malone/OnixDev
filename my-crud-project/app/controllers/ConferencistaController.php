<?php

namespace App\Controllers;

use App\Models\Conferencista;
use App\Models\Sala;
use App\Models\Participante;

class ConferencistaController
{
    public function index()
    {
        $conferencistas = Conferencista::all();
        return view('conferencistas.index', compact('conferencistas'));
    }

    public function create()
    {
        $salas = Sala::all();
        return view('conferencistas.create', compact('salas'));
    }

    public function store()
    {
        $conferencista = new Conferencista();
        $conferencista->nombre = request('nombre');
        $conferencista->tema = request('tema');
        $conferencista->sala_id = request('sala_id');
        $conferencista->save();

        $participantes = explode(',', request('participantes'));
        foreach ($participantes as $participante) {
            $p = new Participante();
            $p->nombre = $participante;
            $p->conferencista_id = $conferencista->id;
            $p->save();
        }

        return redirect('/conferencistas');
    }

    public function show($id)
    {
        $conferencista = Conferencista::find($id);
        return view('conferencistas.show', compact('conferencista'));
    }

    public function edit($id)
    {
        $conferencista = Conferencista::find($id);
        $salas = Sala::all();
        return view('conferencistas.edit', compact('conferencista', 'salas'));
    }

    public function update($id)
    {
        $conferencista = Conferencista::find($id);
        $conferencista->nombre = request('nombre');
        $conferencista->tema = request('tema');
        $conferencista->sala_id = request('sala_id');
        $conferencista->save();

        $participantes = explode(',', request('participantes'));
        Participante::where('conferencista_id', $conferencista->id)->delete();
        foreach ($participantes as $participante) {
            $p = new Participante();
            $p->nombre = $participante;
            $p->conferencista_id = $conferencista->id;
            $p->save();
        }

        return redirect('/conferencistas');
    }

    public function destroy($id)
    {
        $conferencista = Conferencista::find($id);
        $conferencista->delete();
        return redirect('/conferencistas');
    }
}