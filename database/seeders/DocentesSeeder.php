<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Admin\Docentes;


class DocentesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        Docentes::create([
            'RFC' => 'DEGA230226MYA',
            'nombre' => 'Amelia',
            'apellidoP' => 'Dyer',
            'apellidoM' => 'Grese',
            'direccion' => 'Ninguna',
            'correo' => 'amelix@gmail.com',
            'password' => 'holamundo',
            'areaFormacion' => 'Educación',
            'sexo' => 'M', //'H', 'M', 'NB'
            'fechaIngreso' => $faker->dateTimeBetween('-1 week', '+1 week'),
            'telefono' => '9514590568',
            'id_materia' => '1',
        ]);

        Docentes::create([
            'RFC' => 'OICM230226RR1',
            'nombre' => 'Magaly',
            'apellidoP' => 'Cruz',
            'apellidoM' => 'Ortiz',
            'direccion' => 'Ninguna',
            'correo' => 'magalyx@gmail.com',
            'password' => 'holamundo',
            'areaFormacion' => 'Salud',
            'sexo' => 'M', //'H', 'M', 'NB'
            'fechaIngreso' => $faker->dateTimeBetween('-1 week', '+1 week'),
            'telefono' => '9514590568',
            'id_materia' => '2',
        ]);

        Docentes::create([
            'RFC' => 'SAME230226MCA',
            'nombre' => 'Ester',
            'apellidoP' => 'Santillana',
            'apellidoM' => 'Mendoza',
            'direccion' => 'Ninguna',
            'correo' => 'esters.mendoza@gmail.com',
            'password' => 'holamundo',
            'areaFormacion' => 'Investigacion',
            'sexo' => 'M', //'H', 'M', 'NB'
            'fechaIngreso' => $faker->dateTimeBetween('-1 week', '+1 week'),
            'telefono' => '9514590568',
            'id_materia' => '3',
        ]);

        Docentes::create([
            'RFC' => 'COSV230226V91',
            'nombre' => 'Vicente',
            'apellidoP' => 'Cortez',
            'apellidoM' => 'Sandoval',
            'direccion' => 'Ninguna',
            'correo' => 'vicente.sandoval@gmail.com',
            'password' => 'holamundo',
            'areaFormacion' => 'Social',
            'sexo' => 'H', //'H', 'M', 'NB'
            'fechaIngreso' => $faker->dateTimeBetween('-1 week', '+1 week'),
            'telefono' => '9514590568',
            'id_materia' => '4',
        ]);

        Docentes::create([
            'RFC' => 'RERE030515RK5',
            'nombre' => 'Emilli',
            'apellidoP' => 'Rodriguez',
            'apellidoM' => 'Reyes',
            'direccion' => 'Ninguna',
            'correo' => 'emill1@gmail.com',
            'password' => 'holamundo',
            'areaFormacion' => 'Organizacional',
            'sexo' => 'M', //'H', 'M', 'NB'
            'fechaIngreso' => $faker->dateTimeBetween('-1 week', '+1 week'),
            'telefono' => '9514590568',
            'id_materia' => '5',
        ]);

        Docentes::create([
            'RFC' => 'SALD030919D90',
            'nombre' => 'Dariana',
            'apellidoP' => 'Sánchez',
            'apellidoM' => 'López',
            'direccion' => 'Ninguna',
            'correo' => 'darix@gmail.com',
            'password' => 'holamundo',
            'areaFormacion' => 'Salud',
            'sexo' => 'M', //'H', 'M', 'NB'
            'fechaIngreso' => $faker->dateTimeBetween('-1 week', '+1 week'),
            'telefono' => '9514590568',
            'id_materia' => '6',
        ]);

        Docentes::create([
            'RFC' => 'VAGV031020EV9',
            'nombre' => 'Víctor Gabriel',
            'apellidoP' => 'Valencia',
            'apellidoM' => 'García',
            'direccion' => 'Ninguna',
            'correo' => 'vgabiel.valencia@gmail.com',
            'password' => 'holamundo',
            'areaFormacion' => 'Investigacion',
            'sexo' => 'H', //'H', 'M', 'NB'
            'fechaIngreso' => $faker->dateTimeBetween('-1 week', '+1 week'),
            'telefono' => '9514590568',
            'id_materia' => '7',
        ]);

        Docentes::create([
            'RFC' => 'ZARF0309101U5',
            'nombre' => 'Francisco Javier',
            'apellidoP' => 'Zarate',
            'apellidoM' => 'Reyes',
            'direccion' => 'Ninguna',
            'correo' => 'franzara@gmail.com',
            'password' => 'holamundo',
            'areaFormacion' => 'Desarrollo de Comunidades',
            'sexo' => 'H', //'H', 'M', 'NB'
            'fechaIngreso' => $faker->dateTimeBetween('-1 week', '+1 week'),
            'telefono' => '9514590568',
            'id_materia' => '8',
        ]);

        Docentes::create([
            'RFC' => 'MUSB2302262U0',
            'nombre' => 'Belatriz',
            'apellidoP' => 'Sorenson',
            'apellidoM' => 'Musk',
            'direccion' => 'Ninguna',
            'correo' => 'belatrix@gmail.com',
            'password' => 'holamundo',
            'areaFormacion' => 'Desarrollo Psicologico',
            'sexo' => 'M', //'H', 'M', 'NB'
            'fechaIngreso' => $faker->dateTimeBetween('-1 week', '+1 week'),
            'telefono' => '9514590568',
            'id_materia' => '9',
        ]);

        Docentes::create([
            'RFC' => 'DAMR230226GI7',
            'nombre' => 'Robert',
            'apellidoP' => 'Miles',
            'apellidoM' => 'Dawner',
            'direccion' => 'Ninguna',
            'correo' => 'miles.robert@gmail.com',
            'password' => 'holamundo',
            'areaFormacion' => 'Social',
            'sexo' => 'H', //'H', 'M', 'NB'
            'fechaIngreso' => $faker->dateTimeBetween('-1 week', '+1 week'),
            'telefono' => '9514590568',
            'id_materia' => '10',
        ]);

        Docentes::create([
            'RFC' => 'MELM230226HF4',
            'nombre' => 'María',
            'apellidoP' => 'Luna',
            'apellidoM' => 'Méndez',
            'direccion' => 'Ninguna',
            'correo' => 'marilu@gmail.com',
            'password' => 'holamundo',
            'areaFormacion' => 'Investigacion',
            'sexo' => 'M', //'H', 'M', 'NB'
            'fechaIngreso' => $faker->dateTimeBetween('-1 week', '+1 week'),
            'telefono' => '9514590568',
            'id_materia' => '11',
        ]);

        Docentes::create([
            'RFC' => 'ZACE2302269A6',
            'nombre' => 'Evangelyne',
            'apellidoP' => 'Zarate',
            'apellidoM' => 'Cruz',
            'direccion' => 'Ninguna',
            'correo' => 'lost.evan@gmail.com',
            'password' => 'holamundo',
            'areaFormacion' => 'Educacion Especial',
            'sexo' => 'M', //'H', 'M', 'NB'
            'fechaIngreso' => $faker->dateTimeBetween('-1 week', '+1 week'),
            'telefono' => '9514590568',
            'id_materia' => '12',
        ]);

        Docentes::create([
            'RFC' => 'VARD2302265B1',
            'nombre' => 'Delma',
            'apellidoP' => 'Valencia',
            'apellidoM' => 'Rodríguez',
            'direccion' => 'Ninguna',
            'correo' => 'delma@gmail.com',
            'password' => 'holamundo',
            'areaFormacion' => 'Educación',
            'sexo' => 'M', //'H', 'M', 'NB'
            'fechaIngreso' => $faker->dateTimeBetween('-1 week', '+1 week'),
            'telefono' => '9514590568',
            'id_materia' => '13',
        ]);

        Docentes::create([
            'RFC' => 'BOCA230226AV1',
            'nombre' => 'Alessandro',
            'apellidoP' => 'Byron',
            'apellidoM' => 'Connor',
            'direccion' => 'Ninguna',
            'correo' => 'nouns@gmail.com',
            'password' => 'holamundo',
            'areaFormacion' => 'Salud',
            'sexo' => 'H', //'H', 'M', 'NB'
            'fechaIngreso' => $faker->dateTimeBetween('-1 week', '+1 week'),
            'telefono' => '9514590568',
            'id_materia' => '14',
        ]);

        Docentes::create([
            'RFC' => 'SEJI2302262E0',
            'nombre' => 'Itzel',
            'apellidoP' => 'Selene',
            'apellidoM' => 'De Jesús',
            'direccion' => 'Ninguna',
            'correo' => 'itzi@gmail.com',
            'password' => 'holamundo',
            'areaFormacion' => 'Investigacion',
            'sexo' => 'M', //'H', 'M', 'NB'
            'fechaIngreso' => $faker->dateTimeBetween('-1 week', '+1 week'),
            'telefono' => '9514590568',
            'id_materia' => '15',
        ]);

        Docentes::create([
            'RFC' => 'SOAM230226J11',
            'nombre' => 'Meredith',
            'apellidoP' => 'Solano',
            'apellidoM' => 'Arrallano',
            'direccion' => 'Ninguna',
            'correo' => 'myxini@gmail.com',
            'password' => 'holamundo',
            'areaFormacion' => 'Docencia de la Psicologia',
            'sexo' => 'M', //'H', 'M', 'NB'
            'fechaIngreso' => $faker->dateTimeBetween('-1 week', '+1 week'),
            'telefono' => '9514590568',
            'id_materia' => '16',
        ]);

        Docentes::create([
            'RFC' => 'KEPH230226CD0',
            'nombre' => 'Harland',
            'apellidoP' => 'Kerr',
            'apellidoM' => 'Pairod',
            'direccion' => 'Ninguna',
            'correo' => 'nuh@gmail.com',
            'password' => 'holamundo',
            'areaFormacion' => 'Educacion Especial',
            'sexo' => 'H', //'H', 'M', 'NB'
            'fechaIngreso' => $faker->dateTimeBetween('-1 week', '+1 week'),
            'telefono' => '9514590568',
            'id_materia' => '17',
        ]);

        Docentes::create([
            'RFC' => 'DILM230226A38',
            'nombre' => 'Michael',
            'apellidoP' => 'Luna',
            'apellidoM' => 'Diaz',
            'direccion' => 'Ninguna',
            'correo' => 'milu.diaz@gmail.com',
            'password' => 'holamundo',
            'areaFormacion' => 'Desarrollo de Comunidades',
            'sexo' => 'H', //'H', 'M', 'NB'
            'fechaIngreso' => $faker->dateTimeBetween('-1 week', '+1 week'),
            'telefono' => '9514590568',
            'id_materia' => '18',
        ]);

        Docentes::create([
            'RFC' => 'LUSR230226PE3',
            'nombre' => 'Ronald',
            'apellidoP' => 'Luna',
            'apellidoM' => 'Sandoval',
            'direccion' => 'Ninguna',
            'correo' => 'ronald.sandoval@gmail.com',
            'password' => 'holamundo',
            'areaFormacion' => 'Desarrollo de Comunidades',
            'sexo' => 'H', //'H', 'M', 'NB'
            'fechaIngreso' => $faker->dateTimeBetween('-1 week', '+1 week'),
            'telefono' => '9514590568',
            'id_materia' => '19',
        ]);

        Docentes::create([
            'RFC' => 'GOPH230226284',
            'nombre' => 'Helen',
            'apellidoP' => 'Gómez',
            'apellidoM' => 'Pacheco',
            'direccion' => 'Ninguna',
            'correo' => 'helen.pacheco@gmail.com',
            'password' => 'holamundo',
            'areaFormacion' => 'Docencia de la Psicologia',
            'sexo' => 'M', //'H', 'M', 'NB'
            'fechaIngreso' => $faker->dateTimeBetween('-1 week', '+1 week'),
            'telefono' => '9514590568',
            'id_materia' => '20',
        ]);

        Docentes::create([
            'RFC' => 'CABG230226PG4',
            'nombre' => 'Guadalupe',
            'apellidoP' => 'Bautista',
            'apellidoM' => 'Carreño',
            'direccion' => 'Ninguna',
            'correo' => 'lupita.ackerman@gmail.com',
            'password' => 'holamundo',
            'areaFormacion' => 'Investigacion',
            'sexo' => 'M', //'H', 'M', 'NB'
            'fechaIngreso' => $faker->dateTimeBetween('-1 week', '+1 week'),
            'telefono' => '9514590568',
            'id_materia' => '21',
        ]);
    }
}
