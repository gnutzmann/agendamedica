<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class Paciente extends Model
{
    use SoftDeletes;

    protected $fillable = ['nome','sexo','data_nascimento','email','fone_residencial','fone_celular','cpf','rg',
                           'end_res_logradouro','end_res_numero','end_res_complemento','end_res_bairro','end_res_cidade',
                           'end_res_uf','end_res_cep'];


    protected $guarded = ['id', 'created_at', 'update_at'];

    protected $date = ['deleted_at'];

    public function agendaMarcacoes() {
        return $this->hasMany('App\AgendaMarcacao');
    }

    public static function listaPacienteMedico($medico_id, $busca) {

        $query = DB::table('pacientes')     
                        ->join('medico_paciente','pacientes.id','=','medico_paciente.paciente_id')                   
                        ->select('pacientes.id', 'pacientes.nome','pacientes.data_nascimento','pacientes.email')
                        ->whereNull('pacientes.deleted_at')                        
                        ->where('medico_paciente.medico_id','=',$medico_id);

                        if ($busca != '') {
                            $query->where(function ($x) use ($busca) {
                                            $x->where('pacientes.nome','like', '%' . $busca . '%' )                            
                                              ->orWhere('pacientes.email','like', '%' . $busca . '%');
                                          });
                        }

        $query->orderBy('pacientes.nome', 'ASC');                

        $pacientes = $query->paginate(100);

        return $pacientes;
                        
    }    
}
