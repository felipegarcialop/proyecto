<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Institucione
 *
 * @property $id
 * @property $Nombre
 * @property $created_at
 * @property $updated_at
 */
class Institucione extends Model
{
    static $rules = [
        'Nombre' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['Nombre'];
}
