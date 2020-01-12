<?php

namespace App;

use App\Message;
use Illuminate\Database\Eloquent\Model;

class Conversation extends Model
{
    public function messages(){
        return $this->hasMany('App\Message');
    }



}
