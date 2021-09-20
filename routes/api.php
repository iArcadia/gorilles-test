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
    Route::get('/', [UserController::class, 'all'])->name('all');
    Route::get('/get/{event}', [UserController::class, 'get'])->name('get');
    Route::post('/store', [UserController::class, 'store'])->name('store');
    Route::put('/update', [UserController::class, 'update'])->name('update');
    Route::delete('/destroy', [UserController::class, 'destroy'])->name('destroy');
});

Route::prefix('event')->name('event.')->group(function() {
    Route::get('/', [EventController::class, 'all'])->name('all');
    Route::get('/get/{event}', [EventController::class, 'get'])->name('get');
    Route::post('/store', [EventController::class, 'store'])->name('store');
    Route::put('/update', [EventController::class, 'update'])->name('update');
    Route::delete('/destroy', [EventController::class, 'destroy'])->name('destroy');
});

Route::prefix('reservation')->name('reservation.')->group(function() {
    Route::get('/', [ReservationController::class, 'all'])->name('all');
    Route::get('/get/{event}/{user}', [ReservationController::class, 'get'])->name('get');
    Route::post('/store', [ReservationController::class, 'store'])->name('store');
    Route::delete('/destroy', [ReservationController::class, 'destroy'])->name('destroy');
});