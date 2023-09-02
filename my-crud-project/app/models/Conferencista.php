<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Conferencista extends Model
{
    protected $fillable = ['nombre', 'apellido', 'email', 'telefono', 'tema'];

    public function sala()
    {
        return $this->belongsTo('App\Models\Sala');
    }

    public function participantes()
    {
        return $this->hasMany('App\Models\Participante');
    }
}