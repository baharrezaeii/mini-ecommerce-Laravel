<?php

namespace App\Http\Controllers\Admin;

use App\Http\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class SettingController extends Controller
{
    public function edit()
    {
        $settings = Setting::pluck('value', 'code');

        return view('admin.settings.edit', compact('settings'));
    }



    public function update(Request $request)
    {
        foreach ($request->except('_token', '_method') as $code => $value) {

            Setting::where('code', $code)
                ->update([
                    'value' => $value
                ]);
        }

        return back()->with('success', 'تنظیمات با موفقیت ذخیره شد.');
    }
}
