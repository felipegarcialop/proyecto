<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class AsigRespuesta
 *
 * @property $id
 * @property $pregunta_id
 * @property $repuesta_id
 * @property $ponderacion_id
 * @property $created_at
 * @property $updated_at
 *
 * @property Ponderacione $ponderacione
 * @property Pregunta $pregunta
 * @property Repuesta $repuesta
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class AsigRespuesta extends Model
{
    
    static $rules = [
		'pregunta_id' => 'required',
		'repuesta_id' => 'required',
		'ponderacion_id' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['pregunta_id','repuesta_id','ponderacion_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function ponderacione()
    {
        return $this->hasOne('App\Models\Ponderacione', 'id', 'ponderacion_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function pregunta()
    {
        return $this->hasOne('App\Models\Pregunta', 'id', 'pregunta_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function repuesta()
    {
        return $this->hasOne('App\Models\Repuesta', 'id', 'repuesta_id');
    }
    

}
