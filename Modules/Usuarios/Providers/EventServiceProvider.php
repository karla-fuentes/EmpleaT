<?php

namespace Modules\Usuarios\Providers;

use Illuminate\Auth\Events\Login;
use Modules\Usuarios\Events\UserHasLogged;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    protected $listen = [
        Login::class => [
            UserHasLogged::class,
        ],
    ];
}