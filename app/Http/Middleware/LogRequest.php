<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

/**
 * $ sail artisan make:middleware LogRequest // to create the custom middleware in the App/Http/Middleware dir. then go to app/http/kernel.php and register your custom middleware 
 * NOTE:- handle() method is used to write the middleware logic.
 * - middleware need to be registered in app/Http/Middleware/Kernel.php file (check the following for more detials)
 */
class LogRequest
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        // following will be logged in the /storage/logs/laravel.log file
        Log::info("custom middelware is logging the request.");
        return $next($request);
    }
}
