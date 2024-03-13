<?php

namespace Modules\Configuraciones\Database\Seeders;

use Illuminate\Database\Seeder;
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

        // create usuarios permissions
        Permission::create(['name' => 'Crear Dropdowns','guard_name' => 'acceso']);
        Permission::create(['name' => 'Editar Dropdowns','guard_name' => 'acceso']);
        Permission::create(['name' => 'Eliminar Dropdowns','guard_name' => 'acceso']);

    }
}
