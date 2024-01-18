<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\ProductGallery;
use App\Traits\FileUploadTrait;
use Illuminate\Http\JsonResponse;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;

class ProductGalleryController extends Controller
{
    use FileUploadTrait;

    /**
     * Display a listing of the resource.
     */
    public function index(Product $product) : View
    {
        $productGalleries = ProductGallery::where('product_id', $product->id)->get();
        return view('admin.product.gallery.index', compact('product', 'productGalleries'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) : RedirectResponse
    {

        $request->validate([
            'image' => ['image', 'max:3000', 'required'],
            'product_id' => ['required', 'numeric']
        ]);

        $product = Product::find($request->product_id);

        $imagePath = $this->uploadImage($request, 'image', 'web/images');

        ProductGallery::create([
                'product_id' => $product->id,
                'image' => $imagePath
        ]);
    
        toastr()->success("Created successfully");

        return back();

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
    public function destroy(string $id) : JsonResponse
    {
        try {
            $ProductGallery = ProductGallery::findOrFail($id);
            $this->removeImage($ProductGallery->image);
            $ProductGallery->delete();

            return response()->json(['status' => 'success', 'message' => 'Deleted successfully']);

        } catch (\Exception $th) {
            return response()->json(['status' => 'error', 'message' => 'Unable to complete this action']);
        }
    }
}
