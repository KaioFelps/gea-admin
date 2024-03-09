<?php

use App\Http\Controllers\SessionController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::controller(SessionController::class)->group(function() {
    Route::post('/login', "store")->name("session.store");
});

Route::middleware(['auth', 'auth.session'])->group(function() {
    Route::controller(UserController::class)->group(function() {
        Route::post("/user/new", "store")->name("user.store");
    });

    Route::controller(SessionController::class)->group(function() {
        Route::get('/logout', "destroy")->name("session.logout");
    });
});
