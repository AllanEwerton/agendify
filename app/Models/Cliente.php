<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $fillable = [
        'nome',
        'sobre_nome',
        'email',
        'telefone',
    ];

    public function getFullNameAttribute()
    {
        return $this->nome . ' ' . $this->sobre_nome;
    }

    public function agenda()
    {
        return $this->hasMany(Agendamento::class);
    }
}
