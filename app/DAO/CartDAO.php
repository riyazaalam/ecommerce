<?php

namespace App\DAO;

use App\Models\Cart;

class CartDAO
{
    public function findCart($userId, $productId)
    {
        return Cart::where('user_id', $userId)
                    ->where('product_id', $productId)
                    ->first();
    }

    public function create($data)
    {
        return Cart::create($data);
    }

    public function update($cart, $data)
    {
        $cart->update($data);
        return $cart;
    }

    public function getUserCart($userId)
    {
        return Cart::with('product')
                    ->where('user_id', $userId)
                    ->get();
    }

    public function findById($id)
    {
        return Cart::find($id);
    }

    public function delete($cart)
    {
        return $cart->delete();
    }
}

?>