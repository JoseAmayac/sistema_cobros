<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'license_plate',
        'mark',
        'model',
        'cylindering',
        'papers_due_date',
        'admin_id'
    ];

    public function employees(){
        return $this->hasMany(User::class);
    }
}
