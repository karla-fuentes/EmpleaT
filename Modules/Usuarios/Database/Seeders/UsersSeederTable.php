<?php

namespace Modules\Usuarios\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Usuarios\Entities\Usuario;

class UsersSeederTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        Usuario::create(
            [
                'nombre' => 'Super',
                'apellido' => 'Admin',
                'email' => 'soporte@grupoperinola.com',
                'password' => 'lAbs_124215@3',
                'descripcion' => 'Super Admin.',
                'activo' => 1,
            ]
        );

        Usuario::create(
            [
                'nombre' => 'Luis',
                'apellido' => 'Mendez',
                'email' => 'luis.mendez@grupoperinola.com',
                'password' => 'lAbs_124215@3',
                'descripcion' => 'Usuario.',
                'activo' => 1,
            ]
        );

        Usuario::create(
            [
                'nombre' => 'Uriel',
                'apellido' => 'Arana',
                'email' => 'uriel@grupoperinola.com',
                'password' => 'lAbs_124215@3',
                'descripcion' => 'Usuario.',
                'activo' => 1,
            ]
        );

    }
}
