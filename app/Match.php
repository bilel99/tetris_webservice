<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Match extends Model
{

    protected $table = 'match';
    protected $fillable = ['id_users', 'id_room', 'score', 'final'];


    public function users(){
        return $this->belongsTo('App\Users');
    }

    public function room(){
        return $this->belongsTo('App\Room');
    }

    public function getCreateddateAttribute(){
        return date('d/m/Y H\Hi', date_timestamp_get(date_create($this->created_at)));
    }
}
