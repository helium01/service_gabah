<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HujansensorController;
use App\Http\Controllers\LdrsensorController;
use App\Http\Controllers\PirsensorController;
use App\Http\Controllers\ServoController;
use App\Http\Controllers\SuhusensorController;
use App\Http\Controllers\botController;

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
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('hujan/view', [HujansensorController::class, 'index_view']);
Route::get('cahaya/view', [LdrsensorController::class, 'index_view']);
Route::get('pir/view', [PirsensorController::class, 'index_view']);
Route::get('servo/view', [ServoController::class, 'index_view']);
Route::get('suhu/view', [SuhusensorController::class, 'index_view']);
Route::get('/bot/tele', [botController::class, 'sendMessageToTelegram']);
Route::post('/telegram/webhook', [botController::class, 'handleRequest']);
Route::get('/webhook', [botController::class, 'setwebhook']);
