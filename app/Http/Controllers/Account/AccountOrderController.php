<?php

namespace App\Http\Controllers\Account;

use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class AccountOrderController
{

    public function index()
    {
        $userOrders=Order::query()
            ->where('user_id','=',Auth::id())
            ->orderByDesc('created_at')
            ->paginate();

        return view('account.orders',compact('userOrders'));

    }
}
