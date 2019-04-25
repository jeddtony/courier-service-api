<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Token extends CustomModel
{
    //
    public function delivery(){
        return $this->belongsTo('App\Delivery');
    }
}
