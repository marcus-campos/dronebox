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
    //GET
    Route::get('{id}', $profileController.'getProfileById');
    Route::get('slug/{slug}', $profileController.'getProfileBySlug');

    //POST

    //PUT
    Route::put('update', $profileController.'update');
});


/*
|--------------------------------------------------------------------------
| Post Routes
|--------------------------------------------------------------------------
*/

$postController = "PostController@";
Route::group(['prefix' => 'post'], function () use($postController) {
    //GET
    Route::get('{id}', $postController.'getPost');
    Route::get('profile/{id}', $postController.'getProfilePosts');

    //POST

    //PUT
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
