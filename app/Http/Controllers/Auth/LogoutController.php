<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LogoutController
{
    //
    public function index()
    {
        session()->regenerate();

        Auth::logout();

        return redirect()->route('auth.login.index');

    }
}
