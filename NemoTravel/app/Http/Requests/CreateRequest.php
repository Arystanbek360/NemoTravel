<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'code' => strtoupper($this->code),
        ]);
    }

    public function rules(): array
    {
        return [
            'code'           => ['required', 'string', 'size:3', 'unique:airports,code'],
            'cityName_ru'    => ['required', 'string'],
            'cityName_en'    => ['required', 'string'],
            'airportName_ru' => ['nullable', 'string'],
            'airportName_en' => ['nullable', 'string'],
            'area'           => ['nullable', 'string', 'size:2'],
            'country'        => ['nullable', 'string', 'size:2'],
            'lat'            => ['nullable', 'numeric'],
            'lng'            => ['nullable', 'numeric'],
            'timezone'       => ['required', 'string'],
        ];
    }
}
