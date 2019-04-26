<?php

namespace App\Services;

use App\Models\Type;

class TypeService
{
    public function all()
    {
        return Type::all();
    }

    /**
     * @param $data
     * @return bool
     */
    public function store($data)
    {
        try {
            return (new Type($data))->save();
        } catch (\Exception $exception) {
            \Log::error($exception);
            return false;
        }
    }


    public function delete($id)
    {
        $type = Type::findOrFail($id);

        try {
            return $type->delete();
        } catch (\Exception $exception) {
            \Log::error($exception);
            return false;
        }
    }

    public function restore($id)
    {
        $type = Type::withTrashed()->findOrFail($id);
        return $type->restore();
    }
}