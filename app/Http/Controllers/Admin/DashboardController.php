<?php

namespace App\Http\Controllers\Admin;

use App\Enums\OrderStatus;
use App\Http\Models\Order;
use App\Http\Models\User;
use Illuminate\Routing\Controller;
use Illuminate\Support\Carbon;

class DashboardController extends controller
{
    //
    public function index()
    {

        $now = Carbon::now();

        $startMonth = $now->toJalali()
            ->startMonth()
            ->toCarbon()
            ->startOfDay();

        $endMonth = $now->toJalali()
            ->endMonth()
            ->toCarbon()
            ->endOfDay();

        $salesCount = Order::query()
            ->where('status', OrderStatus::DELIVERED)
            ->whereBetween('created_at', [$startMonth, $endMonth])
            ->count();

        $totalDiscount = Order::query()
            ->where('status', OrderStatus::DELIVERED)
            ->whereBetween('created_at', [$startMonth, $endMonth])
            ->sum('total_discount');

        $totalIncome = Order::query()
            ->where('status', OrderStatus::DELIVERED)
            ->whereBetween('created_at', [$startMonth, $endMonth])
            ->sum('total_price');

        $usersCount = User::query()
            ->whereBetween('created_at', [$startMonth, $endMonth])
            ->count();


        return view('admin.dashboard', compact('salesCount','totalDiscount','totalIncome', 'usersCount'));

    }
}
