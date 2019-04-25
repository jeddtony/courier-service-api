<?php
/**
 * Created by PhpStorm.
 * User: jed
 * Date: 25/04/2019
 * Time: 3:34 PM
 */

namespace App\Acme\Transformers;


use App\Delivery;
use App\Token;

class TokenTransformer extends Transformer
{

    public function transform($token)
    {
        return   [
            'token' => $token['token'],
            'question' => $token['question'],
            'answer'=> $token['answer'],
            'delivery_status' => $this->getDelivery($token['delivery_id']),
        ];
    }

    private function getDelivery($id){
        return Delivery::find($id)->status;
        //TODO: Make this call the delivery transformer's transform method
    }
}