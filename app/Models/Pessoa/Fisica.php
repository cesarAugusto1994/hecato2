<?php

namespace App\Models\Pessoa;

use Illuminate\Database\Eloquent\Model;

class Fisica extends Model
{
    protected $fillable = ['pessoa_id', 'cpf', 'rg', 'nascimento'];

    protected $dates = ['nascimento'];

    protected $table = 'pessoa_fisica';
}
