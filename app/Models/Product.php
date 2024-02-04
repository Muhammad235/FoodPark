<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;



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


    public function category() : BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}
