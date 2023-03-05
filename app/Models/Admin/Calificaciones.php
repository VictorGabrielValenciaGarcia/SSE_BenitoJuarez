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


    public function materia()
    {
        return $this->hasOne(Materias::class, 'id', 'id_materia');
    }

    public function alumno()
    {
        return $this->hasOne(Alumnos::class, 'id', 'id_alumno');
    }



}

?>
