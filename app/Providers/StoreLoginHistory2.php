<?php

namespace App\Providers;

use App\Providers\LoginHistory;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\DB;

class StoreLoginHistory2
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
                    "email" => $user->email,
                    "extra" => "addedByListener2"
                )
            )
        ]);

        return $logUserInfo;
    }
}
