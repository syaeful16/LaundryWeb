<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\GoogleController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['guest'])->prefix('auth')->group(function () {
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::get('/register', [AuthController::class, 'register']);

    //post
    Route::post('/login', [AuthController::class, 'authLogin'])->name('store.login');
    Route::post('/register', [AuthController::class, 'create'])->name('create.register');

    //google
    Route::get('/redirect', [GoogleController::class, 'redirectToGoogle'])->name('google.login');
    Route::get('/google/callback', [GoogleController::class, 'googleCallback']);
});

Route::get('/logout', [AuthController::class, 'logout']);
