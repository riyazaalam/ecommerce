<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Storage;
class CartController extends Controller
{
     public function index()
    {
       return view('admin.cart.index');
    }

     public function data(request $request){
		$query = Cart::with('product')
        ->orderBy('user_id', 'DESC');

      	return DataTables::eloquent($query)
			->editColumn('p_name', function ($cart) {
                 return $cart->product && $cart->product->name
                    ? ucwords($cart->product->name)
                    : 'N/A';
            })

            ->editColumn('user_id', function ($cart) {
                return $cart->user_id;
            })
            ->editColumn('quantity', function ($cart) {
                return $cart->quantity;
            })
            ->editColumn('base_price', function ($cart) {
                return '₹ ' . number_format($cart->base_price, 2);
            })
            ->editColumn('total_price', function ($cart) {
                return '₹ ' . number_format($cart->total_price, 2);
            })
            ->addColumn('main_image', function ($cart) {
                if ($cart->product && !empty($cart->product->main_image_url)) {
                    return '<img src="'.$cart->product->main_image_url.'" width="50" height="50" style="object-fit:cover;border-radius:5px;">';
                }
                return '<span class="text-muted">No Image</span>';
            })
			->addIndexColumn()
			->rawColumns(['p_name','user_id','quantity','base_price','total_price','main_image'])->setRowId('id')->make(true);
   	}
}
