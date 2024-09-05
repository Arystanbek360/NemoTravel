<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class IndexRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'filter'      => ['nullable', 'string'],
            'orderBy'     => ['nullable', 'string', 'in:created_at,updated_at,code,lat,lng,country'],
            'sort'        => ['nullable', 'in:asc,desc'],
            'perPage'     => ['nullable', 'integer'],
            'page'        => ['nullable', 'integer'],
            'code'        => ['nullable', 'string', 'max:3'],
            'area'        => ['nullable', 'string', 'max:3'],
            'country'     => ['nullable', 'string', 'max:2'],
            'cityName'    => ['nullable', 'string'],
            'airportName' => ['nullable', 'string'],

        ];
    }
}
