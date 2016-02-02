<?php namespace App\Http\Controllers\Ws;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Users;
use Illuminate\Http\Request;

class RoomController extends Controller {

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
        if(!empty($where)) { return \App\Room::whereRaw($where)->get(); }
        else{ return \App\Room::get(); }
    }



    /**
     * GHet user by ID
     *
     * @return Response
     */
    public function store()
    {
        /**
         * Création d'une room simple, Ajout d'un users_room automatiquement, voir controller users méthod store
         */

        // Remplissage des data, pour l'insertion
        $data = \Input::get('data');
        \App\Room::create($data);
    }



    /**
     * @param $users
     * @return mixed
     */
    public function show($room){
        return $room;
    }


    /**
     * @param $room, partie terminer, mise en arrêt de la room.
     */
    public function update($room){
        $room->status = 0;
        $room->save();

        return response()->json('Room Inactif', 200);
    }



    /**
     * Recherche adversaire
     */
    public function start(){
        $searchUsers = \App\User_Room::groupBy('id_room')->orderBy('id', 'desc')->limit(1)->count();

        if($searchUsers == 0){
            return response()->json('Erreur Aucun adversaire pour le moment, repassez plus tard :-)', 200);
        }else{
            $adversaire = \App\User_Room::with('users', 'room')->orderBy('id', 'desc')->get();
            return $adversaire;
        }
    }



    /**
     * @param $room
     * Suppression room seulement en cas de besoin
     */
    public function destroy($room){
        $room->delete();
    }



}
