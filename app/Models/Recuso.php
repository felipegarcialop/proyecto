<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Recuso
 *
 * @property $id
 * @property $nombre
 * @property $objetivo
 * @property $descipcion
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Recuso extends Model
{
    
    static $rules = [
		'nombre' => 'required',
		'objetivo' => 'required',
		'descipcion' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre','objetivo','descipcion'];



}
