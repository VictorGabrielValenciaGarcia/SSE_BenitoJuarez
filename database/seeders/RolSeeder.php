<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roleA = Role::create(['name' => 'Admin']);
        $roleD = Role::create(['name' => 'Docente']);
        $roleS = Role::create(['name' => 'Alumno']);

        Permission::create(['name' => 'home']);

        //Usuarios
        Permission::create(['name' => 'admin.users.index'])->assignRole($roleA);
        Permission::create(['name' => 'admin.users.edit'])->assignRole($roleA);
        Permission::create(['name' => 'admin.users.update'])->assignRole($roleA);

        //Grupos
        Permission::create(['name' => 'admin.grupos.index'])->assignRole($roleA);
        Permission::create(['name' => 'admin.grupos.list'])->assignRole($roleA);
        Permission::create(['name' => 'admin.grupos.create'])->assignRole($roleA);
        Permission::create(['name' => 'admin.grupos.edit'])->assignRole($roleA);
        Permission::create(['name' => 'admin.grupos.show'])->assignRole($roleA);
        Permission::create(['name' => 'admin.grupos.destroy'])->assignRole($roleA);

        //Tutores
        Permission::create(['name' => 'admin.tutores.assingments'])->assignRole($roleA);
        Permission::create(['name' => 'admin.tutores.assing'])->assignRole($roleA);
        Permission::create(['name' => 'admin.tutores.reassingTutor'])->assignRole($roleA);

        Permission::create(['name' => 'admin.tutores.index'])->assignRole($roleA);
        Permission::create(['name' => 'admin.tutores.list'])->assignRole($roleA);
        Permission::create(['name' => 'admin.tutores.create'])->assignRole($roleA);
        Permission::create(['name' => 'admin.tutores.edit'])->assignRole($roleA);
        Permission::create(['name' => 'admin.tutores.show'])->assignRole($roleA);
        Permission::create(['name' => 'admin.tutores.destroy'])->assignRole($roleA);

        //Alumnos
        Permission::create(['name' => 'admin.alumnos.index'])->assignRole($roleA);
        Permission::create(['name' => 'admin.alumnos.list'])->assignRole($roleA);
        Permission::create(['name' => 'admin.alumnos.create'])->assignRole($roleA);
        Permission::create(['name' => 'admin.alumnos.edit'])->assignRole($roleA);
        Permission::create(['name' => 'admin.alumnos.show'])->assignRole($roleA);
        Permission::create(['name' => 'admin.alumnos.destroy'])->assignRole($roleA);

        //Materias
        Permission::create(['name' => 'admin.materias.index'])->assignRole($roleA);
        Permission::create(['name' => 'admin.materias.list'])->assignRole($roleA);
        Permission::create(['name' => 'admin.materias.create'])->assignRole($roleA);
        Permission::create(['name' => 'admin.materias.edit'])->assignRole($roleA);
        Permission::create(['name' => 'admin.materias.show'])->assignRole($roleA);
        Permission::create(['name' => 'admin.materias.destroy'])->assignRole($roleA);

        //Docentes
        Permission::create(['name' => 'admin.docentes.index'])->assignRole($roleA);
        Permission::create(['name' => 'admin.docentes.list'])->assignRole($roleA);
        Permission::create(['name' => 'admin.docentes.create'])->assignRole($roleA);
        Permission::create(['name' => 'admin.docentes.edit'])->assignRole($roleA);
        Permission::create(['name' => 'admin.docentes.show'])->assignRole($roleA);
        Permission::create(['name' => 'admin.docentes.destroy'])->assignRole($roleA);

        //Calificaciones
        Permission::create(['name' => 'admin.calif.index'])->syncRoles([$roleA, $roleD, $roleS]);
        Permission::create(['name' => 'admin.calif.list'])->syncRoles([$roleA, $roleD, $roleS]);
        Permission::create(['name' => 'admin.calif.create'])->syncRoles([$roleA, $roleD]);
        Permission::create(['name' => 'admin.calif.edit'])->syncRoles([$roleA, $roleD]);
        Permission::create(['name' => 'admin.calif.show'])->syncRoles([$roleA, $roleD, $roleS]);
        Permission::create(['name' => 'admin.calif.destroy'])->syncRoles([$roleA, $roleD]);

        //Dropdpwns
        Permission::create(['name' => 'admin.institucional'])->syncRoles([$roleA]);
        Permission::create(['name' => 'admin.estudiantil'])->syncRoles([$roleA, $roleD, $roleS]);

        /* Asigancion de Permisos */

        // $roleA->permissions()->attach();

    }
}
