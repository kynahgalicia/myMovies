<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Roles extends Model
{
    protected $fillable = ['roles'];
    protected $primaryKey = 'roles_id';

    public function actormovieroles(){
        return $this->hasMany('App\ActorMovieRoles','roles_id');
    }
}
