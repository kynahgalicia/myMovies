<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ratings extends Model
{
    protected $fillable = ['rating','comment'];
    protected $primaryKey = 'ratings_id';

    public function movies(){
        return $this->belongsto('App\Movies','movies_id');
    }

    public function user(){
        return $this->belongsTo('App\User','id');
    }
}
