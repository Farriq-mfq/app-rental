<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AuthRegisterRequest extends FormRequest
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
            'nama' => 'required',
            'email' => 'required|unique:users,email,' . $this->user,
            'password' => request()->routeIs('users.update') ? '' : 'required',
            'confirmation_password' => request()->routeIs('users.update') ? '' : 'required|same:password',
            'alamat' => 'required',
            'no_telp' => 'required',
            'no_sim' => 'required'
        ];
    }
}
