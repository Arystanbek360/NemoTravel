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
            'filter'  => ['nullable', 'string'],
            'orderBy' => ['nullable', 'string', 'in:id,created_at,updated_at'],
            'sort'    => ['nullable', 'in:asc,desc'],
            'perPage' => ['nullable', 'integer'],
            'page'    => ['nullable', 'integer'],
        ];
    }
}
