<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
/*
Route::get('/', function () {
    return view('welcome');
});
*/

    /************************************
     * WEBSERVICE TETRIS                *
     ***********************************/
    Route::group(['prefix' => 'ws', 'middleware' =>['ws']], function(){
        /************************ USERS *******************************/
        Route::resource('users', 'ws\UsersController');


        /************************ ROOM *******************************/
        Route::resource('room', 'ws\RoomController');
        Route::get('start', ['as' => 'room.start', 'uses' => 'Ws\RoomController@start']);


        /************************ MATCH *******************************/
        Route::resource('match', 'ws\MatchController');
        Route::get('classement', ['as' => 'match.classement', 'uses' => 'Ws\MatchController@classement']);
    });