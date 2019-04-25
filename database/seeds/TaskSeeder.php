<?php
use App\Delivery;
use App\Recipient;
use App\Sender;
use App\Token;
use App\User;
use Illuminate\Database\Seeder;

/**
 * Created by PhpStorm.
 * User: jed
 * Date: 25/04/2019
 * Time: 12:22 PM
 */
class TaskSeeder extends Seeder
{
    public  function run(){
        factory(User::class, 10)->create();
        factory(Sender::class, 10)->create();
        factory(Recipient::class, 10)->create();
        factory(Delivery::class, 10)->create();
        factory(Token::class, 10)->create();
    }
}