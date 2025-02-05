<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserRequest extends FormRequest
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
            'name' => ['required', 'min:3'],
            'telephone' => ['required','regex:/^\d{10}$/', Rule::unique('users')->ignore($this->id)],
            'email' => ['required','email', Rule::unique('users')->ignore($this->id)],
            'adresse' => ['required'],
            'password' => ['required', 'min:6', 'confirmed'],
            'role' => ['nullable']
        ];
    }
}
