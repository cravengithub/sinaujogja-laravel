<?php

use App\Http\Controllers\DivisiController;
use App\Http\Controllers\LoginRegisterController;
use App\Http\Controllers\RegisterLoginController;
use Illuminate\Support\Facades\Route;
use App\Models\Divisi;
use Illuminate\Http\Request;

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
    return view('welcome');
});
Route::get('/latihan', function () {
    return view('latihan');
});
Route::get('/daftar', function () {
    $data['kode'] = 'A81';
    $data['lokasi'] = 'Yogyakarta';
    $data['divisi'] = Divisi::all();
    return view('daftar', $data);
});


Route::resource('divisi', DivisiController::class)->middleware('auth');

/*
Route::get('register', function () {
    return view('auth.register');
});
Route::get('login', function () {
    return view('auth.login');
});
*/
Route::controller(LoginRegisterController::class)->group(function () {
    Route::get('/register', 'register')->name('register');
    Route::get('/login', 'login')->name('login');
    Route::post('/authenticate', 'authenticate')->name('authenticate');
    Route::get('/logout', 'logout')->name('logout');
});

// Route::apiResource('divisi', DivisiController::class);
/*
Route::get('/laporan_harian', function(Request $request, {$id}){
    ReportController::report($id);
});
*/

/*
Route::get('/form', function(){
    return view('divisi.form');
});
Route::get('/destroy', function(){
    return view('divisi.destroy');
});
Route::get('/list', function(){
    return view('divisi.list');
});
*/
