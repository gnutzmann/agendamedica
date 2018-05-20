<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AgendaMarcacao extends Model
{
    protected $table = 'agenda_marcacoes';

    public function paciente() {
        return $this->belongsTo('App\Paciente');
    }
}
