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

Route::middleware('auth:api')->group(function (){

    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    Route::get('/messages/public', 'MessageController@getPublicMessages');
    Route::post('/messages/public', 'MessageController@storePublicMessage');

});


// routes for nativescript app
Route::get('/jobs', 'JobPositionController@index');
Route::get('/jobs/{id}', 'JobPositionController@show');

Route::post('/surveys', 'SurveyController@store');
Route::post('/surveys/stats', 'SurveyController@statistics');

