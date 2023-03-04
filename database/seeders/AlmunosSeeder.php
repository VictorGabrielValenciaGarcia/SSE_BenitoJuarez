<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Admin\Alumnos;


class AlmunosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        Alumnos::create([
            'matricula' => 'UTTI212024',
            'nombre' => 'Víctor Gabriel',
            'apellidoP' => 'Valencia',
            'apellidoM' => 'García',

            'direccion' => 'Ninguna',
            'CURP' => 'VAGV031020HOCLRCA1',
            'discapacidades' => 'Ninguna',

            'id_grupo' => '2',
            'sexo' => 'H', //'H', 'M', 'NB'
            'edad' => 19,

            'fechaRegistro' => $faker->dateTimeBetween('-1 week', '+1 week'),
            'password' => 'holamundo',
            'correo' => 'vgabriel.valencia@gmail.com',
            'promedio' => 9.5,
        ]);

        Alumnos::create([
            'matricula' => 'UTTI20000',
            'nombre' => 'Ana Griselda',
            'apellidoP' => 'Antonio',
            'apellidoM' => 'Lopez',

            'direccion' => 'Ninguna',
            'CURP' => 'LOAG031020HOCLRCA1',
            'discapacidades' => 'Ninguna',

            'id_grupo' => '2',
            'sexo' => 'M', //'H', 'M', 'NB'
            'edad' => 19,

            'fechaRegistro' => $faker->dateTimeBetween('-1 week', '+1 week'),
            'password' => 'holamundo',
            'correo' => 'anna.lopez@gmail.com',
            'promedio' => 9.5,
        ]);

        Alumnos::create([
            'matricula' => 'UTTI200001',
            'nombre' => 'Luis Angel',
            'apellidoP' => 'Castellanos',
            'apellidoM' => 'Jimenez',

            'direccion' => 'Ninguna',
            'CURP' => 'JICL031020HOCLRCA1',
            'discapacidades' => 'Ninguna',

            'id_grupo' => '2',
            'sexo' => 'H', //'H', 'M', 'NB'
            'edad' => 21,

            'fechaRegistro' => $faker->dateTimeBetween('-1 week', '+1 week'),
            'password' => 'holamundo',
            'correo' => 'luis.angel@gmail.com',
            'promedio' => 9.5,
        ]);

        Alumnos::create([
            'matricula' => 'UTTI200002',
            'nombre' => 'Thomas',
            'apellidoP' => 'Gonzales',
            'apellidoM' => 'Revilla',

            'direccion' => 'Ninguna',
            'CURP' => 'GORT031020HOCLRCA1',
            'discapacidades' => 'Ninguna',

            'id_grupo' => '2',
            'sexo' => 'H', //'H', 'M', 'NB'
            'edad' => 26,

            'fechaRegistro' => $faker->dateTimeBetween('-1 week', '+1 week'),
            'password' => 'holamundo',
            'correo' => 'revillacks@gmail.com',
            'promedio' => 9.5,
        ]);

        // 

        Alumnos::create([
            'matricula' => 'UTTI222024',
            'nombre' => 'Luis Angel',
            'apellidoP' => 'Mecina',
            'apellidoM' => 'García',

            'direccion' => 'Ninguna',
            'CURP' => 'MEGL031020HOCLRCA1',
            'discapacidades' => 'Ninguna',

            'id_grupo' => '1',
            'sexo' => 'H', //'H', 'M', 'NB'
            'edad' => 18,

            'fechaRegistro' => $faker->dateTimeBetween('-1 week', '+1 week'),
            'password' => 'holamundo',
            'correo' => 'lowis@gmail.com',
            'promedio' => 9,
        ]);

        Alumnos::create([
            'matricula' => 'UTTI202024',
            'nombre' => 'Luis Estaban',
            'apellidoP' => 'Rios',
            'apellidoM' => 'Ortegua',

            'direccion' => 'Ninguna',
            'CURP' => 'RIOL031020HOCLRCA1',
            'discapacidades' => 'Ninguna',

            'id_grupo' => '3',
            'sexo' => 'H', //'H', 'M', 'NB'
            'edad' => 20,

            'fechaRegistro' => $faker->dateTimeBetween('-1 week', '+1 week'),
            'password' => 'holamundo',
            'correo' => 'estebancito@gmail.com',
            'promedio' => 9,
        ]);
    }
}
