<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\BO\CartBO;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    protected $cartBO;

    public function __construct(CartBO $cartBO)
    {
        $this->cartBO = $cartBO;
    }

    public function addToCart(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity'   => 'required|integer|min:1',
        ]);

        $cart = $this->cartBO->addToCart(
            Auth::id(),
            $request->product_id,
            $request->quantity
        );

        return response()->json([
            'status' => true,
            'message' => 'Added to cart',
            'data' => $cart
        ]);
    }

    public function index()
    {
        $data = $this->cartBO->getCart(Auth::id());

        return response()->json([
            'status' => true,
            'data' => $data['items'],
            'total_amount' => $data['total_amount']
        ]);
    }

    public function update(Request $request)
    {
       $request->validate([
            'id'       => 'required|exists:carts,id',
            'quantity' => 'required|integer|min:1',
        ]);

        $id =$request->id;
        $cart = $this->cartBO->updateCart($id, $request->quantity);

        if (!$cart) {
            return response()->json([
                'status' => false,
                'message' => 'Cart not found'
            ]);
        }

        return response()->json([
            'status' => true,
            'message' => 'Cart updated',
            'data' => $cart
        ]);
    }

    public function destroy(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:carts,id',
        ]);
        $id =$request->id;
        $deleted = $this->cartBO->deleteCart($id);

        if (!$deleted) {
            return response()->json([
                'status' => false,
                'message' => 'Cart not found'
            ]);
        }

        return response()->json([
            'status' => true,
            'message' => 'Cart deleted'
        ]);
    }
}