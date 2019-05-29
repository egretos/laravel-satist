<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Field
 *
 * @property int $id
 * @property string $name
 * @property string $display_name
 * @property int $type_id
 * @method static \Illuminate\Database\Eloquent\Builder|Field newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Field newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Field query()
 * @method static \Illuminate\Database\Eloquent\Builder|Field whereDisplayName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Field whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Field whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Field whereTypeId($value)
 * @mixin \Eloquent
 * @property-read \App\Models\Field $type
 * @property int $entity_id
 * @method static \Illuminate\Database\Eloquent\Builder|Field whereEntityId($value)
 */
class Field extends Model
{
    protected $fillable = ['id', 'name', 'display_name', 'entity_id', 'type_id'];

    public $timestamps = false;

    public function type()
    {
        return $this->belongsTo(Type::class);
    }

    public function __toString()
    {
        return $this->name;
    }
}