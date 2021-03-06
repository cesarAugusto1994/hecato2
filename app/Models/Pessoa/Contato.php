<?php

namespace App\Models\Pessoa;

use Illuminate\Database\Eloquent\Model;

class Contato extends Model
{
    protected $table = 'pessoa_contatos';

    protected $fillable = ['nome', 'email', 'celular', 'telefone', 'filiacao', 'pessoa_id'];

    public function pessoa()
    {
        return $this->belongsTo('App\Models\Pessoa', 'pessoa_id');
    }
}
