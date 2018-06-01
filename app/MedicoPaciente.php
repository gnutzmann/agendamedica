<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class MedicoPaciente extends Model
{
    protected $table = 'medico_paciente';


    public static function ExcluiMedicoPaciente($medico_id, $paciente_id) {

        return DB::table('medico_paciente')->where('medico_id','=',$medico_id)
                                           ->where('paciente_id','=',$paciente_id)
                                           ->delete();
    }

}
