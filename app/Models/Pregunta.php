<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Pregunta
 *
 * @property $id
 * @property $pregunta
 * @property $encuesta_id
 * @property $created_at
 * @property $updated_at
 *
 * @property Encuesta $encuesta
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Pregunta extends Model
{
    
    static $rules = [
		'pregunta' => 'required',
		'encuesta_id' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['pregunta','encuesta_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function encuesta()
    {
        return $this->hasOne('App\Models\Encuesta', 'id', 'encuesta_id');
    }
    

}
