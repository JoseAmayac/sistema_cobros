<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Route extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'ammount',
        'admin_id',
    ];

    /**
     * Get the users for the route.
     */
    public function users()
    {
        return $this->belongsToMany('App\User');
    }
}
