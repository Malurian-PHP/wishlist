<?php

namespace Database\Seeders;

use App\Models\product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        product::create([
            'name' => 'Sample Product 1',
            'description' => 'A sample product description',
            'price' => 29.99,
        ]);

        Product::create([
            'name' => 'Sample Product 2',
            'description' => 'Another sample product',
            'price' => 49.99,
        ]);

        Product::factory()->count(10)->create(); // Create 10 random products using the factory
    }
}
