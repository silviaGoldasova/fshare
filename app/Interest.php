<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/*
 * Model Interest
 * encompasses the relations with the:
 * Model User (interest belongs to a user),
 * Model Offer (interest belongs to an offer)
 *
 * properties of the Model Interest:
 *  - id (integer)
 *  - user_id (integer)
 *  - offer_id (integer)
 *  - timestamps (date)
*/

class Interest extends Model
{
    public function user(){
        return $this->belongsTo('App\User');
    }

    public function offer(){
        return $this->belongsTo('App\Offer');
    }

}
