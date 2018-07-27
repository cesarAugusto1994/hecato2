<?php

namespace App\Models\Pessoa;

use Illuminate\Database\Eloquent\Model;

class Juridica extends Model
{
    protected $fillable = ['pessoa_id', 'cnpj', 'ie', 'fundacao'];

    protected $dates = ['fundacao'];

    protected $table = 'pessoa_juridica';
}
