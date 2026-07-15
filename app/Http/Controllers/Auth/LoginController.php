<?php

namespace App\Http\Controllers\Auth;

use App\Http\Requests\Auth\LoginPostRequest;
use App\Models\User;
use Illuminate\Container\Attributes\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController
{
    public function index()
    {
        $withoutHeader = true;
        $withoutFooter = true;

        return view('auth.login', compact('withoutHeader', 'withoutFooter'));
    }

    public function post(LoginPostRequest $request)
    {
        $user=User::query()
            ->whereMobile($request->input('mobile'))
            ->first();


        if(!$user){
            return back()->withErrors([
                'general'=>'اطلاعات کاربر اشتباه است.'
            ]);
        }
        if(!Hash::check($request->input('password'),$user->paasword)){
            return back()->withErrors([
                'general'=>'اطلاعات کاربر اشتباه است.'
            ]);
        }

        Auth::login($user);
        return redirect()->route('index');



    }
}
