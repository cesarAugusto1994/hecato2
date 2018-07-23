<?php

namespace App\Models\Agendamento;

use Illuminate\Database\Eloquent\Model;
use Emadadly\LaravelUuid\Uuids;

class Guia extends Model
{
    use Uuids;

    protected $table = 'guia_agendamento';

    protected $dates = ['data_vencimento', 'data_pagamento'];

    public function pessoa()
    {
        return $this->belongsTo('App\Models\Pessoa');
    }

    public function agendamento()
    {
        return $this->belongsTo('App\Models\Schedule');
    }

    public function status()
    {
        return $this->belongsTo('App\Models\Agendamento\Guia\Status');
    }
}
