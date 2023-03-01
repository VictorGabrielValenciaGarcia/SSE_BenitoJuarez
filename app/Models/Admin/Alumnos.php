<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alumnos extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'matricula',
        'nombre',
        'apellidoP',
        'apellidoM',
        'direccion',
        'CURP',
        'discapacidades',
        'sexo',
        'edad',
        'id_grupo',
        'fechaEgreso',
        'promedio',

        'fechaRegistro',
        'password',
        'correo',
    ];

    //Relacion uno a uno
    public function grupo()
    {
        return $this->hasOne(Grupos::class, 'id', 'id_grupo');
    }

    //Relacion muchos a muchos
    public function tutores()
    {
        return $this->belongsToMany(Tutores::class, 'alumnos_tutores','id_alumno','id_tutor');
    }
}
