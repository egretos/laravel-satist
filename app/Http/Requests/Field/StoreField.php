<?php

namespace App\Http\Requests\Field;

use Illuminate\Foundation\Http\FormRequest;

class StoreField extends FormRequest
{
    public function rules()
    {
        return [
            'id' => 'nullable|integer|exists',
            'entity_id' => 'required|integer|exists:entities,id',
            'type_id' => 'required|integer|exists:types,id',
            'name' => 'required|string|alpha_dash|min:3|max:72',
            'display_name' => 'required|string|min:3|max:72',
        ];
    }
}