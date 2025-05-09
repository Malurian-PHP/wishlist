<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class WishlistTest extends TestCase
{
    public function test_user_can_add_product_to_wishlist()
    {
        $this->withoutMiddleware();

        $user = \App\Models\User::factory()->create([
            'password' => bcrypt('password'),
            'email_verified_at' => now(),
        ]);

        $response = $this->actingAs($user, 'api')->postJson('/api/wishlist', [
            'product_id' => 1,
            'quantity' => 1,
            'note' => 'Test note',
        ]);

        $response->assertStatus(200);
        $response->assertJson([
            'success' => true,
            'message' => 'Product added to wishlist successfully.',
        ]);
    }

    public function test_user_has_no_products_in_wishlist()
    {
        $this->withoutMiddleware();

        $user = \App\Models\User::factory()->create([
            'password' => bcrypt('password'),
            'email_verified_at' => now(),
        ]);

        $response = $this->actingAs($user, 'api')->getJson('/api/wishlist');

        $response->assertStatus(404);
        $response->assertJson([
            'success' => false,
            'message' => 'No products in wishlist.',
        ]);
    }
}
