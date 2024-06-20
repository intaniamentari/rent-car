<?php

namespace App\Http\Requests;

use App\Models\Customer;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CustomerEditRequest extends FormRequest
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
        $customerId = $this->route('customer');
        $customer = Customer::findOrFail($customerId);

        return [
            'name' => 'required|string|max:225',
            'phone' => [
                'required',
                'string',
                'max:255',
                Rule::unique('customers')
                    ->whereNull('deleted_at')
                    ->ignore($customerId), // Ignore admin dengan ID saat ini
            ],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique('users')
                    ->whereNull('deleted_at')
                    ->ignore($customer->user_id), // Ignore user dengan ID admin saat ini
            ],
            'password' => 'nullable|string|max:225',
            'address' => 'required|string|max:225'
        ];
    }
}
