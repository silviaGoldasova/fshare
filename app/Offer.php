<?php

namespace App;
use App\Interest;
use Illuminate\Database\Eloquent\Model;

/*
 * Model Offer
 * encompasses the following relations with the:
 * Model User (offer belongs to a user),
 * Model Interest (offer has many interests),
 * Model Saved (offer has many saved)
 *
 * properties of the Model Offer:
 *  - id (integer)
 *  - commodity (string)
 *  - body (string)
 *  - user_id (integer)
 *  - num_of_interested (integer)
 *  - timestamps (date)
 */

class Offer extends Model
{
    public function user(){
        return $this->belongsTo('App\User');
    }

    public function interests(){
        return $this->hasMany('App\Interest');
    }

    public function saveds(){
        return $this->hasMany('App\Saved');
    }

}
