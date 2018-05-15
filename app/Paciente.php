<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Paciente extends Model
{
    use SoftDeletes;

    protected $fillable = ['nome','sexo','data_nascimento','email','fone_residencial','fone_celular','cpf','rg',
                           'end_com_logradouro','end_com_numero','end_com_complemento','end_com_bairro','end_com_cidade',
                           'end_com_uf','end_com_cep'];


    protected $guarded = ['id', 'created_at', 'update_at'];

    protected $date = ['deleted_at'];
}
