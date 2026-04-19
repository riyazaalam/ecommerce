<?php

namespace App\BO;

use App\DAO\CartDAO;
use App\Models\Product;

class CartBO
{
    protected $cartDAO;

    public function __construct(CartDAO $cartDAO)
    {
        $this->cartDAO = $cartDAO;
    }

    public function addToCart($userId, $productId, $quantity)
    {
        $product = Product::findOrFail($productId);

        $cart = $this->cartDAO->findCart($userId, $productId);

        if ($cart) {
            $newQty = $cart->quantity + $quantity;

            return $this->cartDAO->update($cart, [
                'quantity' => $newQty,
                'base_price' => $product->price,
                'total_price' => $newQty * $product->price,
            ]);
        }

        return $this->cartDAO->create([
            'user_id' => $userId,
            'product_id' => $productId,
            'quantity' => $quantity,
            'base_price' => $product->price,
            'total_price' => $quantity * $product->price,
        ]);
    }

    public function getCart($userId)
    {
        $carts = $this->cartDAO->getUserCart($userId);
        $total = $carts->sum('total_price');

        return [
            'items' => $carts,
            'total_amount' => $total
        ];
    }

    public function updateCart($id, $quantity)
    {
        $cart = $this->cartDAO->findById($id);

        if (!$cart) {
            return null;
        }

        $product = Product::find($cart->product_id);

        return $this->cartDAO->update($cart, [
            'quantity' => $quantity,
            'base_price' => $product->price,
            'total_price' => $quantity * $product->price,
        ]);
    }

    public function deleteCart($id)
    {
        $cart = $this->cartDAO->findById($id);

        if (!$cart) {
            return false;
        }

        return $this->cartDAO->delete($cart);
    }
}