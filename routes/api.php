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
Route::get('/getWords/{id}', 'IndexController@getWords');
Route::get('/getTexts/{id}', 'IndexController@getTexts');
Route::get('/getText/{id}', 'IndexController@getText');

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
