<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Admin\Grupos;

class GruposSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Grupos::create([
            'grado' => 'PRIMERO',
            'nombre' => 'Primero A-2023',
            'numAlumnos' => 20,
        ]);
        Grupos::create([
            'grado' => 'PRIMERO',
            'nombre' => 'Primero B-2023',
            'numAlumnos' => 20,
        ]);

        Grupos::create([
            'grado' => 'SEGUNDO',
            'nombre' => 'Segundo A-2023',
            'numAlumnos' => 20,
        ]);
        Grupos::create([
            'grado' => 'SEGUNDO',
            'nombre' => 'Segundo B-2023',
            'numAlumnos' => 20,
        ]);

        Grupos::create([
            'grado' => 'TERCERO',
            'nombre' => 'Tercero A-2023',
            'numAlumnos' => 20,
        ]);
        Grupos::create([
            'grado' => 'TERCERO',
            'nombre' => 'Tercero B-2023',
            'numAlumnos' => 20,
        ]);
    }
}
