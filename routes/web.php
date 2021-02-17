<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

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

Route::get('/user', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/{user_id}', [HomeController::class, 'chat'])->name('chat');
Route::post('/{user_id}', [HomeController::class, 'sendchat'])->name('sendchat');
Route::get('/page', [HomeController::class, 'page'])->name('page');
Route::get('/call', [HomeController::class, 'call'])->name('call');
Route::get('/status', [HomeController::class, 'status'])->name('status');
