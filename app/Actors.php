<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Actors extends Model
{
    protected $fillable = ['name','birthday','notes'];
    use SoftDeletes;
}
