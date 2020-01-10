<?php

namespace App;
use App\Interest;
use Illuminate\Database\Eloquent\Model;


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
