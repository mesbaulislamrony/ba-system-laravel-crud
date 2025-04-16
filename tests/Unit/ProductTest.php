<?php

namespace Tests\Unit;

use App\Models\Product;
use App\Models\Category;
use PHPUnit\Framework\TestCase;

class ProductTest extends TestCase
{
    /**
     * A basic unit test example.
     */
    public function test_product_can_be_created_with_category(): void
    {
        $category = Category::create(['name' => 'Books']);
        $product = Product::create([
            'name' => 'Laravel Book',
            'price' => 29.99,
            'category_id' => $category->id
        ]);
        $this->assertTrue(true);
    }
}
