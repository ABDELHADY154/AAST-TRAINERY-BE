<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;

use Tests\TestCase;
use Response;

class UserRegisterTest extends TestCase
{
    use DatabaseMigrations;

    public function testBasicExample()
    {

        $response = $this->postJson(
            '/api/login',
            [
                'email' => 'hady@hady.com',
                'password' => '123123123'
            ]
        );
        $response
        ->assertStatus(201)
        ->assertJson([
            'created' => true,
        ]);
    }
}
