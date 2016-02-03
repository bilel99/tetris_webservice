<?php namespace App\Http\Controllers\Ws;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Users;
use Illuminate\Http\Request;

/**
 * Class User_RoomController
 * @package App\Http\Controllers\Ws
 */

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
        if(!empty($where)) { return \App\User_Room::with('users', 'room')->whereRaw($where)->get(); }
        else{ return \App\User_Room::with('users', 'room')->get(); }
    }


    /**
     * @param $user_room
     * Gagner PUT
     */
    public function gagner($user_room){
        $user_room->gagner = 1;
        $user_room->save();

        return response()->json('Nous avons un vainqueur', 200);
    }


    /**
     * @param $user_room
     * Perdu PUT
     */
    public function perdu($user_room){
        $user_room->gagner = 0;
        $user_room->save();

        return response()->json('Vous ferrai mieu la prochaine fois', 200);
    }


    /**
     * @param $user_room
     * Score Data PUT
     */
    public function score($user_room){
        // Remplissage des data, pour l'insertion
        $data = \Input::get('data');
        $user_room->save($data);

        return response()->json('Score mis à jour avec succès', 200);
    }


    /**
     * @param $users
     * @param $room
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function nbr_line($users, $room){
        /**
         * Appel de cette méthod pour enlever une ligne à l'utilisateur,
         * Systématiquement ajouter une ligne au autre adversaire
         *
         * #######
         * Créer un compteur nbr_ligne à 0, si un utilisateurs retire une ligne incrémenter de +1 le compteur
         * pour les adversaire et renvoyer au client +1 après envoie au client, remettre les compteur à 0 etc...
         */
        $user_room2 = \App\User_Room::with('users', 'room')->where('id_room', '=', $room->id)->where('id_users', '!=', $users->id)->get();
        foreach($user_room2 as $u) {
            $u->nbr_ligne = 1;
            $u->save();
        }


        // Envoie au client des donnée
        $call = \App\User_Room::with('users', 'room')->where('id_room', '=', $room->id)->where('nbr_ligne', '!=', '0')->get();
        response()->json('Nouvelle mise à jour du nombre de ligne', 200);
        return $call;
    }


    /**
     * @param $room
     * @return \Illuminate\Http\JsonResponse
     */
    public function restaureCompteur($room){
        // Remise à 0 du compteur
        $init = 0;

        $user_room2 = \App\User_Room::with('users', 'room')->where('id_room', '=', $room->id)->get();
        foreach($user_room2 as $u){
            if($u->id_room == $room->id){
                $u->nbr_ligne = $init;
                $u->save();
            }
        }

        return response()->json('Remise à zero des compteur efféctuer avec succès', 200);
    }



    /**
     * @param $users
     * @return mixed
     */
    public function show($user_room){
        $showUser_room = \App\User_Room::with('users', 'room')->where('id', '=', $user_room->id)->get();
        return $showUser_room;
    }


    /**
     * Qui a Gagner
     */
    public function quiAgagner(){
        $quiAgagner = \App\User_Room::with('users', 'room')->where('gagner', '=', '1')->get();
        response()->json('Félicitation vous avez gagner', 200);
        return $quiAgagner;
    }


    /**
     * Qui a perdu
     */
    public function quiAperdu(){
        $quiAperdu = \App\User_Room::with('users', 'room')->where('gagner', '=', '0')->get();
        response()->json('Game Over', 200);
        return $quiAperdu;
    }



    /**
     * Classement des utilisateurs
     */
    public function classement(){
        $classement = \App\User_Room::orderBy('score', 'desc')->get();
        return $classement;
    }


    /**
     * @param $users
     * @param $room
     * @return \Illuminate\Database\Eloquent\Collection|\Illuminate\Http\JsonResponse|static[]
     */
    public function start($users, $room){
        // Ligne de la room
        $roomAdv = \App\User_Room::with('users', 'room')->where('id_room', '=', $room->id)->count();

        if($roomAdv == 0 || $roomAdv == 1){
            return response()->json('Aucun adversaire pour le moment', 200);
        }else if($roomAdv == 3 || $roomAdv == 4 || $roomAdv == 5){
            $roomInfo = \App\User_Room::with('users', 'room')->where('id_users', '!=', $users->id)->get();
            response()->json('La partie peux maintenant commencé', 200);
            return $roomInfo;
        }else{
            return response()->json('un problème est survenu avec le serveur', 500);
        }
    }



}
