<?php

namespace App\Http\Requests;

use App\Rules\NameRouteUnique;
use Illuminate\Foundation\Http\FormRequest;

class RouteRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        if($this->method() == "POST"){
            return [
                'name' => [
                    'required',
                    'string',
                    'max:100',
                    'min:3',
                    new NameRouteUnique
                ],
                'ammount' => 'required|numeric|min:1'
            ];
        }else{
            return [
                'name' => [
                    'required',
                    'string',
                    'max:100',
                    'min:3',
                    'unique:routes,name,'.$this->route('route').',id,deleted_at,NULL'
                ],
                'ammount' => 'required|numeric|min:1'
            ];
        }
    }
}
