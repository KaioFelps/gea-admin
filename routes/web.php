<?php

use App\Http\Controllers\SessionController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

Route::controller(SessionController::class)->group(function () {
    Route::get("/login", "login")->name("session.login");
});

Route::middleware(['auth', 'auth.session'])->group(function () {
    Route::get('/', function() {
        return view("home");
    })->name("home");

    Route::controller(UserController::class)->group(function() {
        Route::get('/users/new', "create")->name("user.create");
    });
});