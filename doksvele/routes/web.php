<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GameController;
use App\Http\Controllers\PlayerController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PictureController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ClubController;

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

Route::get('/email/verify', function () {
  return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/', function () {
  return view('welcome');
});

Route::resource('games', GameController::class)->only(['index']);
Route::resource('players', PlayerController::class);
Route::resource('posts', PostController::class)->only(['index']);
Route::resource('pictures', PictureController::class)->only(['index']);

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
  return view('dashboard');
})->name('dashboard');

Route::group(['middleware' => 'auth'], function() {
  Route::resource('tickets', TicketController::class);
  Route::resource('orders', OrderController::class);
  Route::resource('users', UserController::class);
  Route::resource('clubs', ClubController::class);
  Route::resource('games', GameController::class)->except([
    'index', 'show', 'destroy'
  ]);
  Route::resource('posts', PostController::class)->except([
    'index', 'show'
  ]);
  Route::resource('pictures', PictureController::class)->except([
    'index', 'show', 'edit', 'update'
  ]);
});
