<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ReservationController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::prefix('user')->name('user.')->group(function() {
    Route::post('/store', [UserController::class, 'store'])->name('store');
    Route::put('/update/{user}', [UserController::class, 'update'])->name('update');
    Route::delete('/destroy/{user}', [UserController::class, 'destroy'])->name('destroy');
});

Route::prefix('event')->name('event.')->group(function() {
    Route::post('/store', [EventController::class, 'store'])->name('store');
    Route::put('/update/{event}', [EventController::class, 'update'])->name('update');
    Route::delete('/destroy/{event}', [EventController::class, 'destroy'])->name('destroy');
});

Route::prefix('reservation')->name('reservation.')->group(function() {
    Route::post('/store/{event}', [ReservationController::class, 'store'])->name('store');
    Route::delete('/destroy/{event}/{user}', [ReservationController::class, 'destroy'])->name('destroy');
});