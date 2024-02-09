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
