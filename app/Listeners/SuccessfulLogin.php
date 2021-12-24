<?php

namespace App\Listeners;

use App\Models\bitacora;
use Illuminate\Auth\Events\Login;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\DB;

class SuccessfulLogin
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  Login  $event
     * @return void
     */
    public function handle(Login $event)
    {
        //DB::statement('CALL newBitacora(?,?,?,?)', [now()->format('Y-m-d'), now()->format('H:i'), 'El usuario: ' . $event->user->name . ' inició sesión', $event->user->id]);
        $bitacora = new bitacora();
        $bitacora->crear('El usuario: ' . $event->user->name . ' inició sesión');
    }
}
