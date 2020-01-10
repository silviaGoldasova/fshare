<?php

namespace App;

//protected $table = 'users2';

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class User extends Model implements Authenticatable  {
    use \Illuminate\Auth\Authenticatable;

    public function offers(){
        return $this->hasMany('App\Offer');
    }

    public function interests(){
        return $this->hasMany('App\Interest');
    }

    public function saveds(){
        return $this->hasMany('App\Saved');
    }

}

