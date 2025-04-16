<?php

namespace Tests\Feature;

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
        $response->assertStatus(201);
    }

    public function test_can_get_categories(): void
    {
        $response = $this->getJson('/api/categories');
        $response->assertStatus(200);
    }

    public function test_can_get_category(): void
    {
        $response = $this->getJson('/api/categories/1');
        $response->assertStatus(200);
    }

    public function test_can_update_category(): void
    {
        $response = $this->putJson('/api/categories/1', [
            'name' => 'Food',
        ]);
        $response->assertStatus(201);
    }

    public function test_can_delete_category(): void
    {
        $response = $this->deleteJson('/api/categories/1');
        $response->assertStatus(201);
    }
}
