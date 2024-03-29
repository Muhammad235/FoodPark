<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use App\DataTables\CategoryDataTable;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\Admin\CategoryCreateRequest;
use App\Http\Requests\Admin\CategoryUpdateRequest;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(CategoryDataTable $dataTable)
    {
        return $dataTable->render('admin.product.category.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() : View
    {
        return view('admin.product.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryCreateRequest $request) : RedirectResponse
    {
        $data = $request->validated();
        $data['slug'] = Str::slug($data['name']);
        
        Category::create($data);

        toastr()->success("Created successfully");

        return to_route('admin.category.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id) : View
    {
        $category = Category::findOrFail($id);
        return view('admin.product.category.edit', compact('category'));
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryUpdateRequest $request, string $id) : RedirectResponse
    {
        // dd($request);
        $category = Category::findOrFail($id);
        // dd($category);
        $category->update($request->only('name', 'show_at_home', 'status'));

        toastr()->success("Updated successfully");
        return to_route('admin.category.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id) : JsonResponse
    {
        try {
            $category = Category::findOrfail($id);
            $category->delete();

            return response()->json(['status' => 'success', 'message' => 'Deleted successfully']);

        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => 'Unable to complete this action']);
        }
    }
}
