<?php

namespace App\Http\Requests\Car;

use Illuminate\Foundation\Http\FormRequest;

class IndexRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rule(): array
    {
        return [
            'name' => ['nullable', 'string'],
            'cc' => ['nullable', 'integer', 'min:0'],
            'date_from' => ['nullable', 'date'],
            'date_to' => ['nullable', 'date'],
        ];
    }

    public function attributes()
    {
        return [
            'name' => '車名',
            'cc' => '排気量',
            'date_from' => '販売開始日(From)',
            'date_to' => '販売開始日(To)',
        ];
    }
}
