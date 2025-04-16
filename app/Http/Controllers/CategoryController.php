<?php

namespace App\Http\Controllers;

use App\Http\Requests\Category\StoreRequest;
use App\Http\Requests\Category\UpdaetRequest;
use App\Repositories\CategoryRepository;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public $repository;

    public function __construct(CategoryRepository $repository)
    {
        $this->repository = $repository;
    }


    public function index()
    {
        $data['data'] = $this->repository->all();
        return response()->json($data);
    }

    public function store(StoreRequest $request)
    {
        $validated = $request->validated();
        $category = $this->repository->create($validated);
        return response()->json(['message' => __('Saved successfully'), 'id' => $category->id], 201);
    }

    public function update(UpdaetRequest $request, $id)
    {
        $validated = $request->validated();
        $this->repository->update($id, $validated);
        return response()->json(['message' => __('Saved successfully'), 'id' => $id], 201);
    }

    public function show($id)
    {
        $data['data'] = $this->repository->find($id);
        return response()->json($data);
    }

    public function destroy($id)
    {
        $this->repository->delete($id);
        return response()->json(['message' => __('Deleted successfully'), 'id' => $id], 201);
    }
}
