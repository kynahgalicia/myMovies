<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ActorMovieRoles extends Model
{
    public function setUpdatedAt($value)
    {
        return NULL;
    }

    public function setCreatedAt($value)
    {
        return NULL;
    }

    public function movies(){
        return $this->belongsTo('App\Movies','movies_id');
    }

    public function actors(){
        return $this->belongsTo('App\Actors','actors_id');
    }

    public function roles(){
        return $this->belongsTo('App\Roles','roles_id');
    }
}
