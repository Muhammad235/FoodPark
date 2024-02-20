<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function store(Request $request){
        $product = Product::with(['productSize', 'productOption'])->findOrFail($request->product_id);
        $productSize = $product->productSize()->where('id', $request->product_size)->first();
        $productOptions = $product->productOption()->whereIn('id', [$request->product_option])->get();

        $options = [

            'product_size' => [
                'id' => $productSize->id,
                'name' => $productSize->name,
                'price' => $productSize->price,
            ],

            'product_options' => [],
        ];

        foreach ($productOptions as $productOption) {
            $options['product_options'][] = [
                'id' => $productOption->id,
                'name' => $productOption->name,
                'price' => $productOption->price,
            ];
        }

        return ($options);


    }
}
