<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


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

Route::prefix('auth')->group(function () {
    Route::post('login', 'LoginController@login')->name('sanctum.login');
    Route::post('register', 'RegisterController@register')->name('sanctum.register');
});

Route::name('projects.')->prefix('projects')->group(function () {
    Route::get('/', 'ProjectController@index')->name('index');
    Route::get('{project}', 'ProjectController@show')->name('show');
    Route::get('{project}/qrcode', 'ProjectController@qrcode')->name('qrcode');
});

Route::get('settings', 'SettingsController@index')->name('settings.index');