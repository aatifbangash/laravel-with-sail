<?php

use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\ProductsController;
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