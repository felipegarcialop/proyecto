<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Alumno
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
class Alumno extends Model
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
    public function aulas()
    {
        return $this->belongsToMany(AAula::class, 'a_aula_alumno', 'alumno_id', 'a_aula_id');
    }
}