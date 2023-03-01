<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Admin\AlumnosTutores;

class AsignacionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        AlumnosTutores::create([
            'id_alumno' => '1',
            'id_tutor' => '1',
            'parentesco' => 'PADRE', //'PADRE', 'MADRE', 'DE CONFIANZA'
        ]);
        AlumnosTutores::create([
            'id_alumno' => '1',
            'id_tutor' => '2',
            'parentesco' => 'MADRE', //'PADRE', 'MADRE', 'DE CONFIANZA'
        ]);
        AlumnosTutores::create([
            'id_alumno' => '1',
            'id_tutor' => '3',
            'parentesco' => 'DE CONFIANZA', //'PADRE', 'MADRE', 'DE CONFIANZA'
        ]);

        AlumnosTutores::create([
            'id_alumno' => '2',
            'id_tutor' => '4',
            'parentesco' => 'PADRE', //'PADRE', 'MADRE', 'DE CONFIANZA'
        ]);
        AlumnosTutores::create([
            'id_alumno' => '2',
            'id_tutor' => '5',
            'parentesco' => 'MADRE', //'PADRE', 'MADRE', 'DE CONFIANZA'
        ]);
        AlumnosTutores::create([
            'id_alumno' => '2',
            'id_tutor' => '6',
            'parentesco' => 'DE CONFIANZA', //'PADRE', 'MADRE', 'DE CONFIANZA'
        ]);

        AlumnosTutores::create([
            'id_alumno' => '3',
            'id_tutor' => '7',
            'parentesco' => 'PADRE', //'PADRE', 'MADRE', 'DE CONFIANZA'
        ]);
        AlumnosTutores::create([
            'id_alumno' => '3',
            'id_tutor' => '8',
            'parentesco' => 'MADRE', //'PADRE', 'MADRE', 'DE CONFIANZA'
        ]);
        AlumnosTutores::create([
            'id_alumno' => '3',
            'id_tutor' => '9',
            'parentesco' => 'DE CONFIANZA', //'PADRE', 'MADRE', 'DE CONFIANZA'
        ]);

    }
}
