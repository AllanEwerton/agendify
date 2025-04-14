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

    const DIA_SEMANA_MAP = [
        'sunday' => 'domingo',
        'monday' => 'segunda',
        'tuesday' => 'terca',
        'wednesday' => 'quarta',
        'thursday' => 'quinta',
        'friday' => 'sexta',
        'saturday' => 'sabado',
    ];

    public function profissional()
    {
        return $this->belongsTo(Profissional::class);
    }

    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }
    public function servico()
    {
        return $this->belongsTo(Servico::class);
    }
    /*public function verificarDisponibilidade($profissionalId, $data, $hora)
    {
        $diaSemana = strtolower(date('l', strtotime($data)));
        $diaSemanaPtBr = self::DIA_SEMANA_MAP[$diaSemana] ?? null;

        if (!$diaSemanaPtBr) {
            return false;
        }

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
    }*/

    public function listarVagasDisponiveis($profissionalId, $data)
    {
        $diaSemana = strtolower(date('l', strtotime($data)));
        $diaSemanaPtBr = self::DIA_SEMANA_MAP[$diaSemana] ?? null;

        if (!$diaSemanaPtBr) {
            return [];
        }

        // Obter as vagas semanais do profissional para o dia da semana
        $vaga = VagasSemanal::where('profissional_id', $profissionalId)
            ->where('dia_semana', $diaSemanaPtBr)
            ->first();

        if (!$vaga) {
            return [];
        }

        // Obter todos os horários já agendados para o profissional na data
        $horariosOcupados = Agendamento::where('profissional_id', $profissionalId)
            ->where('data', $data)
            ->pluck('hora')
            ->toArray();

        // Gerar uma lista de horários disponíveis
        $horariosDisponiveis = [];
        for ($i = 0; $i < $vaga->numero_vagas; $i++) {
            $horario = date('H:i', strtotime("+$i hour", strtotime('08:00'))); // Exemplo: horários a partir das 08:00
            if (!in_array($horario, $horariosOcupados)) {
                $horariosDisponiveis[] = $horario;
            }
        }

        return $horariosDisponiveis;
    }
}
