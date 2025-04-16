<?php

namespace Tests\Feature;

use App\Models\Category;
use App\Models\Product;
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
        $category = Category::create(['name' => 'Electronics']);
        $response = $this->postJson('/api/products', [
            'name' => 'Mobile Phones',
            'price' => rand(100, 999),
            'category_id' => $category->id
        ]);
        if ($response->status() == 422) {
            $response->assertStatus(422);
        }
        $response->assertStatus(201);
    }

    public function test_can_get_products(): void
    {
        $response = $this->getJson('/api/products');
        $response->assertStatus(200);
    }

    public function test_can_get_product(): void
    {
        $response = $this->getJson('/api/products/' . 1);
        $response->assertStatus(200);
    }

    public function test_can_update_product(): void
    {
        $category = Category::where('name', 'Electronics')->first();
        if (!$category) {
            $category->assertStatus(400);
        }

        $product = Product::where('name', 'Mobile Phones')->first();
        if (!$product) {
            $product->assertStatus(400);
        }
        $response = $this->putJson('/api/products/' . $product->id, [
            'name' => 'Potato',
            'price' => rand(100, 999),
            'category_id' => $category->id
        ]);
        if ($response->status() == 422) {
            $response->assertStatus(422);
        }
        $response->assertStatus(201);
    }

    public function test_can_delete_product(): void
    {
        $response = $this->getJson('/api/products/' . 1);
        if ($response->status() == 400) {
            $response->assertStatus(400);
        }
        $response = $this->deleteJson('/api/products/' . 1);
        $response->assertStatus(201);
    }
}
