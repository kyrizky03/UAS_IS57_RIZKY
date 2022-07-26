<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/pasien', [EventController::class, 'index']);
Route::get('/pasien/form', [EventController::class, 'create']);
Route::post('/pasien/store', [EventController::class, 'store']);
Route::get('/pasien/edit/{id}', [EventController::class, 'edit']);
Route::put('/pasien/{id}', [EventController::class, 'update']);
Route::delete('/pasien/{id}', [EventController::class, 'destroy']);
