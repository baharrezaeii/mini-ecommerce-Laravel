<?php

namespace App\Http\Controllers\Account;

use App\Http\Requests\EditProfilePostRequest;
use Illuminate\Support\Facades\Hash;

class EditProfileController
{
    public function index()
    {
        $user = auth()->user();

        return view('account.edit-profile', compact('user'));
    }

    public function post(EditProfilePostRequest $request)
    {
        $inputs = $request->only([
            'first_name',
            'last_name',
            'mobile',
            'email',
        ]);
        if ($request->filled('password')) {

            $inputs['password'] = Hash::make($request->input('password'));
        }
        \Auth::user()->update($inputs);

        return redirect()->back();
    }
}
