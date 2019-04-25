<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recipient extends CustomModel
{
    //
    public function sender(){
        return $this->belongsTo('App\Sender');
    }
}
