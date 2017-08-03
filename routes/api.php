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
| Constants
|--------------------------------------------------------------------------
*/

const USER_CONTROLLER = 'UserController@';
const PROFILE_CONTROLLER = "ProfileController@";
const POST_CONTROLLER = "PostController@";
const FOLLOWER_CONTROLLER = "FollowerController@";

/*
|--------------------------------------------------------------------------
| User Routes
|--------------------------------------------------------------------------
*/

Route::group(['prefix' => 'user'], function () {
    Route::post('signup', USER_CONTROLLER.'signUp');
    Route::get('{id}', USER_CONTROLLER.'user');

    Route::group(['prefix' => 'password'], function () {
        Route::put('update', USER_CONTROLLER.'update');
        Route::put('reset', USER_CONTROLLER.'reset');
    });
});

/*
|--------------------------------------------------------------------------
| Profile Routes
|--------------------------------------------------------------------------
*/

Route::group(['prefix' => 'profile'], function () {
    //GET
    Route::get('{id}', PROFILE_CONTROLLER.'profileById');
    Route::get('slug/{slug}', PROFILE_CONTROLLER.'profileBySlug');
    Route::get('search/{search}', PROFILE_CONTROLLER.'search');

    //POST

    //PUT
    Route::put('update', PROFILE_CONTROLLER.'update');
});


/*
|--------------------------------------------------------------------------
| Post Routes
|--------------------------------------------------------------------------
*/

Route::group(['prefix' => 'post'], function () {
    //GET
    Route::get('{id}', POST_CONTROLLER.'post');
    Route::get('profile/{id}', POST_CONTROLLER.'profilePosts');
    //POST
    Route::post('/', POST_CONTROLLER.'store');
    //PUT
    Route::put('/', POST_CONTROLLER.'update');
    //DELETE
    Route::delete('{id}', POST_CONTROLLER.'delete');
});

/*
|--------------------------------------------------------------------------
| Follower Routes
|--------------------------------------------------------------------------
*/

Route::group(['prefix' => 'follow'], function () {
    //GET
    Route::group(['prefix' => 'profile'], function () {
        Route::get('{id}/followers', FOLLOWER_CONTROLLER.'followers');
        Route::get('{id}/following', FOLLOWER_CONTROLLER.'following');
    });

    //POST
    Route::post('/', FOLLOWER_CONTROLLER.'store');
    //DELETE
    Route::delete('{id}', FOLLOWER_CONTROLLER.'delete');
});