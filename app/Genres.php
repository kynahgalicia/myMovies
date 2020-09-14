<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Genres extends Model
{
    protected $fillable = ['genre'];
    protected $primaryKey = 'genres_id';

    public function movies(){
        return $this->hasMany('App\Movies');
    }
}
