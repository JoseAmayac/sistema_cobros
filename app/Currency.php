<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{
    // La llave primaria es el mismo ISO de la moneda.
    protected $primaryKey = 'iso';

    // No es autoincremental
    public $incrementing = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'iso',
    ];
}
