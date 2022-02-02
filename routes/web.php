<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
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

Route::middleware('guest')->group(function () {
    Route::get('login', [UserController::class, 'login'])->name('login');
    Route::post('login', [UserController::class, 'authenticate']);
    Route::get('register', [UserController::class, 'register'])->name('register');
    Route::post('register', [UserController::class, 'store']);
});

Route::middleware('auth')->group(function (){
    Route::get('', [PostController::class, 'home']);
    Route::get('post/create', [PostController::class, 'create']);
    Route::post('post/create', [PostController::class, 'store']);
    Route::get('post/{id}', [PostController::class, 'show']);
    Route::post('post/{id}', [CommentController::class, 'create']);
    Route::get('post/{id}/edit', [PostController::class, 'edit']);
    Route::post('post/{id}/edit', [PostController::class, 'update']);
    Route::post('post/{id}/delete', [PostController::class, 'delete']);
    Route::post('comment/{id}/delete', [CommentController::class, 'delete']);
});
