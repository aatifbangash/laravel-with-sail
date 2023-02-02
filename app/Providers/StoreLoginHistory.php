<?php

namespace App\Providers;

use App\Providers\LoginHistory;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\DB;

class StoreLoginHistory
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
     * NOTE:- Following is the Listener handle() method. Used to write main logic. It will receive the data/event ($user)
     *
     * @param  \App\Providers\LoginHistory  $event
     * @return void
     */
    public function handle(LoginHistory $event)
    {
        /** 
         * Access $user Object from the event
         */
        $user = $event->user;

        $logUserInfo = DB::table('logs')->insert([
            "data" => json_encode(
                array(
                    "userId" => $user->id,
                    "name" => $user->name,
                    "email" => $user->email
                )
            )
        ]);

        return $logUserInfo;
    }
}