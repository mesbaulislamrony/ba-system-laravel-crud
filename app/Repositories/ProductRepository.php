<?php

namespace App\Repositories;

use App\Exceptions\CustomException;

class ProductRepository
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public function all()
    {
        return \App\Models\Product::all();
    }

    public function find($id)
    {
        $product = \App\Models\Product::with('category')->find($id);
        if (empty($product)) {
            throw new CustomException("Product not found.", 400);
        }
        return $product;
    }

    public function create($data)
    {
        return \App\Models\Product::create($data);
    }

    public function update($id, $data)
    {
        $product = \App\Models\Product::find($id);
        if (empty($product)) {
            throw new CustomException("Product not found.", 400);
        }
        $product->update($data);
        return $product;
    }

    public function delete($id)
    {
        $product = \App\Models\Product::find($id);
        if (empty($product)) {
            throw new CustomException("Product not found.", 400);
        }
        $product->delete();
        return $product;
    }
}
