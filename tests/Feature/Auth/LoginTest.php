<?php

namespace Tests\Feature\Auth;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LoginTest extends TestCase
{
    // public function test_user_can_login()
    // {
    //     $this->withoutMiddleware();

    //     $user = User::factory()->create([
    //         'password' => bcrypt('password'),
    //         'email_verified_at' => now(),
    //     ]);

    //     $response = $this->postJson('/api/login', [
    //         'email' => $user->email,
    //         'password' => 'password',
    //     ]);

    //     $response->assertStatus(200);
    //     $response->assertJson([
    //         'success' => true,
    //         'data' => [
    //             'user' => [
    //                 'id' => $user->id,
    //                 'name' => $user->name,
    //                 'email' => $user->email,
    //             ],
    //             'token' => true,
    //         ],
    //     ]);
    //     $this->assertAuthenticatedAs($user);
    // }

    // public function test_user_cannot_login_with_invalid_credentials()
    // {
    //     $this->withoutMiddleware();

    //     $user = User::factory()->create([
    //         'password' => bcrypt('password'),
    //         'email_verified_at' => now(),
    //     ]);

    //     $response = $this->postJson('/api/login', [
    //         'email' => $user->email,
    //         'password' => 'wrong-password',
    //     ]);

    //     $response->assertStatus(401);
    //     $response->assertJson([
    //         'success' => false,
    //         'message' => 'Unauthorized',
    //         'data' => [
    //             'error' => 'Password mismatch.',
    //         ],
    //     ]);
    // }

    // public function test_user_cannot_login_with_unverified_email()
    // {
    //     $this->withoutMiddleware();

    //     $user = User::factory()->create([
    //         'password' => bcrypt('password'),
    //         'email_verified_at' => null,
    //     ]);

    //     $response = $this->postJson('/api/login', [
    //         'email' => $user->email,
    //         'password' => 'password',
    //     ]);

    //     $response->assertStatus(422);
    //     $response->assertJson([
    //         'success' => false,
    //         'message' => 'Unauthorized',
    //         'data' => [
    //             'error' => 'Please verify your email.',
    //         ]
    //     ]);
    // }
}
