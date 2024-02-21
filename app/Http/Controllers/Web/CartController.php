<?php

namespace App\Http\Controllers\web;

use App\Models\Product;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use Gloudemans\Shoppingcart\Facades\Cart;

class CartController extends Controller
{
    public function store(Request $request){
        $product = Product::with(['productSize', 'productOption'])->findOrFail($request->product_id);
        $productSize = $product->productSize()->where('id', $request->product_size)->first();
        $productOptions = $product->productOption()->whereIn('id', $request->product_option)->get();

        $options = [

            'product_size' => [],

            'product_options' => [],

            'product_info' => [
                'image' => $product->thumb_image,
                'slug' => $product->slug,
            ]
        ];


        if($productSize !== null){
            $options['product_size'][] = [
                'id' => $productSize?->id,
                'name' => $productSize?->name,
                'price' => $productSize?->price,
            ];
        }

        foreach ($productOptions as $productOption) {
            $options['product_options'][] = [
                'id' => $productOption?->id,
                'name' => $productOption?->name,
                'price' => $productOption?->price,
            ];
        }

        Cart::add([
            'id' => $product->id,
            'name' => $product->name,
            'qty' => $request->quantity,
            'price' => $product->offer_price > 0 ? $product->offer_price : $product->price, 
            'weight' => 0,
            'options' => $options,
        ]);

        return response([
            'status' => 'success',
            'message' => 'Product added to cart successfully'
        ], 200);

    }
}
