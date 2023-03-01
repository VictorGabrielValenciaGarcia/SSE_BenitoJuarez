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
}
