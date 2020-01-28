<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    /**
     * Asociacion con la tabla user
     */
    public function users()
    {
        return $this->hasMany(User::class);
    }

    
    protected $fillable = [
        'name', 'description'
    ];
}
