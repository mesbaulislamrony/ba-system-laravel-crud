<?php

namespace App\Repositories;

use App\Exceptions\CustomException;

class CategoryRepository
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
        return \App\Models\Category::all();
    }

    public function find($id)
    {
        $category = \App\Models\Category::find($id);
        if (empty($category)) {
            throw new CustomException("Category not found.", 400);
        }
        return $category;
    }

    public function create($data)
    {
        return \App\Models\Category::create($data);
    }

    public function update($id, $data)
    {
        $category = \App\Models\Category::find($id);
        if (empty($category)) {
            throw new CustomException("Category not found.", 400);
        }
        $category->update($data);
        return $category;
    }

    public function delete($id)
    {
        $category = \App\Models\Category::find($id);
        if (empty($category)) {
            throw new CustomException("Category not found.", 400);
        }
        $category->delete();
        return $category;
    }
}
