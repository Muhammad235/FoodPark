<?php

use Illuminate\Support\Str;

/** Create Unique slug **/
if (!function_exists('generateUniqueSlug')) {
    function generateUniqueSlug($model, $name) : string{
        $modelClass = "App\\Models\\$model";

        if (!class_exists($modelClass)) {
            throw new \InvalidArgumentException("Model $model not found");
        }

        $slug = Str::slug($name);
        $count = 2;
        while ($modelClass::where('slug', $slug)->exists()) {
            $slug = Str::slug($name) . '-' . $count;
            $count++;
        }

        return $slug;
    }
}



/** Determine Currency position and icon **/
if(!function_exists('currencyPosition')){
    function currencyPosition($price) : string
    {
        if(config('settings.currency_icon_position') == 'left'){
            return config('settings.currency_icon') . $price;
        }else{
            return $price . config('settings.currency_icon');
        }
    }
}


/**  Calculate cart total price **/
if(!function_exists('cartTotal')){
    function cartTotal() 
    {
        $total = 0;
        foreach(Cart::content() as $product)
        {
            $productPrice = $product->price;
            $sizePrice = $product->options?->product_size['price'] ?? 0;
            $optionsPrice = 0;
            foreach($product->options->product_options as $productOption){
                $optionsPrice += $productOption['price'];
            }

            $total += ($productPrice + $sizePrice + $optionsPrice) * intval($product->qty);
        } 

        return $total;
    }
}