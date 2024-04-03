<?php

namespace App\Http\Requests\User;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;

class UserEditRequestForm extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'first_name' => ['required', 'string', 'max:255'],
            'middle_name' => ['nullable', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string', 'max:455'],
            'role' => ['required', 'string'],

            'email' => ['string', 'email', 'max:255', 'unique:users,email,' . $this->user->id],
            'phone_number' => ['string', 'max:255', 'unique:users,phone_number,' . $this->user->id],
            'password' => ['nullable'],
            'status' => 'required|string',
        ];
    }
}
