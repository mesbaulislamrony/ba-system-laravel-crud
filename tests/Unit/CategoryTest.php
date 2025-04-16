<?php

namespace Tests\Unit;

use App\Models\Category;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CategoryTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic unit test example.
     */
    public function test_category_can_be_created(): void
    {
        $category = Category::create(['name' => 'Tech']);

        $this->assertDatabaseHas('categories', [
            'name' => 'Tech'
        ]);

        $this->assertTrue(true);
    }
}
