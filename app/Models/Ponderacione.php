<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Ponderacione
 *
 * @property $id
 * @property $ponderacion
 * @property $created_at
 * @property $updated_at
 *
 * @property Cuestionario[] $cuestionarios
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Ponderacione extends Model
{
    
    static $rules = [
		'ponderacion' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['ponderacion'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function cuestionarios()
    {
        return $this->hasMany('App\Models\Cuestionario', 'ponderaciones_id', 'id');
    }
    

}
