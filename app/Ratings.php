<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ratings extends Model
{
    protected $fillable = ['rating','comment'];
    protected $primaryKey = 'ratings_id';

    public function movies(){
        return $this->belongsTo('App\Movies','movie_id');
    }

    public function users(){
        return $this->belongsTo('App\User','user_id');
    }
}
