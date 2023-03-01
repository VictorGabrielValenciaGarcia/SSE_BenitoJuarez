<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Admin\Tutores;

class TutoresSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $faker = Faker::create();

        Tutores::create([
            'nombre' => 'Sara',
            'apellidoP' => 'García',
            'apellidoM' => 'Martinez',
            'sexo' => 'M', //'H', 'M', 'NB'
            'telefono' => $faker->phoneNumber,
            'telefonoCasa' => $faker->phoneNumber,
            'direccion' => 'Ninguna',
        ]);

        Tutores::create([
            'nombre' => 'Marcos Antonio',
            'apellidoP' => 'Valencia',
            'apellidoM' => 'Ramirez',
            'sexo' => 'H', //'H', 'M', 'NB'
            'telefono' => $faker->phoneNumber,
            'telefonoCasa' => $faker->phoneNumber,
            'direccion' => 'Ninguna',
        ]);

        Tutores::create([
            'nombre' => 'Araceli',
            'apellidoP' => 'Cruz',
            'apellidoM' => 'López',
            'sexo' => 'M', //'H', 'M', 'NB'
            'telefono' => $faker->phoneNumber,
            'telefonoCasa' => $faker->phoneNumber,
            'direccion' => 'Ninguna',
        ]);

        Tutores::create([
            'nombre' => 'Elezar',
            'apellidoP' => 'García',
            'apellidoM' => 'Martinez',
            'sexo' => 'H', //'H', 'M', 'NB'
            'telefono' => $faker->phoneNumber,
            'telefonoCasa' => $faker->phoneNumber,
            'direccion' => 'Ninguna',
        ]);

        Tutores::create([
            'nombre' => 'Anastacia',
            'apellidoP' => 'Dolores',
            'apellidoM' => 'Ortiz',
            'sexo' => 'M', //'H', 'M', 'NB'
            'telefono' => $faker->phoneNumber,
            'telefonoCasa' => $faker->phoneNumber,
            'direccion' => 'Ninguna',
        ]);

        Tutores::create([
            'nombre' => 'Mauricio',
            'apellidoP' => 'Almaraz',
            'apellidoM' => 'Perez',
            'sexo' => 'H', //'H', 'M', 'NB'
            'telefono' => $faker->phoneNumber,
            'telefonoCasa' => $faker->phoneNumber,
            'direccion' => 'Ninguna',
        ]);

        Tutores::create([
            'nombre' => 'Astrid',
            'apellidoP' => 'Belreng',
            'apellidoM' => 'Alaster',
            'sexo' => 'M', //'H', 'M', 'NB'
            'telefono' => $faker->phoneNumber,
            'telefonoCasa' => $faker->phoneNumber,
            'direccion' => 'Ninguna',
        ]);

        Tutores::create([
            'nombre' => 'Elonk',
            'apellidoP' => 'Musk',
            'apellidoM' => 'Wildrawn',
            'sexo' => 'H', //'H', 'M', 'NB'
            'telefono' => $faker->phoneNumber,
            'telefonoCasa' => $faker->phoneNumber,
            'direccion' => 'Ninguna',
        ]);

        Tutores::create([
            'nombre' => 'ALbert',
            'apellidoP' => 'Eomer',
            'apellidoM' => 'Silmarin',
            'sexo' => 'M', //'H', 'M', 'NB'
            'telefono' => $faker->phoneNumber,
            'telefonoCasa' => $faker->phoneNumber,
            'direccion' => 'Ninguna',
        ]);

        Tutores::create([
            'nombre' => 'Frodo',
            'apellidoP' => 'Boslon',
            'apellidoM' => 'Sotomonte',
            'sexo' => 'M', //'H', 'M', 'NB'
            'telefono' => $faker->phoneNumber,
            'telefonoCasa' => $faker->phoneNumber,
            'direccion' => 'Ninguna',
        ]);

        Tutores::create([
            'nombre' => 'Samsagaz',
            'apellidoP' => 'Winsdey',
            'apellidoM' => 'Sindarin',
            'sexo' => 'M', //'H', 'M', 'NB'
            'telefono' => $faker->phoneNumber,
            'telefonoCasa' => $faker->phoneNumber,
            'direccion' => 'Ninguna',
        ]);

        Tutores::create([
            'nombre' => 'Aragorn',
            'apellidoP' => 'Elessar',
            'apellidoM' => 'Dúnedain',
            'sexo' => 'H', //'H', 'M', 'NB'
            'telefono' => $faker->phoneNumber,
            'telefonoCasa' => $faker->phoneNumber,
            'direccion' => 'Ninguna',
        ]);

        Tutores::create([
            'nombre' => 'Éowyn',
            'apellidoP' => 'Velazques',
            'apellidoM' => 'Reyes',
            'sexo' => 'M', //'H', 'M', 'NB'
            'telefono' => $faker->phoneNumber,
            'telefonoCasa' => $faker->phoneNumber,
            'direccion' => 'Ninguna',
        ]);

        Tutores::create([
            'nombre' => 'Meriadoc',
            'apellidoP' => 'Brandigamo',
            'apellidoM' => 'de Rohan',
            'sexo' => 'H', //'H', 'M', 'NB'
            'telefono' => $faker->phoneNumber,
            'telefonoCasa' => $faker->phoneNumber,
            'direccion' => 'Ninguna',
        ]);

        Tutores::create([
            'nombre' => 'Peregrin',
            'apellidoP' => 'Tuk',
            'apellidoM' => 'de Gondor',
            'sexo' => 'H', //'H', 'M', 'NB'
            'telefono' => $faker->phoneNumber,
            'telefonoCasa' => $faker->phoneNumber,
            'direccion' => 'Ninguna',
        ]);

        Tutores::create([
            'nombre' => 'Théoden',
            'apellidoP' => 'Morwen',
            'apellidoM' => 'de Rohan',
            'sexo' => 'H', //'H', 'M', 'NB'
            'telefono' => $faker->phoneNumber,
            'telefonoCasa' => $faker->phoneNumber,
            'direccion' => 'Ninguna',
        ]);

        Tutores::create([
            'nombre' => 'Saradoc',
            'apellidoP' => 'Brandigamo',
            'apellidoM' => 'del Gamo',
            'sexo' => 'H', //'H', 'M', 'NB'
            'telefono' => $faker->phoneNumber,
            'telefonoCasa' => $faker->phoneNumber,
            'direccion' => 'Ninguna',
        ]);

        Tutores::create([
            'nombre' => 'Esmeralda',
            'apellidoP' => 'Tuk',
            'apellidoM' => 'de Crivaca',
            'sexo' => 'M', //'H', 'M', 'NB'
            'telefono' => $faker->phoneNumber,
            'telefonoCasa' => $faker->phoneNumber,
            'direccion' => 'Ninguna',
        ]);

        Tutores::create([
            'nombre' => 'Thain',
            'apellidoP' => 'Tuk',
            'apellidoM' => 'de la Comarca',
            'sexo' => 'H', //'H', 'M', 'NB'
            'telefono' => $faker->phoneNumber,
            'telefonoCasa' => $faker->phoneNumber,
            'direccion' => 'Ninguna',
        ]);

        Tutores::create([
            'nombre' => 'Eglantina',
            'apellidoP' => 'Ribera',
            'apellidoM' => 'del Gamo',
            'sexo' => 'M', //'H', 'M', 'NB'
            'telefono' => $faker->phoneNumber,
            'telefonoCasa' => $faker->phoneNumber,
            'direccion' => 'Ninguna',
        ]);
    }
}
