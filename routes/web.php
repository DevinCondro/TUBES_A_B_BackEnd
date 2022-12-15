<?php

use App\Http\Controllers\SessionController;
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
    
    return view('dashboard'); /* arahkan ke halaman dashboard */
    });
    //Route Resource
    Route::resource('/pengguna', \App\Http\Controllers\PenggunaController::class);
    Route::resource('/kamar', \App\Http\Controllers\KamarController::class);
    Route::resource('/makanan', \App\Http\Controllers\MakananController::class);

    Route::get('/sesi',[SessionController::class, 'index']);
    Route::post('/sesi/login',[SessionController::class, 'login']);
