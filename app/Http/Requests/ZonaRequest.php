<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ZonaRequest extends FormRequest
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
            'latitude' => 'required',
            'longitude' => 'required',
            'id_regional' => 'required',
            'jenis_hutan' => 'required',
            'nama_zona' => 'required',
        ];
    }
}
