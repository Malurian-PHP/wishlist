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

    public function test_user_can_update_wishlist_item()
    {
        $this->withoutMiddleware();

        $user = \App\Models\User::factory()->create([
            'password' => bcrypt('password'),
            'email_verified_at' => now(),
        ]);

        $this->actingAs($user, 'api')->postJson('/api/wishlist', [
            'product_id' => 1,
        ]);

        $response = $this->actingAs($user, 'api')->postJson('/api/wishlist/', [
            'product_id' => 1,
        ]);

        $response->assertStatus(200);
        $response->assertJson([
            'success' => true,
            'data' => [
                'product_name' => json_decode($response->getContent(), true)['data']['product_name'],
                'quantity' => json_decode($response->getContent(), true)['data']['quantity'],
            ],
            'message' => 'Product already in wishlist. Quantity updated.',
        ]);
    }

    // public function test_user_can_view_wishlist()
    // {
    //     $this->withoutMiddleware();

    //     $user = \App\Models\User::factory()->create([
    //         'password' => bcrypt('password'),
    //         'email_verified_at' => now(),
    //     ]);

    //     $response = $this->actingAs($user, 'api')->getJson('/api/wishlist');

    //     $response->assertStatus(200);
    //     $response->assertJson([
    //         'success' => true,
    //         'message' => 'Wishlist retrieved successfully.',
    //     ]);
    // }

    // public function test_user_can_delete_wishlist_item()
    // {
    //     $this->withoutMiddleware();

    //     $user = \App\Models\User::factory()->create([
    //         'password' => bcrypt('password'),
    //         'email_verified_at' => now(),
    //     ]);

    //     $wishlistItem = \App\Models\Wishlist::factory()->create([
    //         'user_id' => $user->id,
    //         'product_id' => 1,
    //         'quantity' => 1,
    //         'note' => 'Test note',
    //     ]);

    //     $response = $this->actingAs($user, 'api')->deleteJson('/api/wishlist/' . $wishlistItem->id);

    //     $response->assertStatus(200);
    //     $response->assertJson([
    //         'success' => true,
    //         'message' => 'Wishlist item deleted successfully.',
    //     ]);
    // }

    // public function test_user_cannot_add_product_to_wishlist_without_authentication()
    // {
    //     $this->withoutMiddleware();

    //     $response = $this->postJson('/api/wishlist', [
    //         'product_id' => 1,
    //         'quantity' => 1,
    //         'note' => 'Test note',
    //     ]);

    //     $response->assertStatus(401);
    //     $response->assertJson([
    //         'success' => false,
    //         'message' => 'Unauthenticated.',
    //     ]);
    // }

    // public function test_user_cannot_update_wishlist_item_without_authentication()
    // {
    //     $this->withoutMiddleware();

    //     $response = $this->putJson('/api/wishlist/1', [
    //         'quantity' => 2,
    //         'note' => 'Updated note',
    //     ]);

    //     $response->assertStatus(401);
    //     $response->assertJson([
    //         'success' => false,
    //         'message' => 'Unauthenticated.',
    //     ]);
    // }

    // public function test_user_cannot_delete_wishlist_item_without_authentication()
    // {
    //     $this->withoutMiddleware();

    //     $response = $this->deleteJson('/api/wishlist/1');

    //     $response->assertStatus(401);
    //     $response->assertJson([
    //         'success' => false,
    //         'message' => 'Unauthenticated.',
    //     ]);
    // }

    // public function test_user_cannot_view_wishlist_without_authentication()
    // {
    //     $this->withoutMiddleware();

    //     $response = $this->getJson('/api/wishlist');

    //     $response->assertStatus(401);
    //     $response->assertJson([
    //         'success' => false,
    //         'message' => 'Unauthenticated.',
    //     ]);
    // }

    // public function test_user_cannot_add_product_to_wishlist_with_invalid_product_id()
    // {
    //     $this->withoutMiddleware();

    //     $user = \App\Models\User::factory()->create([
    //         'password' => bcrypt('password'),
    //         'email_verified_at' => now(),
    //     ]);

    //     $response = $this->actingAs($user, 'api')->postJson('/api/wishlist', [
    //         'product_id' => 9999, // Assuming this product ID does not exist
    //         'quantity' => 1,
    //         'note' => 'Test note',
    //     ]);

    //     $response->assertStatus(422);
    //     $response->assertJson([
    //         'success' => false,
    //         'message' => 'The selected product id is invalid.',
    //     ]);
    // }
}
