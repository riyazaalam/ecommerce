<?php

namespace App\DAO;

use App\Models\Product;
use App\Models\ProductImage;

class ProductDAO
{
    public function getAll()
    {
        return Product::with('images')->get();
    }
}
?>