<?php

namespace App\Http\Controllers;

use App\Exceptions\CartItemNotFoundException;
use App\Http\Requests\CheckoutPostRequest;
use App\Services\CartService;
use App\Services\OrderService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CheckoutController
{
    public function index()
    {
        $userCart = CartService::getItemsWithDetails();

        $userCartTotalPrices = CartService::getTotalPrices();

        return view('checkout', compact('userCart', 'userCartTotalPrices'));

    }

    public function post(CheckoutPostRequest $request)
    {
        $checkoutData = $request->only([
            'user_province',
            'user_city',
            'user_address',
            'user_postal_code',
            'user_mobile',
            'description',
        ]);

        try {
            OrderService::register($checkoutData);
        } catch (CartItemNotFoundException $exception) {
            return back()
                ->withErrors([
                'general' => $exception->getMessage()
            ]);
        } catch (\Exception $exception) {
            Log::error($exception);

            return back()->withErrors([
                'general' => 'خطایی رخ داده است با پشتیبانی ارتباط بگیرید.'
            ]);
        }
        return redirect()->route('account.orders');

    }
}
