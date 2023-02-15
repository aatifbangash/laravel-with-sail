<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

/**
 * $ sail artisan make:command RunCronjob --command=run:cronjob // this cmd will create a 
 * custom artisan command under app/Console/Commands dir. The main logic should be written in the handel() method.
 * 
 * $ sail artisan list // you can view your custom command in the list on terminal
 * $ sail artisan run:cronjob // to run the custom command from the terminal
 * NOTE:- in order to set the schedular for the command, we have to register it in the app/Console/Commands/Kernel.php file (check the following file for more details)  
 * 
 * $ sail artisan schedule:run // following command is used to run schedular or to set cronjob in the linux
 * ||| * * * * * cd /path-to-your-project && php artisan schedule:run >> /dev/null 2>&1
 */
class RunCronjob extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'run:cronjob';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Following command will run the cronjob';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        // following method will append logs to /storage/logs/laravel.log
        Log::info("Cron is working fine.");
        return 0;
    }
}
