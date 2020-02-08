<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
{
    use Notifiable;
    use SoftDeletes;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'dni',
        'name', 
        'lastname',
        'cellphone',
        'address',
        'email', 
        'password', 
        'role_id', 
        'admin_id',
        'photo_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function vehicle(){
        return $this->belongsTo(Vehicle::class);
    }
    /**
     * Un usuario tiene un rol (Administrador, cliente o cobrador).
     */
    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    /**
     * Método de asociación con tabla rutas 
     * (un usuario esta en varias rutas) 
     */
    public function routes()
    {
        return $this->belongsToMany(Route::class);
    }

    /**
     * Foto que tiene asociada el usuario.
     */
    public function photo()
    {
        return $this->belongsTo(Photo::class);
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }
    
    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function setPasswordAttribute($value)
    {
        return $this->attributes['password'] = bcrypt($value);
    }
}
