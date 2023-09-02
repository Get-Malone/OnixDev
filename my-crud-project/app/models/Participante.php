<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Participante extends Model
{
    protected $fillable = ['nombre', 'apellido', 'email', 'telefono', 'conferencia_id'];

    public function conferencia()
    {
        return $this->belongsTo('App\Models\Conferencia');
    }
}