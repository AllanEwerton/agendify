<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Servico extends Model
{
    protected $fillable = [
        'nome',
        'descricao',
        'preco',
        'foto',
    ];

    public function agendamentos()
    {
        return $this->hasMany(Agendamento::class);
    }
    public function getFormattedPriceAttribute()
    {
        return number_format($this->preco, 2, ',', '.');
    }
}
