<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ReservationController;

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

Route::get('/', function () {
    return view('index');
});

Route::get('test/get', [TestController::class, 'get']);
Route::get('test/post', [TestController::class, 'post']);

Route::prefix('event')->name('event.')->group(function() {
    Route::get('/', [EventController::class, 'index'])->name('index');
    Route::get('/show/{event}', [EventController::class, 'show'])->name('show');
    Route::get('/create', [EventController::class, 'create'])->name('create');
    Route::get('/edit/{event}', [EventController::class, 'edit'])->name('edit');
});

Route::prefix('user')->name('user.')->group(function() {
    Route::get('/', [UserController::class, 'index'])->name('index');
    Route::get('/show/{user}', [UserController::class, 'show'])->name('show');
    Route::get('/create', [UserController::class, 'create'])->name('create');
    Route::get('/edit/{user}', [UserController::class, 'edit'])->name('edit');
});