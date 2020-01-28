<?php

namespace App\Rules;

use App\Route;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\Auth;

class NameRouteUnique implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $route = null;
        $route = Route::where($attribute,$value)->where('deleted_at','=',NULL)->first();
        if($route != null){
            if($route->admin_id == Auth::id()){
                return false;
            }else{
                return true;
            }
        }else{
            return true;
        }
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Este nombre de ruta ya está en uso';
    }
}
