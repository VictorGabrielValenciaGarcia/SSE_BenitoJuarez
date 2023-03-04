<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Calificaciones extends Model
{
    use HasFactory;

    protected $fillable = [
        'parcialUno',
        'parcialDos',
        'parcialTres',
        'promedioFinal',
        'id_materia',
        'id_alumno',
    ];

    public function alumno() : HasOne
    {
        return $this->hasOne(Alumnos::class, 'id', 'id_alumno');
    }

    public function materia() : HasOne
    {
        return $this->hasOne(Materias::class, 'id', 'id_materia');
    }



}

?>
