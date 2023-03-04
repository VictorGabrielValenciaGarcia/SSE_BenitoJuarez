<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Depinazul',
            'email' => 'depinazul@gmail.com',
            'password' => bcrypt('depillo1')
        ])->assignRole('Admin');

        User::create([
            'name' => 'Amelia Dyer Grese',
            'email' => 'amelix@gmail.com',
            'password' => bcrypt('holamundo')
        ])->assignRole('Docente');

        User::create([
            'name' => 'Luis Angel Mecinas García',
            'email' => 'lowis@gmail.com',
            'password' => bcrypt('holamundo')
        ])->assignRole('Alumno');

        User::create([
            'name' => 'Victor Gabriel Valencia García',
            'email' => 'vgabriel.valencia@gmail.com',
            'password' => bcrypt('holamundo')
        ])->assignRole('Alumno');

        User::create([
            'name' => 'Luis Estaban Rios Ortegua',
            'email' => 'estebancito@gmail.com',
            'password' => bcrypt('holamundo')
        ])->assignRole('Alumno');

        User::create([
            'name' => 'Ana Griselda Antonio Lopez',
            'email' => 'anna.lopez@gmail.com',
            'password' => bcrypt('holamundo')
        ])->assignRole('Alumno');

        User::create([
            'name' => 'Luis Angel Castellanos Jimenez',
            'email' => 'luis.angel@gmail.com',
            'password' => bcrypt('holamundo')
        ])->assignRole('Alumno');

        User::create([
            'name' => 'Thomas Gonzales Revilla',
            'email' => 'revillacks@gmail.com',
            'password' => bcrypt('holamundo')
        ])->assignRole('Alumno');

    }
}
