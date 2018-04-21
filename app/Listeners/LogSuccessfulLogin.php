<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Login;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class LogSuccessfulLogin
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
        //
        $event->user->last_login = \Carbon\Carbon::now();
        $event->user->last_ip = \Request::ip();

        //set timezone to user's choice
        //config(['app.timezone' => 'America/Chicago']);
        $event->user->save();
    }
}
