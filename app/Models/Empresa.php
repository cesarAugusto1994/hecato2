<?php

namespace App\Models;

use App\Models\Pessoa\Tipo;
use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    protected $fillable = ['nome', 'email', 'site', 'aniversario_fundacao', 'informacoes', 'ativo', 'tipo_id', 'cpf_cnpj', 'rg_ie'];

    protected $dates = ['aniversario_fundacao'];

    public function tipo()
    {
        return $this->belongsTo(Tipo::class, 'tipo_id');
    }
}
