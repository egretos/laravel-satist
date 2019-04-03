<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Type
 *
 * @package App\Models
 * @property int $id
 * @property string $name
 * @method static \Illuminate\Database\Eloquent\Builder|Type newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Type newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Type query()
 * @method static \Illuminate\Database\Eloquent\Builder|Type whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Type whereName($value)
 * @mixin \Eloquent
 */
class Type extends Model
{
    protected $table = 'types';

    protected $fillable = ['name'];

    public $timestamps = false;

}