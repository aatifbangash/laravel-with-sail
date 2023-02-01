<?php

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
Route::get('/posts', [PostsController::class, "index"])->name("post.list");
Route::get('/posts/create', [PostsController::class, "create"])->name("post.create");
Route::post('/posts/store', [PostsController::class, "store"])->name("post.store");
Route::get('/posts/edit/{id}', [PostsController::class, "edit"])->name("post.edit");
Route::put('/posts/update/{id}', [PostsController::class, "update"])->name("post.update");
Route::delete('/posts/destroy/{post}', [PostsController::class, "destroy"])->name("post.destroy");