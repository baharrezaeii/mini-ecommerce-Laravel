<?php

namespace App\Http\Controllers\Admin;

use App\Enums\AdminStatus;
use App\Http\Models\Admin;
use App\Http\Requests\AuthLoginPostRequest;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends controller
{
    public function login()
    {
        $rawLayout = true;
        $title = 'ورود به حساب کاربری';

        return view('admin.login', compact('rawLayout', 'title'));

    }

    public function loginPost(AuthLoginPostRequest $request)
    {
        $admin = Admin::query()
            ->whereUsername($request->input('username'))
            ->whereStatus(AdminStatus::ENABLE)
            ->first();

        if (!$admin) {
            return back()->withErrors([
                'general' => 'اطلاعات وارد شده نامعتبر است.'
            ]);
        }
        if (!Hash::check($request->input('password'), $admin->password)) {
            return back()->withErrors([
                'general' => 'اطلاعات وارد شده نامعتبر است.'
            ]);
        }
        Auth::guard('admin')->login($admin);

        return redirect()->route('admin.dashboard.index');

    }

    public function logout()
    {
           Auth::guard('admin')->logout();

           return redirect()->route('admin.auth.login.index');
    }
}
