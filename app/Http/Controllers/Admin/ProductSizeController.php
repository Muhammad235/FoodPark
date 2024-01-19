<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Models\ProductOption;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use App\Models\ProductSize;
use Illuminate\Http\RedirectResponse;

class ProductSizeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Product $product) : View
    {
        $sizes = ProductSize::where('product_id', $product->id)->get();
        $options = ProductOption::where('product_id', $product->id)->get();
        return view('admin.product.product-size.index', compact('product', 'sizes', 'options'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) : RedirectResponse
    {
        $request->validate([
            'product_id' => ['required'],
            'name' => ['required', 'max:255'],
            'price' => ['required', 'numeric'],
        ]);

        ProductSize::create($request->only('product_id', 'name', 'price'));

        toastr()->success("Created successfully");

        return back();
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $ProductSize = ProductSize::findOrFail($id);
            $ProductSize->delete();

            return response()->json(['status' => 'success', 'message' => 'Deleted successfully']);

        } catch (\Exception $th) {
            return response()->json(['status' => 'error', 'message' => 'Unable to complete this action']);
        }
    }
}
