<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Repuesta
 *
 * @property $id
 * @property $Respuestas
 * @property $created_at
 * @property $updated_at
 *
 * @property AsigRespuestum[] $asigRespuestas
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Repuesta extends Model
{
    
    static $rules = [
		'Respuestas' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['Respuestas'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function asigRespuestas()
    {
        return $this->hasMany('App\Models\AsigRespuestum', 'respuestas_id', 'id');
    }
    

}
