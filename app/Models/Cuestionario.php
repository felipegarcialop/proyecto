<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Cuestionario
 *
 * @property $id
 * @property $pregunta_id
 * @property $repuesta_id
 * @property $ponderaciones_id
 * @property $created_at
 * @property $updated_at
 *
 * @property Ponderacione $ponderacione
 * @property Pregunta $pregunta
 * @property Repuesta $repuesta
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Cuestionario extends Model
{
    
    static $rules = [
		'pregunta_id' => 'required',
		'repuesta_id' => 'required',
		
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['pregunta_id','repuesta_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    
    
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
