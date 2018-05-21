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
}
