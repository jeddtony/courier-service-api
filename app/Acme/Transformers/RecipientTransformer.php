<?php
/**
 * Created by PhpStorm.
 * User: jed
 * Date: 25/04/2019
 * Time: 2:57 PM
 */

namespace App\Acme\Transformers;


use App\Sender;

class RecipientTransformer extends Transformer
{

    public function transform($recipient){
        return   ['name' => $recipient['name'],
            'email' => $recipient['email'],
            'phone_no'=> $recipient['phone_no'],
            'address' => $recipient['address'],
            'sender_name' => $this->getSendersName($recipient['sender_id']),
        ];
    }

    private function getSendersName($id){
        return Sender::find($id)->name;
}
}