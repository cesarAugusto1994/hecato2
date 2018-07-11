<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Schedule\Status;
use App\Models\Pessoa;

class Schedule extends Model
{
    protected $table = 'agenda';

    protected $dates = ['inicio', 'fim'];

    protected $casts = [
       'start' => 'datetime:d/m/Y',
    ];

    protected $guarded = array();

    protected $fillable = ['pessoa_id', 'inicio', 'fim', 'notas', 'status_id', 'empresa_id', 'user_id', 'confirmada'];

    public function status()
    {
        return $this->belongsTo(Status::class, 'status_id');
    }

    public function getFormatedStartedDate()
    {
        return $this->start->format('d/m/Y');
    }

    public function pessoa()
    {
        return $this->belongsTo(Pessoa::class, 'pessoa_id');
    }
}
