<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AdminRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|string|max:225',
            'phone' => [
                'required',
                'string',
                'max:255',
                Rule::unique('admins')->where(function ($query) {
                    return $query->whereNull('deleted_at');
                })->ignore($this->route('admin')),
            ],
            'email' => [
                'required',
                'string',
                'max:255',
                Rule::unique('users')->where(function ($query) {
                    return $query->whereNull('deleted_at');
                })->ignore($this->route('admin')),
            ],
            'password' => 'required|string|max:225',
            'address' => 'required|string|max:225'
        ];
    }
}
