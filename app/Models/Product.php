<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;



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

    public function productGallery() : HasMany
    {
        return $this->hasMany(ProductGallery::class);
    }

    public function productSize() : HasMany
    {
        return $this->hasMany(ProductSize::class);
    }

    public function productOption() : HasMany
    {
        return $this->hasMany(ProductOption::class);
    }
}
