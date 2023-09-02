<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $fillable = [
        'name', 'email', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function conferencistas()
    {
        return $this->hasMany('App\Models\Conferencista');
    }

    public function salas()
    {
        return $this->hasMany('App\Models\Sala');
    }

    public function participantes()
    {
        return $this->hasMany('App\Models\Participante');
    }
}