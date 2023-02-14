<?php

use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\ProductsController;
use App\Models\User;
use Notification as NN;
use App\Notifications\SMSNotification;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [PostsController::class, "index"])->name("index");
Route::group([
    'prefix' => 'posts',
    // 'middleware' => ['auth']
], function () {

    Route::middleware('auth')->group(
        function () {
            Route::post('/store', [PostsController::class, "store"])->name("post.store");
            Route::get('/create', [PostsController::class, "create"])->name("post.create");
            Route::get('/edit/{id}', [PostsController::class, "edit"])->name("post.edit");
            Route::put('/update/{id}', [PostsController::class, "update"])->name("post.update");
            Route::delete('/destroy/{post}', [PostsController::class, "destroy"])->name("post.destroy");
        }
    );

    Route::get('/', [PostsController::class, "index"])->name("post.list");
    Route::get('/{post}', [PostsController::class, "show"])->name("post.single");

    // Route::middleware('guest')->group(
    //     function () {
    //         Route::get('/', [PostsController::class, "index"])->name("post.list");
    //         Route::get('/{post}', [PostsController::class, "show"])->name("post.single");
    //     }
    // );
});
// Custom Auth Controller Routes
// Route::get('/user/dashboard',view('user.dashboard'))->name('dashboard');

Route::group(['prefix' => 'user'], function () {
    Route::view('/dashboard', 'user.dashboard')->name('user.dashboard');
    Route::get('/register', [CustomAuthController::class, "register"])->name("user.register");
    Route::post('/register/store', [CustomAuthController::class, "store"])->name("user.register.store");

    Route::get('/login', [CustomAuthController::class, "login"])->name("user.login");
    Route::post('/login/attempt', [CustomAuthController::class, "attempt"])->name("user.login.attempt");

    Route::get('/logout', [CustomAuthController::class, "logout"])->name("user.logout");
});

Route::get('send-job', function () {

    $details['email'] = 'atif@gmail.com';
    /**
     * Following is the method used to dispatch the job/event to be processed by the queue
     * $ sail artisan queue:listen // following command will put all the jobs/queues in listening mode 
     *  to consume the message/data and process via PHP CLI as a linux process (can be multiple process for multiple jobs).
     * 
     * $ sail artisan config:clear // to clear config cache before starting the application
     * http://localhost:8025 // visit the following mail client to check if the email is processed and received or not
     */
    dispatch(new App\Jobs\SendEmailJob($details));

    dd('done');
});

Route::get('send-noti', function () {
    $user = User::first();

    $data = [
        'name' => 'BOGO',
        'body' => 'You received an offer.',
        'thanks' => 'Thank you',
        'offerText' => 'Check out the offer',
        'offerUrl' => url('/'),
        'offer_id' => 007
    ];

    NN::send($user, new SMSNotification($data));

    dd('Task completed!');
});