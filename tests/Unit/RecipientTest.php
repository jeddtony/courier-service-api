<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RecipientTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->assertTrue(true);
    }

    /**
     * @test
     */
    public function a_sender_has_a_recipient(){
        $recipient = factory('App\Recipient')->make();
        return $this->assertInstanceOf('App\Sender', $recipient->sender);
    }
}
