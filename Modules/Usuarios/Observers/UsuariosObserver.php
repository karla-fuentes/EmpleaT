<?php

namespace Modules\Usuarios\Observers;

use App;
use Mail;
use Auth;
use Modules\Usuarios\Entities\Usuario;
use Modules\Usuarios\Emails\UsuarioCreated;
use Modules\Usuarios\Emails\UsuarioUpdated;

/**
 * retrieved, creating, created, updating, updated, saving, saved, deleting, deleted, restoring, restored
 */
class UsuariosObserver
{
    /**
     * Listen to the Usuario created event.
     *
     * @param  Usuario  $usuario
     * @return void
     */
    public function created(Usuario $usuario)
    {
        if (App::runningInConsole()) return;

        $loggeduser = Auth::user();

        Mail::to(getAdminMail())->send(new UsuarioCreated($loggeduser, $usuario));
    }

    /**
     * Listen to the Usuario updating event.
     *
     * @param  Usuario  $usuario
     * @return void
     */
    public function updating(Usuario $usuario)
    {
        $previousStatus = Usuario::find($usuario->id);
        session(['cajaverde.user.previous' => $previousStatus->getAttributes()]);
    }


    /**
     * Listen to the Usuario updated event.
     *
     * @param  Usuario  $usuario
     * @return void
     */
    public function updated(Usuario $usuario)
    {
        if (App::runningInConsole()) return;

        $loggeduser = Auth::user();

        $crud = session('cajaverde.user.update', false);
        if(!$crud) return;

        $previousStatus = session('cajaverde.user.previous');

        session(['cajaverde.user.update' => false]);
        session(['cajaverde.user.previous' => false]);

        Mail::to(getAdminMail())->send(new UsuarioUpdated($loggeduser, $usuario));
    }
}
