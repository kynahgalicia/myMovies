<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Movies extends Model
{
    protected $fillable = ['title','year','plot','runtime'];
    protected $primaryKey = 'movies_id';
    use softDeletes;

    public function genres(){
        return $this->belongsTo('App\Genres','genres_id');
    }

    public function producers(){
        return $this->belongsTo('App\Producers','producers_id');
    }

}
