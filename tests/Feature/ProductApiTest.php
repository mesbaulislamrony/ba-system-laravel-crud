<?php

namespace Tests\Feature;

use App\Models\Category;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProductApiTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_can_create_product(): void
    {
        $response = $this->postJson('/api/products', [
            'name' => 'Mobile Phones',
            'price' => rand(100, 999),
            'category_id' => 1
        ]);
        $response->assertStatus(201);
    }

    public function test_can_get_products(): void
    {
        $response = $this->getJson('/api/products');
        $response->assertStatus(200);
    }

    public function test_can_get_product(): void
    {
        $response = $this->getJson('/api/products/1');
        $response->assertStatus(200);
    }

    public function test_can_update_product(): void
    {
        $response = $this->putJson('/api/products/1', [
            'name' => 'Potato',
            'price' => rand(100, 999),
            'category_id' => 1
        ]);
        $response->assertStatus(201);
    }

    public function test_can_delete_product(): void
    {
        $response = $this->deleteJson('/api/products/1');
        $response->assertStatus(201);
    }
}
