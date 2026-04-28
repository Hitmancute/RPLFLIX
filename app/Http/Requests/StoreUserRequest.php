<?php

namespace App\Http\Requests;

use Faker\Guesser\Name;
use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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
            'name'          => 'required|min:6',
            'gender'        => "required",
            'email'         => "required|email|unique:users,email",
            'password'      => "required|min:6",
        ];
    }

    public function messages()
    {
        return [
            // name
            'name.required' => 'Nama wajib diisi.',
            'name.min'      => 'Nama harus 6 karakter atau lebih.',

            // gender
            'gender.required' => 'Gender wajib diisi.',

            // email
            'email.required' => 'Email wajib diisi.',
            'email.email'    => 'Format email tidak valid.',
            'email.unique'   => 'Email sudah digunakan.',

            // password
            'password.required' => 'Password wajib diisi.',
            'password.min'      => 'Password harus 6 karakter atau lebih.',
        ];
    }
}
