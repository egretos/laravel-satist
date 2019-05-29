<?php

namespace App\Services;

use App\Models\Entity;

class EntityService
{
    /**
     * @param $data
     * @return bool
     */
    public function store($data)
    {
        try {
            return (new Entity($data))->save();
        } catch (\Exception $exception) {
            \Log::error($exception);
            return false;
        }
    }


    public function delete($id)
    {
        $type = Entity::findOrFail($id);

        try {
            return $type->delete();
        } catch (\Exception $exception) {
            \Log::error($exception);
            return false;
        }
    }

    public function restore($id)
    {
        $type = Entity::withTrashed()->findOrFail($id);
        return $type->restore();
    }
}