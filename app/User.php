<?php

namespace App;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

/*
 * Model User
 * encompasses the relations with the following models:
 * Model Offer (user has many offers)
 * Model Interest (user has many interests)
 * Model Saved (user has many saved)
 *
 * Model User has properties:
 *  - id (integer)
 *  - email (string)
 *  - name (string)
 *  - password (string)
 *  - rememberToken (string)
 */

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

