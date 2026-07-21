<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderAddRequest;
use App\Services\CartService;
use Illuminate\Http\Request;

class CartController
{
    public function index()
    {
        return view('cart');
    }
    public function add(OrderAddRequest $request)
    {
        CartService::add(
            $request->input('product_id'),
            $request->input('qty')
        );
        return redirect()->back();
    }
}
