<?php

namespace App\Models\Pessoa;

use Illuminate\Database\Eloquent\Model;

class Telefone extends Model
{
    protected $fillable = ['pessoa_id', 'tipo_contato_id', 'numero', 'ramal'];

    protected $table = 'pessoa_telefones';
}
