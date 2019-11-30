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

Route::get('users','UserController@index');
Route::get('users/{id}','UserController@show');
Route::post('users','UserController@store');
Route::put('users/{id}','UserController@update');
Route::delete('users/{id}','UserController@destroy');
