<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grupos extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'grado',
        'nombre',
        'numAlumnos'
    ];

    public function alumno(): HasOne
    {
        return $this->belongsTo('App\Models\Admin\Alumnos');
    }

}
