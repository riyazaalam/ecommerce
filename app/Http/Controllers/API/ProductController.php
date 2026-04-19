<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\BO\ProductBO;


class ProductController extends Controller
{
    public function __construct(private ProductBO $bo) {}

    public function index()
    {
        return response()->json($this->bo->all());
    }
}
