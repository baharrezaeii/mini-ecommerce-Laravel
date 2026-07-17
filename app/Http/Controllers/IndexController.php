<?php

namespace App\Http\Controllers;
use App\Enums\ProductStatus;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class IndexController extends Controller
{
    //
    public function index()
    {

        return view ('index');

    }
}
