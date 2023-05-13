<?php

namespace Tests\Feature;

use App\Models\Product;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProductControllerTest extends TestCase
{
    use RefreshDatabase;

    public function testGetProducts()
    {
        // Create test products
        Product::factory()->count(10)->create();

        // Send GET request to /products
        $response = $this->get('/api/products');

        // Assert HTTP status code
        $response->assertStatus(200);

        // Assert response structure
        $response->assertJsonStructure([
            'success',
            'data' => [
                '*' => [
                    'sku',
                    'name',
                    'category',
                    'price' => [
                        'original',
                        'final',
                        'discount_percentage',
                        'currency',
                    ],
                ],
            ],
        ]);
    }
}
