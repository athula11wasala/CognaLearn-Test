<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;

class UserTest extends TestCase
{
    /**
     * test user can authenticate.
     *
     * @return void
     */
    public function test_users_can_authenticate()
    {
        $user = User::factory()->create();

        $response = $this->post('/api/login', [
            'email' =>$user->email,
            'password' => 123456
         
        ])
        ->dump()
        ->assertStatus(201);
   
    }

    /**
     * test user can not authenticate.
     *
     * @return void
     */
    public function test_users_can__not_authenticate()
    {
        $user = User::factory()->create();

        $response = $this->post('/api/login', [
            'email' =>$user->email,
            'password' => 'wrong password'
         
        ])
        ->dump()
        ->assertStatus(422);
   
    }
}

