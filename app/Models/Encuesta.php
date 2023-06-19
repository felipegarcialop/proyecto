<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Encuesta
 *
 * @property $id
 * @property $Titulo
 * @property $tema_id
 * @property $created_at
 * @property $updated_at
 *
 * @property Tema $tema
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Encuesta extends Model
{
    
    static $rules = [
		'Titulo' => 'required',
		'tema_id' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['Titulo','tema_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function tema()
    {
        return $this->hasOne('App\Models\Tema', 'id', 'tema_id');
    }
    

}
