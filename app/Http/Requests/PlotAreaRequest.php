<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PlotAreaRequest extends FormRequest
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
            'nama_plot' => 'required',
            'type_plot' => 'required',
            'id_hamparan' => 'required',
            'file' => [
                'nullable', 'file', 'max:1024',
            ],
        ];
    }
}
