<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'cityName_ru'    => ['nullable', 'string'],
            'cityName_en'    => ['nullable', 'string'],
            'airportName_ru' => ['nullable', 'string'],
            'airportName_en' => ['nullable', 'string'],
            'area'           => ['nullable', 'string', 'size:2'],
            'country'        => ['nullable', 'string', 'size:2'],
            'lat'            => ['nullable', 'numeric'],
            'lng'            => ['nullable', 'numeric'],
            'timezone'       => ['nullable', 'string'],
        ];
    }
}
