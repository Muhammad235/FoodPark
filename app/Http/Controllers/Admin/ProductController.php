<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Models\Category;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Traits\FileUploadTrait;
use App\DataTables\ProductDataTable;
use App\Http\Controllers\Controller;
use App\DataTables\CategoryDataTable;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\Admin\ProductCreateRequest;

class ProductController extends Controller
{
    use FileUploadTrait;
    /**
     * Display a listing of the resource.
     */
    public function index(ProductDataTable $dataTable) 
    {
        return $dataTable->render('admin.product.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() : View
    {
        $categories = Category::all();
        return view('admin.product.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductCreateRequest $request) : RedirectResponse
    {

        $data = $request->validated();

        //Upload the image and get file path
        $imagePath = $this->uploadImage($request, 'image', '/web/images');

        $data['thumb_image'] = $imagePath;
        $data['slug'] = generateUniqueSlug('Product', $request->name);


        Product::create($data);

        toastr()->success("Created successfully");
            
        return to_route('admin.product.index');
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
