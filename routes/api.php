<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Route
|--------------------------------------------------------------------------
|
| Here is where you can register API Route for your application. These
| Route are loaded by the RouteerviceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//Users
Route::middleware('auth')->group(function () {
    //Route::get('home','UserController@profile')->name('showProfile');
    Route::put('home','UserController@updateProfile')->name('user.update');
    
});
Route::get('users','UserController@index');
Route::get('users/{id}','UserController@show');
Route::post('users','UserController@store');
Route::put('users/{id}','UserController@update')->name('users.update');
Route::delete('users/{id}','UserController@destroy');
