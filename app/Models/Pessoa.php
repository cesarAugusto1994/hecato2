<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Pessoa\{Tipo, Fisica, Juridica, Telefone, Endereco};
use App\Models\Schedule;
use Emadadly\LaravelUuid\Uuids;

class Pessoa extends Model
{
    use Uuids;

    protected $fillable = [
      'nome', 'email', 'tipo_id',
      'empresa_id', 'ramo_atividade',
      'informacoes', 'site', 'grupo_id',
      'fornecedor', 'cliente', 'identificacao_estrangeiro',
      'funcionario', 'prospecto', 'paciente'
    ];

    public function tipo()
    {
        return $this->belongsTo(Tipo::class, 'tipo_id');
    }

    public function fisica()
    {
        return $this->hasOne(Fisica::class, 'pessoa_id');
    }

    public function juridica()
    {
        return $this->hasOne(Juridica::class, 'pessoa_id');
    }

    public function telefones()
    {
        return $this->hasMany(Telefone::class, 'pessoa_id');
    }

    public function enderecos()
    {
        return $this->hasMany(Endereco::class, 'pessoa_id');
    }


    public function agendamentos()
    {
        return $this->hasMany(Schedule::class, 'pessoa_id');
    }
}
