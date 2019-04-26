<?php

use App\Delivery;
use App\Dispatcher;
use App\Recipient;
use App\Sender;
use App\Token;
use App\User;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'remember_token' => Str::random(10),
    ];
});

$factory->define(Sender::class, function (Faker $faker){
    return[
        'name' => $faker->name,
        'email' => $faker->safeEmail,
        'phone_no' => $faker->phoneNumber,
    ];
});

$factory->define(Dispatcher::class, function (Faker $faker){
    return[
        'name' => $faker->name,
        'email' => $faker->safeEmail,
        'phone_no' => $faker->phoneNumber,
    ];
});
$factory->define(Recipient::class, function (Faker $faker){
    return[
        'name' => $faker->name,
        'email' => $faker->safeEmail,
        'phone_no' => $faker->phoneNumber,
        'address' => $faker->streetAddress,
        'sender_id' => Sender::all()->random()->id,
    ];
});

$factory->define(Delivery::class, function (Faker $faker){
    return[
        'sender_id' => Sender::all()->random()->id,
        'recipient_id' => Recipient::all()->random()->id,
        'dispatcher_id' => Dispatcher::all()->random()->id,
        'weight' => rand(5, 50),
        'distance' => rand(3, 100),
        'cost' => rand(100, 1000),
        'status' => function(){
            $array = ['processing', 'on transit', 'delivered', 'collected'];
            return $array[rand(0,3)];
        },
    ];
});

$factory->define(Token::class, function (Faker $faker){
    return[
        'token' => $faker->word,
        'delivery_id' => Delivery::all()->random()->id,
        'question' => $faker->sentence,
        'answer' => $faker->sentence,

    ];
});