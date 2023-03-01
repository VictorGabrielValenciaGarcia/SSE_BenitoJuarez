<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Admin\Materias;

class MateriasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Materias::create([
            'nombre' => 'Español I',
            'grado' => 'PRIMERO',
        ]);
        Materias::create([
            'nombre' => 'Matemáticas I',
            'grado' => 'PRIMERO',
        ]);
        Materias::create([
            'nombre' => 'Ciencias Naturales I',
            'grado' => 'PRIMERO',
        ]);
        Materias::create([
            'nombre' => 'Formación Civica I',
            'grado' => 'PRIMERO',
        ]);
        Materias::create([
            'nombre' => 'Educación Física I',
            'grado' => 'PRIMERO',
        ]);
        Materias::create([
            'nombre' => 'Asigantura Estatal',
            'grado' => 'PRIMERO',
        ]);
        Materias::create([
            'nombre' => 'Geografía I',
            'grado' => 'PRIMERO',
        ]);

        // *******

        Materias::create([
            'nombre' => 'Español II',
            'grado' => 'SEGUNDO',
        ]);
        Materias::create([
            'nombre' => 'Matemáticas II',
            'grado' => 'SEGUNDO',
        ]);
        Materias::create([
            'nombre' => 'Ciencias Naturales II',
            'grado' => 'SEGUNDO',
        ]);
        Materias::create([
            'nombre' => 'Formación Civica II',
            'grado' => 'SEGUNDO',
        ]);
        Materias::create([
            'nombre' => 'Educación Física II',
            'grado' => 'SEGUNDO',
        ]);
        Materias::create([
            'nombre' => 'Física',
            'grado' => 'SEGUNDO',
        ]);
        Materias::create([
            'nombre' => 'Geografía II',
            'grado' => 'SEGUNDO',
        ]);

        // *******

        Materias::create([
            'nombre' => 'Español III',
            'grado' => 'TERCERO',
        ]);
        Materias::create([
            'nombre' => 'Matemáticas III',
            'grado' => 'TERCERO',
        ]);
        Materias::create([
            'nombre' => 'Ciencias Naturales III',
            'grado' => 'TERCERO',
        ]);
        Materias::create([
            'nombre' => 'Formación Civica III',
            'grado' => 'TERCERO',
        ]);
        Materias::create([
            'nombre' => 'Educación Física III',
            'grado' => 'TERCERO',
        ]);
        Materias::create([
            'nombre' => 'Quimica',
            'grado' => 'TERCERO',
        ]);
        Materias::create([
            'nombre' => 'Geografía III',
            'grado' => 'TERCERO',
        ]);
    }
}
