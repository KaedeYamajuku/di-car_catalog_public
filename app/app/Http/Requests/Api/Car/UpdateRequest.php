<?php

namespace App\Http\Requests\Api\Car;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    public function __authorize(): bool
    {
        return true;
    }

    public function __rules(): array
    {
        return [
            'user_id' => ['required', 'exists:users,id'],
            'car_id' => ['required', 'exists:cars,id'],
            'is_favorite' => ['required', 'boolean'],
        ];
    }

    public function __attributes(): array
    {
        return [
            'user_id' => 'ユーザID',
            'car_id' => '車ID',
            'is_favorite' => 'いいね',
        ];
    }
}
