<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VagasSemanal extends Model
{
    protected $fillable = [
        'profissional_id',
        'dia_semana',
        'numero_vagas',
    ];

    public function profissional()
    {
        return $this->belongsTo(Profissional::class);
    }
}
