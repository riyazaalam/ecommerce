<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;

class ProductImage extends Model
{
    protected $fillable = [
        'product_id',
        'image',
    ];

    /**
     * Relationship: Image belongs to Product
     */
    protected $appends = ['image_url'];
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    /**
     * Accessor: Get full image URL
     */
    public function getImageUrlAttribute()
    {
        return Storage::url($this->image);
    }
}