<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class ProductImage extends Model
{
    protected $fillable = [
        'product_id',
        'image',
    ];

    /**
     * Relationship: Image belongs to Product
     */
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