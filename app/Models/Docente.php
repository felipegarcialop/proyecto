<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Docente
 *
 * @property $id
 * @property $user_id
 * @property $created_at
 * @property $updated_at
 *
 * @property User $user
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */

class Docente extends Model
{
    static $rules = [
        'user_id' => 'required',
    ];

    protected $perPage = 20;

    protected $fillable = ['user_id'];

    /**
     * Relación con el modelo User
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    

    /**
     * Relación con el modelo AAula (el docente puede tener muchas aulas)
     */
    public function aulas()
    {
        return $this->hasMany(AAula::class, 'docente_id'); // Relaciona con la tabla AAula usando 'docente_id'
    }
}
