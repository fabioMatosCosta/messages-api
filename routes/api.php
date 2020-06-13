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

Route::prefix('v1')->group(function(){
    Route::get('/messages/{user}/allmessages', 'Api\v1\MessagesController@show');

    Route::get('/messages/{user}/info', 'Api\v1\UserController@show');
    
    Route::get('/messages/allusers', 'Api\v1\UserController@index');
    
    Route::post('/messages/{user}/send', 'Api\v1\MessagesController@store');
});
