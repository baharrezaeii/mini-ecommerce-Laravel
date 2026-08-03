<?php

namespace App\Http\Controllers;

use App\Http\Models\ProductCategory;
use Illuminate\Http\Request;

class ProductCategoryController
{
    //
    public function index()
    {
        $categories = ProductCategory::query()
            ->get();
        return view('categories.index', compact('categories'));
    }
}
