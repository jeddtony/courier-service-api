<?php

use App\Delivery;
use App\Recipient;
use App\Sender;
use App\Token;
use Illuminate\Database\Seeder;
use Illuminate\Foundation\Auth\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         $this->call(TaskSeeder::class);

    }

}
