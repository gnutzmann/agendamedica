<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class AgendaMarcacao extends Model
{
    protected $table = 'agenda_marcacoes';

    public function paciente() {
        return $this->belongsTo('App\Paciente');
    }

    public static function listaMarcacoes($agenda_id){

        return DB::table('agenda_marcacoes')
            ->join('pacientes', 'agenda_marcacoes.paciente_id', '=', 'pacientes.id')
            ->select('agenda_marcacoes.*','pacientes.nome')
            ->whereNull('pacientes.deleted_at')
            ->where('agenda_marcacoes.agenda_id','=',$agenda_id)
            ->orderBy('agenda_marcacoes.data', 'ASC')
            ->paginate(10);
    }

    public static function listaMarcacoesPaciente($paciente_id)
    {
        return DB::table('agenda_marcacoes')
            ->join('agendas', 'agenda_marcacoes.agenda_id', '=', 'agendas.id')
            ->join('medicos', 'agendas.medico_id', '=', 'medicos.id')
            ->select('agenda_marcacoes.*', 'agendas.medico_id', 'medicos.nome')            
            ->where('agenda_marcacoes.paciente_id', '=', $paciente_id)
            ->whereDate('agenda_marcacoes.data','>=',date('Y-m-d'))
            ->orderBy('agenda_marcacoes.data', 'ASC')
            ->orderBy('agenda_marcacoes.hora_inicial','ASC')
            ->get();
    }

    public static function solicitaCancelamentoMarcacao($id) {
        
        $marcacao = AgendaMarcacao::findOrFail($id);

        if ($marcacao->evolucao == null) {
            $marcacao->paciente_solicita_cancelar = date('Y-m-d H:i:s');
            $marcacao->save();
            return true;
        } else {
            return false;
        }
    }
}
