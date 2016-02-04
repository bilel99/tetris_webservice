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

/********************************* API FRONT *********************************/
Route::get('/', ['as' => 'home', 'uses' => 'Front\Api_homeController@index']);
Route::get('api_users', ['as' => 'api_users', 'uses' => 'Front\Api_usersController@index']);
Route::get('api_room', ['as' => 'api_room', 'uses' => 'Front\Api_roomController@index']);
Route::get('api_user_room', ['as' => 'api_user_room', 'uses' => 'Front\Api_user_roomController@index']);




    /************************************
     * WEBSERVICE TETRIS                *
     ***********************************/
    Route::group(['prefix' => 'ws', 'middleware' =>['ws']], function(){
        /************************ USERS *******************************/
        Route::resource('users', 'ws\UsersController');



        /************************ ROOM *******************************/
        Route::resource('room', 'ws\RoomController');




        /************************ USER_ROOM *******************************/
        Route::get('classement', ['as' => 'user_room.classement', 'uses' => 'Ws\User_RoomController@classement']);
        Route::get('quiAgagner', ['as' => 'user_room.quiAgagner', 'uses' => 'Ws\User_RoomController@quiAgagner']);
        Route::get('quiAperdu', ['as' => 'user_room.quiAperdu', 'uses' => 'Ws\User_RoomController@quiAperdu']);


        Route::get('start/{users}/{room}', ['as' => 'user_room.start', 'uses' => 'Ws\User_RoomController@start']);

        Route::put('nbr_line/{users}/{room}', ['as' => 'user_room.nbr_line', 'uses' => 'Ws\User_RoomController@nbr_line']);
        Route::put('restaureCompteur/{room}', ['as' => 'user_room.restaureCompteur', 'uses' => 'Ws\User_RoomController@restaureCompteur']);


        Route::put('gagner/{user_room}', ['as' => 'user_room.gagner', 'uses' => 'Ws\User_RoomController@gagner']);
        Route::put('perdu/{user_room}', ['as' => 'user_room.perdu', 'uses' => 'Ws\User_RoomController@perdu']);
        Route::put('score/{user_room}', ['as' => 'user_room.score', 'uses' => 'Ws\User_RoomController@score']);

        Route::resource('user_room', 'ws\User_RoomController');

    });