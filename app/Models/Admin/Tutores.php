<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tutores extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'apellidoP',
        'apellidoM',

        'sexo',
        'telefono',
        'telefonoCasa',
        'direccion',

    ];

    // Relacion muchos a muchos
    public function alumnos()
    {
        return $this->belongsToMany(Alumnos::class, 'alumnos_tutores','id_tutor','id_alumno');
    }

}
