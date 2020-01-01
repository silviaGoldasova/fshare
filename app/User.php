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
}

