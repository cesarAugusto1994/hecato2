<?php

namespace App\Models\Empresa;

use Illuminate\Database\Eloquent\Model;

class Config extends Model
{
    protected $table = 'config_empresas';

    public function config()
    {
        return $this->belongsTo('App\Models\Config');
    }
}
