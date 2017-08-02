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

/*
|--------------------------------------------------------------------------
| User Routes
|--------------------------------------------------------------------------
*/

$userController = 'UserController@';
Route::group(['prefix' => 'user'], function () use ($userController) {
    Route::post('signup', $userController.'signUp');
    Route::get('{id}', $userController.'getUser');

    Route::group(['prefix' => 'password'], function () use ($userController) {
        Route::put('update', $userController.'update');
        Route::put('reset', $userController.'reset');
    });
});

/*
|--------------------------------------------------------------------------
| Profile Routes
|--------------------------------------------------------------------------
*/

$profileController = "ProfileController@";
Route::group(['prefix' => 'profile'], function () use($profileController) {
    Route::get('{id}', $profileController.'getProfile');
    Route::put('update', $profileController.'update');
});

/*
|--------------------------------------------------------------------------
| Image Routes
|--------------------------------------------------------------------------
*/

Route::group(['prefix' => 'image'], function () {
    Route::get('{id}');
    Route::post('/');
    Route::put('{id}');
    Route::delete('{id}');
});
