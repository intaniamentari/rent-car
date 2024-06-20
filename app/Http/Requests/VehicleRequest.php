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
        // return false;
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'brand' => 'required',
            'model' => 'required',
            'vehicle_number' => 'required',
            'charge' => 'required',
            'mileage' => 'required',
            'transmission' => 'required',
            'seats' => 'required',
            'lunggage' => 'required',
            'fuel' => 'required',
        ];
    }
}
