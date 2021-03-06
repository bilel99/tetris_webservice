<?php namespace App\Http\Controllers\Ws;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Users;
use Illuminate\Http\Request;


/**
 * Class RoomController
 * @package App\Http\Controllers\Ws
 *
 * Une fois la partie fini, supprimer les room dans la table room
 * Une fois la partie fini, supprimer les users dans la table users_room
 */

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

        return response()->json('Création de la room avec succès', 200);
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
     * @param $room
     * Suppression room + Joueur de la partie à executer à la fin après affichage du classement de la partie
     */
    public function destroy($room){
        $room->delete();

        return response()->json('Room supprimé avec succès', 200);
    }



}
