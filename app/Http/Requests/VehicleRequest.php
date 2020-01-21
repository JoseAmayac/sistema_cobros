<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VehicleRequest extends FormRequest
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
            'license_plate' => 'required|max:10|unique:vehicles,license_plate,'.$this->route('vehicle'),
            'mark' => 'required|max:100',
            'model' => 'required|max:100',
            'cylindering' => 'required|max:100',
            'papers_due_date' => 'required',
        ];
    }
}
