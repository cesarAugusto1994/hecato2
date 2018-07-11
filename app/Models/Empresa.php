<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    protected $fillable = ['nome', 'email', 'site', 'aniversario_fundacao', 'informacoes', 'ativo', 'tipo_id', 'cpf_cnpj', 'company_id'];
}
