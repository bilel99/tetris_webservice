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
        if(!empty($where)) { return \App\User_Room::with('users', 'room')->whereRaw($where)->get(); }
        else{ return \App\User_Room::with('users', 'room')->get(); }
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

        $pseudoExist = \App\Users::where('pseudo', '=', $data['pseudo'])->count();
        if($pseudoExist >= 1){
            return response()->json('Votre pseudo est déjà utiliser sur cette partie, veuillez saisir un autre pseudo', 200);
        }else{
            \App\Users::create($data);
        }

        // Dérnier inscris
        $users = \App\Users::orderBy('id', 'desc')->limit(1)->get();

        /* Création d'une room */
        $userRoom = \App\User_Room::count();

        if($userRoom == 0 || $userRoom == 5 || $userRoom == 10
            || $userRoom == 15 || $userRoom == 20 || $userRoom == 25
            || $userRoom == 30 || $userRoom == 35 || $userRoom == 40
            || $userRoom == 45 || $userRoom == 50 || $userRoom == 55
            || $userRoom == 60 || $userRoom == 65 || $userRoom == 70
            || $userRoom == 75 || $userRoom == 80 || $userRoom == 85
            || $userRoom == 90 || $userRoom == 95 || $userRoom == 100) {
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
        $user_room->score;
        $user_room->gagner;
        $user_room->nbr_ligne;
        $user_room->save();


        return response()->json('Création du joueur avec succès', 200);
    }



    /**
     * @param $users
     * @return mixed
     */
    public function show($users){
        $showUsers = \App\User_Room::with('users', 'room')->where('id_users', '=', $users->id)->get();

        return $showUsers;
    }



    /**
     * @param $users
     */
    public function destroy($users){
        $users->delete();

        return response()->json('Users supprimé avec succès', 200);
    }





}
