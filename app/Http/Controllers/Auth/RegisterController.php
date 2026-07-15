<?php

namespace App\Http\Controllers\Auth;

use App\Enums\UserStatus;
use App\Http\Requests\Auth\RegisterPostRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController
{
    public function index()
    {
        $withoutHeader = true;
        $withoutFooter = true;

        return view('auth.register', compact('withoutHeader', 'withoutFooter'));
    }

    public function post(RegisterPostRequest $request)
    {
        $inputs = $request->validated();

        $inputs['password'] = Hash::make($inputs['password']);

        $inputs['status'] = UserStatus::ENABLE;

        $user = User::create($inputs);

        Auth::login($user);
        return redirect()->route('index');

    }
}
