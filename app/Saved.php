<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Saved extends Model
{
    public function user(){
        return $this->belongsTo('App\User');
    }

    public function offer(){
        return $this->belongsTo('App\Offer');
    }

}
