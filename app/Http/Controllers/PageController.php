<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController
{
    //
    public function about()
    {
        return view('about');
    }

    public function faq()
    {
        return view('faq');

    }
}
