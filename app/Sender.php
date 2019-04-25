<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sender extends CustomModel
{
    //
    public function recipients()
    {
        return $this->hasMany('App\Recipient');
    }

    public function deliveries(){
        return $this->hasMany('App\Delivery');
    }

    public function tokens(){
        return $this->hasMany('App\Token');
    }
}
