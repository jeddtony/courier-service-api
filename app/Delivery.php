<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Delivery extends CustomModel
{
    //
    public function token(){
        return $this->hasOne('App\Token');
    }
}
