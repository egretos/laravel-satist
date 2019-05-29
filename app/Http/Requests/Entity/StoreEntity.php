<?php

namespace App\Http\Requests\Entity;

use Illuminate\Foundation\Http\FormRequest;

class StoreEntity extends FormRequest
{
    public function rules()
    {
        return [
            'id' => 'nullable|integer|exists',
            'name' => 'required|string|alpha_dash|min:3|max:72',
            'display_name' => 'required|string|min:3|max:72',
        ];
    }
}
