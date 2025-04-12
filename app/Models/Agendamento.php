<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Agendamento extends Model
{
    protected $fillable = [
        'data',
        'hora',
        'status',
        'observacao',
        'servico_id',
        'cliente_id',
        'profissional_id',
    ];

    public function profissional()
    {
        return $this->belongsTo(Profissional::class);
    }

    public function paciente()
    {
        return $this->belongsTo(Cliente::class);
    }
    public function servico()
    {
        return $this->belongsTo(Servico::class);
    }
    public function verificarDisponibilidade($profissionalId, $data, $hora)
    {
        $diaSemana = strtolower(date('l', strtotime($data)));
        $diaSemanaMap = [
            'sunday' => 'domingo',
            'monday' => 'segunda',
            'tuesday' => 'terca',
            'wednesday' => 'quarta',
            'thursday' => 'quinta',
            'friday' => 'sexta',
            'saturday' => 'sabado',
        ];
        $diaSemanaPtBr = $diaSemanaMap[$diaSemana];

        $vaga = VagasSemanal::where('profissional_id', $profissionalId)
            ->where('dia_semana', $diaSemanaPtBr)
            ->first();
            if (!$vaga) {
                return false;
            }
            $agendamentos = Agendamento::where('profissional_id', $profissionalId)
                ->where('data', $data)
                ->where('hora', $hora)
                ->exists();

                return !$agendamentos;
    }
}
