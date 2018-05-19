<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Paciente extends Model
{
    use SoftDeletes;

    protected $fillable = ['nome','sexo','data_nascimento','email','fone_residencial','fone_celular','cpf','rg',
                           'end_res_logradouro','end_res_numero','end_res_complemento','end_res_bairro','end_res_cidade',
                           'end_res_uf','end_res_cep'];


    protected $guarded = ['id', 'created_at', 'update_at'];

    protected $date = ['deleted_at'];
}
