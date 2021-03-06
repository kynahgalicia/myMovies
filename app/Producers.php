<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producers extends Model
{
    protected $fillable = ['name','birthday','notes'];
    protected $primaryKey = 'producers_id';

    public function movies(){
        return $this->hasMany('App\Movies');
    }
}
