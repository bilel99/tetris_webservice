<?php namespace App\Http\Controllers\Ws;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Users;
use Illuminate\Http\Request;

class User_RoomController extends Controller {

    /**
     * GHet user by ID
     *
     *	params where string
     *
     * @return Response
     */
    public function index()
    {
        $where = \Input::get('where');
        if(!empty($where)) { return \App\User_Room::whereRaw($where)->get(); }
        else{ return \App\User_Room::get(); }
    }



    /**
     * GHet user by ID
     *
     * @return Response
     */
    public function store()
    {
    }



    /**
     * @param $users
     * @return mixed
     */
    public function show($user_room){
        return $user_room;
    }



    /**
     * @param $room
     * Suppression User_Room quand un joueur à fini de jouer afin de libérer une room
     */
    public function destroy($user_room){
        $user_room->delete();
    }



}
