<?php

namespace App\Listeners;

use App\Models\bitacora;
use Illuminate\Auth\Events\Logout;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\DB;

class LogSuccessfulLogout
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
     * @param  Logout  $event
     * @return void
     */
    public function handle(Logout $event)
    {
        //DB::statement('CALL newBitacora(?,?,?,?)', [now()->format('Y-m-d'), now()->format('H:i'), 'El usuario: ' . $event->user->name . ' cerró sesión', $event->user->id]);
        $bitacora = new bitacora();
        $bitacora->crear('El usuario: ' . $event->user->name . ' cerró sesión');
    }
}
