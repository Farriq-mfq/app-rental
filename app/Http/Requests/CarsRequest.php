<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CarsRequest extends FormRequest
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
            'merk' => 'required',
            'model' => 'required',
            'n_plat' => 'required',
            'tarif' => 'required|numeric',
            'foto' => request()->routeIs('cars.update') ? '' : 'required|image|mimes:png,jpg'
        ];
    }
}
