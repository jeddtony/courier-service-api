<?php
namespace App\Acme\Transformers;

/**
 * Created by PhpStorm.
 * User: jed
 * Date: 25/04/2019
 * Time: 2:19 PM
 */
class SenderTransformer extends Transformer
{
    public function transform($sender){
        return   ['name' => $sender['name'],
            'email' => $sender['email'],
            'phone_no'=> $sender['phone_no']
        ];


    }

}