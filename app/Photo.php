<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $fillable = [
        'route'
    ];

    /**
     * Obtiene el usuario al que le pertenece la foto.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
