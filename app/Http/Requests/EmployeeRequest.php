<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeRequest extends FormRequest
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
        return [
            'dni' => 'required|unique:users|max:100',
            'username' => 'required|unique:users',
            'password' => 'required|confirmed',
            'name' => 'required|max:100',
            'lastname' => 'required|max:100',            
            'cellphone' => 'required|unique:users|max:15'
        ];
    }
}
