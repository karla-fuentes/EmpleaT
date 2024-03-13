<?php

namespace Modules\Usuarios\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Usuarios\Entities\Usuario;

class UsuariosDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        $this->call(RolesAndPermissionsSeederTableSeeder::class);
        $this->call(UsersSeederTable::class);

        $superAdmin = Usuario::whereEmail('soporte@grupoperinola.com')->first();
        $superAdmin->assignRole('Super Admin');
        $admin = Usuario::whereEmail('luis.mendez@grupoperinola.com')->first();
        $admin->assignRole('Admin');
        $usuario = Usuario::whereEmail('uriel@grupoperinola.com')->first();
        $usuario->assignRole('Usuario');
    }
}
