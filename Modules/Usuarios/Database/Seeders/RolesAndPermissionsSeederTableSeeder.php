<?php

namespace Modules\Usuarios\Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeederTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        // USUARIOS

        Role::create(['name' => 'Super Admin','guard_name' => 'acceso']);
        Role::create(['name' => 'Admin','guard_name' => 'acceso']);
        Role::create(['name' => 'Usuario','guard_name' => 'acceso']);

        // create usuarios permissions
        Permission::create(['name' => 'Crear Usuarios','guard_name' => 'acceso']);
        Permission::create(['name' => 'Editar Usuarios','guard_name' => 'acceso']);
        Permission::create(['name' => 'Eliminar Usuarios','guard_name' => 'acceso']);

        // ROLES

        // create roles permissions
        Permission::create(['name' => 'Crear Roles','guard_name' => 'acceso']);
        Permission::create(['name' => 'Editar Roles','guard_name' => 'acceso']);
        Permission::create(['name' => 'Eliminar Roles','guard_name' => 'acceso']);

        // PERMISOS

        // create permisos permissions
        Permission::create(['name' => 'Crear Permisos','guard_name' => 'acceso']);
        Permission::create(['name' => 'Editar Permisos','guard_name' => 'acceso']);
        Permission::create(['name' => 'Eliminar Permisos','guard_name' => 'acceso']);

    }
}
