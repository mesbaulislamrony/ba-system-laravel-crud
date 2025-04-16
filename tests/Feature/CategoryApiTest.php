<?php

namespace Tests\Feature;

use App\Models\Category;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CategoryApiTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_can_create_category(): void
    {
        $response = $this->postJson('/api/categories', [
            'name' => 'Electronics',
        ]);
        if ($response->status() == 422) {
            $response->assertStatus(422);
        }
        $response->assertStatus(201);
    }

    public function test_can_get_categories(): void
    {
        $response = $this->getJson('/api/categories');
        $response->assertStatus(200);
    }

    public function test_can_get_category(): void
    {
        $category = Category::where('name', 'Electronics')->first();
        if (!$category) {
            $category->assertStatus(400);
        }
        $response = $this->getJson('/api/categories/' . $category->id);
        $response->assertStatus(200);
    }

    public function test_can_update_category(): void
    {
        $category = Category::where('name', 'Electronics')->first();
        if (!$category) {
            $category->assertStatus(400);
        }
        $response = $this->putJson('/api/categories/' . $category->id, [
            'name' => 'Food',
        ]);
        if ($response->status() == 422) {
            $response->assertStatus(422);
        }
        $response->assertStatus(201);
    }

    public function test_can_delete_category(): void
    {
        $category = Category::where('name', 'Food')->first();
        if (!$category) {
            $category->assertStatus(400);
        }
        $response = $this->deleteJson('/api/categories/' . $category->id);
        $response->assertStatus(201);
    }
}
