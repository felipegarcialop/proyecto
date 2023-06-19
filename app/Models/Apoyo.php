<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Apoyo
 *
 * @property $id
 * @property $nombre
 * @property $descripcion
 * @property $direccion
 * @property $telefono
 * @property $correo
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Apoyo extends Model
{
    
    static $rules = [
		'nombre' => 'required',
		'descripcion' => 'required',
		'direccion' => 'required',
		'telefono' => 'required',
		'correo' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre','descripcion','direccion','telefono','correo'];



}
