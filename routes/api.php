<?php

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('pirs', [PirsensorController::class, 'index']);
Route::post('pirs', [PirsensorController::class, 'store']);
Route::get('pirs/{sensor}', [PirsensorController::class, 'show']);
Route::put('pirs/{sensor}', [PirsensorController::class, 'update']);
Route::delete('pirs/{sensor}', [PirsensorController::class, 'destroy']);

Route::get('hujans', [HujansensorController::class, 'index']);
Route::post('hujans', [HujansensorController::class, 'store']);
Route::get('hujans/{sensor}', [HujansensorController::class, 'show']);
Route::put('hujans/{sensor}', [HujansensorController::class, 'update']);
Route::delete('hujans/{sensor}', [HujansensorController::class, 'destroy']);

Route::get('ldrs', [LdrsensorController::class, 'index']);
Route::post('ldrs', [LdrsensorController::class, 'store']);
Route::get('ldrs/{sensor}', [LdrsensorController::class, 'show']);
Route::put('ldrs/{sensor}', [LdrsensorController::class, 'update']);
Route::delete('ldrs/{sensor}', [LdrsensorController::class, 'destroy']);

Route::get('servos', [ServoController::class, 'index']);
Route::post('servos', [ServoController::class, 'store']);
Route::get('servos/{sensor}', [ServoController::class, 'show']);
Route::put('servos/{sensor}', [ServoController::class, 'update']);
Route::delete('servos/{sensor}', [ServoController::class, 'destroy']);

Route::get('suhus', [SuhusensorController::class, 'index']);
Route::post('suhus', [SuhusensorController::class, 'store']);
Route::get('suhus/{sensor}', [SuhusensorController::class, 'show']);
Route::put('suhus/{sensor}', [SuhusensorController::class, 'update']);
Route::delete('suhus/{sensor}', [SuhusensorController::class, 'destroy']);
