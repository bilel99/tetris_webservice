<?php namespace App\Http\Controllers\Ws;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Users;
use Illuminate\Http\Request;

class MatchController extends Controller {

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
        if(!empty($where)) { return \App\Match::whereRaw($where)->get(); }
        else{ return \App\Match::get(); }
    }



    /**
     * GHet user by ID
     *
     * @return Response
     */
    public function store()
    {
        $data = \Input::get('data');
        \App\Match::create($data);
    }



    /**
     * @param $users
     * @return mixed
     */
    public function show($match){
        return $match;
    }



    /**
     * @param $match
     */
    public function line($match){
        /**
         * Si un joueur perd une ligne, ses adversaire gagne une ligne
         */

    }




    /**
     * Classement des utilisateurs
     */
    public function classement(){
        $classement = \App\Match::orderBy('score', 'desc')->get();
        return $classement;
    }


}
