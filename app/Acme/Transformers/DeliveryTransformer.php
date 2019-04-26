<?php
/**
 * Created by PhpStorm.
 * User: jed
 * Date: 25/04/2019
 * Time: 3:58 PM
 */

namespace App\Acme\Transformers;


use App\Dispatcher;
use App\Recipient;
use App\Sender;
use App\User;

class DeliveryTransformer extends Transformer

{
    protected $senderTransformer;
    protected $recipientTransformer;

    function __construct(SenderTransformer $senderTransformer, RecipientTransformer $recipientTransformer)
    {
        $this->senderTransformer = $senderTransformer;
        $this->recipientTransformer =$recipientTransformer;
    }

    public function transform($delivery)
    {
        return   [
            'sender' => $this->senderTransformer->transform(Sender::find($delivery['sender_id'])),
            'recipient' => $this->recipientTransformer->transform(Recipient::find($delivery['recipient_id'])),
            'agent' => Dispatcher::find($delivery['dispatcher_id'])->name,
            'weight'=> (double)$delivery['weight'],
            'distance'=> (double)$delivery['distance'],
            'cost' => (double)$delivery['cost'],
            'delivery_status' => $delivery['status'],
        ];
    }


}