<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Books extends Model
{
    public $timestamps = false;

    public function reviews(){
        return $this->hasMany('App\Reviews');
    }
}
