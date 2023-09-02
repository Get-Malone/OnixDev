<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sala extends Model
{
    protected $table = 'salas';

    protected $fillable = [
        'nombre',
        'capacidad',
        'ubicacion',
    ];

    public function conferencias()
    {
        return $this->hasMany('App\Models\Conferencia');
    }
}