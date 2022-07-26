<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PasienController;
use App\Http\Controllers\PemeriksaanController;

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
    return view('home');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/pasien', [PasienController::class, 'index']);
Route::get('/pasien/form', [PasienController::class, 'create']);
Route::post('/pasien/store', [PasienController::class, 'store']);
Route::get('/pasien/edit/{id}', [PasienController::class, 'edit']);
Route::put('/pasien/{id}', [PasienController::class, 'update']);
Route::delete('/pasien/{id}', [PasienController::class, 'destroy']);

Route::get('/pemeriksaan', [PemeriksaanController::class, 'index']);
Route::get('/pemeriksaan/form', [PemeriksaanController::class, 'create']);
Route::post('/pemeriksaan/store', [PemeriksaanController::class, 'store']);
Route::get('/pemeriksaan/edit/{id}', [PemeriksaanController::class, 'edit']);
Route::put('/pemeriksaan/{id}', [PemeriksaanController::class, 'update']);
Route::delete('/pemeriksaan/{id}', [PemeriksaanController::class, 'destroy']);
