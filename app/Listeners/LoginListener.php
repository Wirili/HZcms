<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Login;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

use App\Models\Admin;
use App\Models\User;

class LoginListener
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
     * @param  Login $event
     * @return void
     */
    public function handle(Login $event)
    {
        //
        if ($event->user instanceof User) {
            $event->user->last_ip = \Request::getClientIp();
            $event->user->last_time = date('Y-m-d H:i:s');
            $event->user->login_count += 1;
            $event->user->save();

//            $login = new LogUserLogin();
//            $login->user_id = $event->user->user_id;
//            $login->ip = \Request::getClientIp();
//            $login->add_time = date('Y-m-d H:i:s');
//            $login->save();
        }
    }
}
