<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Spatie\FlareClient\Api;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('register', 'AuthController@register');
Route::post('login', 'AuthController@login');
Route::get('/email-verification', 'AuthController@verify') ->name('verification.verify');

    Route::get('user', 'userController@index');
    Route::get('user/{id}', 'userController@show');
    Route::post('user', 'userController@store');
    Route::put('user/{id}', 'userController@update');
    Route::delete('user/{id}', 'userController@destroy');
    
    Route::get('kamar', 'KamarController@index');
    Route::get('kamar/{id}', 'KamarController@show');
    Route::post('kamar', 'KamarController@store');
    Route::put('kamar/{id}', 'KamarController@update');
    Route::delete('kamar/{id}', 'KamarController@destroy');

    Route::get('makanan', 'MakananController@index');
    Route::get('makanan/{id}', 'MakananController@show');
    Route::post('makanan', 'MakananController@store');
    Route::put('makanan/{id}', 'MakananController@update');
    Route::delete('makanan/{id}', 'MakananController@destroy');

    Route::get('ballroom', 'BallroomController@index');
    Route::get('ballroom/{id}', 'BallroomController@show');
    Route::post('ballroom', 'BallroomController@store');
    Route::put('ballroom/{id}', 'BallroomController@update');
    Route::delete('ballroom/{id}', 'BallroomController@destroy');

Route::get('email/verify/{id}', 'EmailController@verify')->name('verificationapi.verify');
Route::get('email/resend', 'EmailController@resend')->name('verificationapi.resend');