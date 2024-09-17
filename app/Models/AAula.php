<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AAula extends Model
{
    protected $fillable = ['docente_id', 'alumno_ids'];

    // Obtener los IDs de alumnos como un array
    public function getAlumnoIdsAttribute()
    {
        return !empty($this->attributes['alumno_ids']) ? explode(',', $this->attributes['alumno_ids']) : [];
    }

    // Establecer los IDs de alumnos desde un array
    public function setAlumnoIdsAttribute($value)
    {
        $this->attributes['alumno_ids'] = is_array($value) ? implode(',', $value) : '';
    }

    // Relación con Docente
    public function docente()
    {
        return $this->belongsTo(Docente::class, 'docente_id');
    }
    
    public function alumnos()
{
    return $this->hasMany(Alumno::class, 'a_aula_id');
}

}

