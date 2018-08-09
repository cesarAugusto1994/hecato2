<?php

namespace App\Models\Pessoa;

use Illuminate\Database\Eloquent\Model;

class Anexo extends Model
{
    protected $table = 'pessoa_anexos';

    protected $fillable = ['link', 'pessoa_id'];

    public function pessoa()
    {
        return $this->belongsTo('App\Models\Pessoa', 'pessoa_id');
    }
}
