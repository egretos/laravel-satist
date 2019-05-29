<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Type
 *
 * @property int $id
 * @property string $name
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Field[] $fields
 * @method static \Illuminate\Database\Eloquent\Builder|newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|query()
 * @method static \Illuminate\Database\Eloquent\Builder|whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|whereName($value)
 * @mixin \Eloquent
 */
class Type extends Model
{
    protected $fillable = ['id', 'name', 'display_name'];

    public $timestamps = false;

    public function fields()
    {
        return $this->hasMany(Field::class);
    }

    public function __toString()
    {
        return $this->name;
    }
}