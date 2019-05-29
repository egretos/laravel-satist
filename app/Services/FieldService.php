<?php

namespace App\Services;

use App\Models\Field;

class FieldService
{
    public function store($data)
    {
        try {
            return (new Field($data))->save();
        } catch (\Exception $exception) {
            \Log::error($exception);
            return false;
        }
    }

    public function delete($id)
    {
        $type = Field::findOrFail($id);

        try {
            return $type->delete();
        } catch (\Exception $exception) {
            \Log::error($exception);
            return false;
        }
    }
}