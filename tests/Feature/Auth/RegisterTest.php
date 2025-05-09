<?php

namespace Tests\Feature\Auth;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RegisterTest extends TestCase
{
    // public function test_user_can_register()
    // {
    //     $this->withoutMiddleware();

    //     $response = $this->postJson('/api/register', [
    //         'name' => 'John Doe',
    //         'email' => 'testuser@gmail.com',
    //         'password' => 'password',
    //         'password_confirmation' => 'password',
    //     ]);

    //     $response->assertStatus(200);
    //     $response->assertJson([
    //         'success' => true,
    //         'message' => 'User registered successfully.',
    //         'data' => [
    //             'token' => json_decode($response->getContent(), true)['data']['token'],
    //             'user' => [
    //                 'name' => json_decode($response->getContent(), true)['data']['user']['name'],
    //                 'email' => json_decode($response->getContent(), true)['data']['user']['email'],
    //                 'email_verified_at' => json_decode($response->getContent(), true)['data']['user']['email_verified_at'],
    //                 'created_at' => json_decode($response->getContent(), true)['data']['user']['created_at'],
    //                 'updated_at' => json_decode($response->getContent(), true)['data']['user']['updated_at'],
    //                 'id' => json_decode($response->getContent(), true)['data']['user']['id'],
    //             ],
    //         ],
    //     ]);
    //     $this->assertDatabaseHas('users', [
    //         'name' => 'John Doe',
    //         'email' => 'testuser@gmail.com',
    //     ]);
    // }

    // public function test_user_cannot_register_with_existing_email()
    // {
    //     $this->withoutMiddleware();

    //     User::factory()->create([
    //         'email' => 'testemail@gmail.com',
    //         'password' => bcrypt('password'),
    //     ]);
    //     $response = $this->postJson('/api/register', [
    //         'name' => 'John Doe',
    //         'email' => 'testemail@gmail.com',
    //         'password' => 'password',
    //         'password_confirmation' => 'password',
    //     ]);
    //     $response->assertStatus(422);
    //     $response->assertJson([
    //         'message' => 'The email has already been taken.',
    //         'errors' => [
    //             'email' => [
    //                 'The email has already been taken.',
    //             ],
    //         ],

    //     ]);
    //     $this->assertDatabaseMissing('users', [
    //         'name' => 'John Doe',
    //         'email' => 'testemail@gmail.com',
    //     ]);
    // }
}
