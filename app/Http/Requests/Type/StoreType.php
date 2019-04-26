<?php

namespace App\Http\Requests\Type;

use Illuminate\Foundation\Http\FormRequest;

class StoreType extends FormRequest
{
    public function rules()
    {
        return [
            'id' => 'nullable|integer|exists',
            'name' => 'required|string|min:3|max:72',
        ];
    }
}
