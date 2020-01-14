<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/*
 * Model Saved
 * encompasses the relations with the following models:
 * Model User (saved belongs to a user)
 * Model Offer (saved belongs to an offer)
 *
 * Model Saved has properties:
 *  - id (integer)
 *  - timestamps (date)
 *  - user_id (integer)
 *  - offer_id (integer)
*/

class Saved extends Model
{
    public function user(){
        return $this->belongsTo('App\User');
    }

    public function offer(){
        return $this->belongsTo('App\Offer');
    }

}
