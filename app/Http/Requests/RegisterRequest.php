<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class RegisterRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required',
            // 'email' => 'email, '
            // 'email' => ['email', 'unique:users,email']
            'email' => ['required', 'email', Rule::unique("utilasateures", "email")],
            'password' => ['required', 'min:8', 'confirmed']
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Darori teketeb name'
        ];
    }
}
