<?php

namespace App\Jobs;

use App\Mail\SendEmailTest;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

/**
 * - first setup the QUEUE_CONNECTION in the .env file
 * $ sail artisan queue:table // if QUEUE_CONNECTION is set to database then the following cmd will create the migaration file
 * $ sail artisan migrate // run the migration to create queue related tables in the db.
 * 
 * $ sail artisan make:job SendEmailJob // the following cmd will create new Job/queue/consumer in app/jobs dir.
 *  Every job accept data ($details) in constructor to process and every job is having the handle() method 
 *  where the logic happen.
 */
class SendEmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * following is the data being passed from the controller to the event to be processed
     */
    protected $data;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Execute the job.
     * handle() is the method where is main logic happened.
     *
     * @return void
     */
    public function handle()
    {
        $email = new SendEmailTest();
        Mail::to($this->data['email'])->send($email);
    }
}
