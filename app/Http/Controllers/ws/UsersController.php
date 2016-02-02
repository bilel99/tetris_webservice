<?php namespace App\Http\Controllers\Ws;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Users;
use Illuminate\Http\Request;

class UsersController extends Controller {

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
        if(!empty($where)) { return \App\Users::whereRaw($where)->get(); }
        else{ return \App\Users::get(); }
    }



    /**
     * GHet user by ID
     *
     * @return Response
     */
    public function store()
    {
        /**
         * Création d'un utilisateurs + Création d'une room si pas de room ou alors complet
         */

        // Remplissage des data, pour l'insertion
        $data = \Input::get('data');
        \App\Users::create($data);

        // Dérnier inscris
        $users = \App\Users::orderBy('id', 'desc')->limit(1)->get();

        /* Création d'une room */
        $userRoom = \App\User_Room::count();

        if($userRoom == 0 || $userRoom == 5 || $userRoom == 10
            || $userRoom == 15 || $userRoom == 20 || $userRoom == 25
            || $userRoom == 30 || $userRoom == 35 || $userRoom == 40
            || $userRoom == 45 || $userRoom == 50 || $userRoom == 55) {
            $room = new \App\Room;
            $room->status = 1;
            $room->save();
        }

        // dérniere Room
        $showRoom = \App\Room::orderBy('id', 'desc')->limit(1)->get();

        /* Création des users sur une room */
        $user_room = new \App\User_Room;
        $user_room->id_users = $users[0]->id;
        $user_room->id_room = $showRoom[0]->id;
        $user_room->save();


    }



    /**
     * @param $users
     * @return mixed
     */
    public function show($users){
        return $users;
    }



    /**
     * @param $users
     */
    public function destroy($users){
        $users->delete();
    }





}
