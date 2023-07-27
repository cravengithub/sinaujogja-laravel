<?php

use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DivisiAPIController;
use Illuminate\Support\Facades\Auth;

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
// Route::controller(DivisiController::class)->group(function () {
//     Route::get('/divisi/api/get_all', 'get_all')->name('divisi.api.get_all');
//     Route::post('/divisi/api/store', 'api_store')->name('divisi.api.store');
// });
Route::controller(AuthController::class)->group(function () {
    Route::post('login', 'login');
    Route::post('register', 'register');
    Route::post('logout', 'logout');
});

Route::controller(DivisiAPIController::class)->prefix('/divisi')->group(function () {
    Route::get('/list', 'index')->middleware('auth:sanctum');
    Route::post('/store', 'store')->middleware('auth:sanctum');
    Route::delete('/destroy', 'destroy')->middleware('auth:sanctum');;
});
