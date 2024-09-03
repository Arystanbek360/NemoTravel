<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'code'           => ['required', 'string', 'size:3', 'unique:airports,code'],
            'cityName'       => ['required', 'array'],
            'cityName.ru'    => ['nullable', 'string'],
            'cityName.en'    => ['nullable', 'string'],
            'airportName'    => ['nullable', 'array'],
            'airportName.ru' => ['nullable', 'string'],
            'airportName.en' => ['nullable', 'string'],
            'area'           => ['nullable', 'string'],
            'country'        => ['nullable', 'string', 'size:2'],
            'lat'            => ['nullable', 'numeric'],
            'lng'            => ['nullable', 'numeric'],
            'timezone'       => ['required', 'string'],
        ];
    }
}
