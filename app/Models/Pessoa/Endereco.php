<?php

namespace App\Models\Pessoa;

use Illuminate\Database\Eloquent\Model;

class Endereco extends Model
{
    protected $fillable = ['pessoa_id', 'endereco', 'bairro', 'cidade', 'cep', 'uf', 'pais'];

    protected $table = 'pessoa_enderecos';
}
