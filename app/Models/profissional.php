<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class profissional extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'sobre_nome',
        'email',
        'telefone',
        'especialidade',
        'foto',
    ];

    public function getFullNameAttribute()
    {
        return $this->nome . ' ' . $this->sobre_nome;
    }

}
