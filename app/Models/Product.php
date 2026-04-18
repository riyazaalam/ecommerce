<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\ProductImage;

class Product extends Model
{
    /**
     * Table Name (optional if 'products')
     */
    protected $table = 'products';

    /**
     * Mass Assignable Fields
     */
    protected $fillable = [
        'name',
        'price',
        'main_image',
        'description',
    ];

    /**
     * Type Casting
     */
    protected $casts = [
        'price' => 'decimal:2',
    ];

    /**
     * Accessor (Format Price)
     * Example: ₹100.00
     */
    public function getFormattedPriceAttribute()
    {
        return '₹' . number_format($this->price, 2);
    }
    public function images()
    {
        return $this->hasMany(ProductImage::class);
    }

    /**
     * Scope (Search by Name)
     */
    public function scopeSearch($query, $value)
    {
        return $query->where('name', 'like', "%{$value}%");
    }
}