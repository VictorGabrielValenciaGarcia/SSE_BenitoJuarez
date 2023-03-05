<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Materias extends Model
{
    use HasFactory;

    protected $fillable = [
        'grado',
        'nombre',
    ];

    public function alumnos()
    {
        return $this->belongsToMany(Materias::class, 'calificaciones','id_materia','id_alumno');
    }
}
