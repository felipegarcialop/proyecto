<?php

namespace App\Models;
use App\Models\Grado;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Tema
 *
 * @property $id
 * @property $Nombre
 * @property $descripcion
 * @property $Fecha
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Tema extends Model
{
    
    static $rules = [
		'Nombre' => 'required',
		'descripcion' => 'required',
		
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['Nombre','descripcion'];



}
