<?php

namespace App\Http\Requests;

use App\Models\Admin;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AdminEditRequest extends FormRequest
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
        $adminId = $this->route('admin');
        $admin = Admin::findOrFail($adminId);

        return [
            'name' => 'required|string|max:225',
            'phone' => [
                'required',
                'string',
                'max:255',
                Rule::unique('admins')
                    ->whereNull('deleted_at')
                    ->ignore($adminId), // Ignore admin dengan ID saat ini
            ],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique('users')
                    ->whereNull('deleted_at')
                    ->ignore($admin->user_id), // Ignore user dengan ID admin saat ini
            ],
            'password' => 'nullable|string|max:225',
            'address' => 'required|string|max:225'
        ];
    }
}
