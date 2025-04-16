<?php

namespace Tests\Unit;

use App\Models\Product;
use App\Models\Category;
use Tests\TestCase;

class ProductTest extends TestCase
{
    /**
     * A basic unit test example.
     */
    public function test_product_can_be_created_with_category(): void
    {
        $category = Category::create(['name' => 'Books']);
        Product::create([
            'name' => 'Laravel Book',
            'price' => 29.99,
            'category_id' => $category->id
        ]);
        $this->assertDatabaseHas('products', [
            'name' => 'Laravel Book'
        ]);
    }
}
