<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'thumb_image',
        'category_id',
        'short_description',
        'long_description',
        'price',
        'offer_price',
        'sku',
        'show_at_home',
        'seo_title',
        'seo_description',
        'status',
    ];
}
