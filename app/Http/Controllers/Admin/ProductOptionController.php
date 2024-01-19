<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\ProductOption;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;

class ProductOptionController extends Controller
{

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) : RedirectResponse
    {
        $request->validate([
            'product_id' => ['required'],
            'name' => ['required', 'max:255'],
            'price' => ['required', 'numeric'],
        ], [
            'name.required' => 'Product option name is required',
            'name.max' => 'Product option max length is 255',
            'price.required' => 'Product option price is required',
            'price.numeric' => 'Product option price must be a number',
        ]);

        ProductOption::create($request->only('product_id', 'name', 'price'));

        toastr()->success("Created successfully");

        return back();
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $ProductOption = ProductOption::findOrFail($id);
            $ProductOption->delete();

            return response()->json(['status' => 'success', 'message' => 'Deleted successfully']);

        } catch (\Exception $th) {
            return response()->json(['status' => 'error', 'message' => 'Unable to complete this action']);
        }
    }
}
