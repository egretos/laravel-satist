<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\Entity
 *
 * @property int $id
 * @property string $name
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Field[] $fields
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Eloquent\Builder|Entity newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Entity newQuery()
 * @method static \Illuminate\Database\Query\Builder|Entity onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Entity query()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|Entity whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Entity whereName($value)
 * @method static \Illuminate\Database\Query\Builder|Entity withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Entity withoutTrashed()
 * @mixin \Eloquent
 * @property string $display_name
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|Entity whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Entity whereDisplayName($value)
 */
class Entity extends Model
{
    use SoftDeletes;

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