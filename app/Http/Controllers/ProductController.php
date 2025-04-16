<?php

namespace App\Http\Controllers;

use App\Http\Requests\Product\StoreRequest;
use App\Http\Requests\Product\UpdaetRequest;
use Illuminate\Http\Request;
use App\Repositories\ProductRepository;

class ProductController extends Controller
{
    public $repository;

    public function __construct(ProductRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index()
    {
        $data['data'] = $this->repository->all();
        return response()->json($data);
    }

    public function show($id)
    {
        $data['data'] = $this->repository->find($id);
        return response()->json($data);
    }

    public function store(StoreRequest $request)
    {
        $validated = $request->validated();
        $product = $this->repository->create($validated);
        return response()->json(['message' => __('Saved successfully'), 'id' => $product->id], 201);
    }

    public function update(UpdaetRequest $request, $id)
    {
        $validated = $request->validated();
        $product = $this->repository->update($id, $validated);
        return response()->json(['message' => __('Saved successfully'), 'id' => $product->id], 201);
    }

    public function destroy($id)
    {
        $this->repository->delete($id);
        return response()->json(['message' => __('Deleted successfully'), 'id' => $id], 201);
    }
}
