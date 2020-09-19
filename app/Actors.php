<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Actors extends Model
{
    protected $fillable = ['name','birthday','notes','images'];
    protected $primaryKey = 'actors_id';
    use SoftDeletes;

    public function actormovieroles(){
        return $this->hasMany('App\ActorMovieRoles','actors_id');
    }
}
