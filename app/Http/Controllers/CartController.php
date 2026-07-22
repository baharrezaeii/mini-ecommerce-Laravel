<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderAddRequest;
use App\Services\CartService;
use Illuminate\Http\Request;
use function Symfony\Component\String\b;

class CartController
{
    public function index()
    {
        $userCartItems = CartService::getItemsWithDetails();

        $userCartTotalPrices = CartService::getTotalPrices();

        return view('cart', compact('userCartItems', 'userCartTotalPrices'));
    }

    public function add(OrderAddRequest $request)
    {
        CartService::add(
            $request->input('product_id'),
            $request->input('qty')
        );
        return redirect()->back();
    }

    public function removeItem(int $productId)
    {
        CartService::remove($productId);

        return back();
    }

    public function clear()
    {
        CartService::clean();

        return back();
    }

    public function updateQty(Request $request)
    {
        $cartItems = $request->input('cart_items');

        foreach ($cartItems as $cartItem) {

            CartService::updateQty($cartItem['product_id'], $cartItem['qty']);
        }
        return back();
    }


}
