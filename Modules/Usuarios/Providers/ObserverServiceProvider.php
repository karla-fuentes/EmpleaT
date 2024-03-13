<?php

namespace Modules\Usuarios\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Usuarios\Entities\Usuario;
use Modules\Usuarios\Observers\UsuariosObserver;

class ObserverServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        Usuario::observe(UsuariosObserver::class);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
