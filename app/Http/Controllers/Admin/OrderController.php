<?php

namespace App\Http\Controllers\Admin;

use App\Http\Models\Order;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        $orders = Order::query()

            ->when($request->filled('search'), function (Builder $query) use ($request) {
                $query->where('id', $request->search);
            })

            ->when($request->filled('sort'), function (Builder $query) use ($request) {

                switch ($request->sort) {

                    case 'created_at_asc':
                        $query->orderBy('created_at');
                        break;

                    case 'price_high':
                        $query->orderByDesc('total_price');
                        break;

                    case 'price_low':
                        $query->orderBy('total_price');
                        break;

                    case 'status':
                        $query->orderBy('status');
                        break;

                    default:
                        $query->orderByDesc('created_at');
                        break;
                }

            })

            ->paginate();

        return view('admin.orders.index', compact('orders'));

   }

    public function show(Order $order)
    {
        $order->load([
           'user',
           'orderItems.product.productCategory'
        ]);
        return view('admin.orders.show',compact('order'));


   }

    public function edit(Order $order)
    {
        return view('admin.orders.edit', compact('order'));
    }


   public function update(Request $request, Order $order)
    {
        $request->validate([
            'status' => ['required'],
        ]);

        $order->update([
            'status' => $request->status,
        ]);

        return redirect()->route('admin.orders.index');
    }

    public function destroy(Order $order)
    {
        $order->orderItems()->delete();
        $order->delete();

        return redirect()->route('admin.orders.index');
    }

}
