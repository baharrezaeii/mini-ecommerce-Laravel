<?php

namespace App\Http\Controllers;

use App\Enums\ProductStatus;
use App\Http\Models\Product;
use App\Http\Models\ProductCategory;
use App\Http\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class IndexController extends Controller
{
    //
    public function index()
    {
        $title = 'صفحه اصلی';

        $sliders = Slider::query()
            ->where('status',1)
            ->with('image')
            ->get();



        $productCategories = ProductCategory::query()
            ->limit(5)
            ->get();

        $newestProducts = Product::query()
            ->orderByDesc('created_at')
            ->limit(5)
            ->get();

        $bestsellingProducts = Product::query()
            ->withSum('orderItems', 'qty')
            ->orderByDesc('order_items_sum_qty')
            ->limit(5)
            ->get();


        return view('index', compact(
            'title',
            'productCategories',
            'newestProducts',
            'bestsellingProducts',
        'sliders'));

    }
}
