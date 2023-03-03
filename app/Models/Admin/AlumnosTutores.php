<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AlumnosTutores extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_alumno',
        'id_tutor',
        'parentesco',
    ];

    public function tutor()
    {
        return $this->hasOne(Tutores::class, 'id', 'id_tutor');
    }

    public function alumno()
    {
        return $this->hasOne(Alumnos::class, 'id', 'id_alumno');
    }

}
