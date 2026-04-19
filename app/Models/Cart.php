<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Product;

class Cart extends Model
{
    use HasFactory;

    protected $table = 'carts';

    protected $fillable = [
        'user_id',
        'product_id',
        'quantity',
        'base_price',
        'total_price',
    ];

    protected $casts = [
        'base_price' => 'decimal:2',
        'total_price' => 'decimal:2',
    ];

    /*
    |--------------------------------------------------------------------------
    | Relationships
    |--------------------------------------------------------------------------
    */

    // Cart belongs to User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Cart belongs to Product
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}