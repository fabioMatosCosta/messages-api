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

Route::prefix('v1')->group(function(){ // Grouped all routes with a v1 prefix so future versions of the API don't break the applications still using the v1

    Route::get('/messages/{user}/allmessages', 'Api\v1\MessagesController@show'); //gets all user messages, {user} is the user id parameter, I assumed the authentication is validated and the user id is accessible

    Route::get('/messages/{user}/info', 'Api\v1\UserController@show'); //gets the user info, for a profile for example, {user} parameter is the same as before
    
    Route::get('/messages/allusers', 'Api\v1\UserController@index'); // gets all users info in the database, can be used for autocomplete when sending messages
    
    Route::post('/messages/{user}/send', 'Api\v1\MessagesController@store'); //posts a new message in the database, {user} parameter is the same as before

    Route::delete('/messages/delete/{message}', 'Api\v1\MessagesController@destroy');
});
