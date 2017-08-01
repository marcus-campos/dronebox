<?php

use Illuminate\Http\Request;

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

Route::group(['prefix' => 'profile'], function () {

});

Route::group(['prefix' => 'image'], function () {
    Route::get('{id}');
    Route::post('/');
    Route::put('{id}');
    Route::delete('{id}');
});
