<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Docentes extends Model
{
    use HasFactory;

    protected $fillable = [
        'password',

        'nombre',
        'apellidoP',
        'apellidoM',

        'RFC',
        'direccion',
        'telefono',
        'sexo',
        'correo',


        'id_materia',
        'areaFormacion',
        'fechaIngreso',
        'fechaBaja',
    ];

    /**
     * Get the user associated with the Alumnos
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function materia()
    {
        return $this->hasOne(Materias::class, 'id', 'id_materia');
    }
}
