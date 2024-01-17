<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\ProductGallery;
use App\Traits\FileUploadTrait;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;

class ProductGalleryController extends Controller
{
    use FileUploadTrait;

    /**
     * Display a listing of the resource.
     */
    public function index(string $productId)
    {
        return view('admin.product.gallery.index', compact('productId'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() 
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) : RedirectResponse
    {
        // dd($request->all());

        $request->validate([
            'image' => ['image', 'max:3000', 'required'],
            'product_id' => ['required', 'numeric']
        ]);

        $product = Product::find($request->product_id);

        if($product){
            $imagePath = $this->uploadImage($request, 'image', 'web/images');

            ProductGallery::create([
                'product_id' => $product->id,
                'image' => $imagePath
            ]);
    
            toastr()->success("Created successfully");
            return to_route('admin.product-gallery.index');
        }else {
            return to_route('admin.product-gallery.index');

        }


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
