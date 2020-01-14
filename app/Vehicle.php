<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    protected $fillable = [
        'license_plate',
        'mark',
        'model',
        'cylindering',
        'papers_due_data'
    ];
}
