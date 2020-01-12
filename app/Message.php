<?php

namespace App;

use App\Offer;
use App\Conversation;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    public function conversation(){
        return $this->belongsTo('App\Conversation');
    }

}
