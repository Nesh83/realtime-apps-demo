<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Auth::routes();

Route::get('/', function () {
    return view('slider');
});

Route::get('/chat', function (){
    return view('chat');
})->middleware('auth')->name('presentation');

Route::get('/users/{id}/chat', 'MessageController@chatWith');
