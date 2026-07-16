@extends('account.layouts.app')

@section('account-content')
    <div class="flex flex-col shadow rounded-lg p-4 dark:bg-gray-800 bg-white mt-5 lg:mt-0">
        <div class="flex items-center justify-between">
            <h2 class="font-DanaMedium text-lg">اطلاعات حساب کاربری</h2>
        </div>
        <form class="mt-5 grid grid-cols-12 gap-5 child:col-span-12 child:lg:col-span-6"
              action=""
              method="POST"
        >
            @csrf
            <div>
                <label for="input1" class="block text-sm font-DanaMedium text-gray-500 dark:text-gray-300">
                    نام
                </label>
                <div class="mt-3 relative">
                    <input
                        id="input1"
                        type="text"
                        class="block w-full rounded-xl border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 px-4 py-3 text-sm focus:border-blue-500 focus:ring-2 focus:ring-blue-300 outline-none transition-all"                        name="first_name"
                        value="{{old('first_name',$user->first_name)}}"
                    >
                </div>
                @error('first_name')
                <span class="text-red-500"> {{$message}}</span>
                @enderror
            </div>
            <div>
                <label for="input2" class="block text-sm font-DanaMedium text-gray-500 dark:text-gray-300">
                    نام خانوادگی
                </label>
                <div class="mt-3 relative">
                    <input
                        id="input1"
                        type="text"
                        class="block w-full rounded-xl border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 px-4 py-3 text-sm focus:border-blue-500 focus:ring-2 focus:ring-blue-300 outline-none transition-all"                        name="last_name"
                        value="{{old('last_name',$user->last_name)}}"
                    >
                </div>
                @error('last_name')
                <span class="text-red-500"> {{$message}}</span>
                @enderror
            </div>
            <div>
                <label for="input3"
                       class="block text-sm font-DanaMedium text-gray-500 dark:text-gray-300">
                    موبایل
                </label>
                <div class="mt-3 relative">
                    <input
                        id="input3"
                        type="text"
                        class="block w-full rounded-xl border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 px-4 py-3 text-sm focus:border-blue-500 focus:ring-2 focus:ring-blue-300 outline-none transition-all"                        name="mobile"
                        value="{{old('mobile',$user->mobile)}}"
                    >
                </div>
                @error('mobile')
                <span class="text-red-500"> {{$message}}</span>
                @enderror
            </div>
            <div>
                <label for="email"
                       class="block text-sm font-DanaMedium text-gray-500 dark:text-gray-300">
                    ایمیل
                </label>
                <div class="mt-3 relative">
                    <input
                        id="input4"
                        type="text"
                        class="block w-full rounded-xl border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 px-4 py-3 text-sm focus:border-blue-500 focus:ring-2 focus:ring-blue-300 outline-none transition-all"                        name="email"
                        value="{{old('email',$user->email)}}"
                    >
                </div>
                @error('email')
                <span class="text-red-500"> {{$message}}</span>
                @enderror
            </div>
            <div>
                <label for="email"
                       class="block text-sm font-DanaMedium text-gray-500 dark:text-gray-300">
                    رمز عبور
                </label>
                <div class="mt-3 relative">
                    <input
                        id="input5"
                        type="text"
                        class="block w-full rounded-xl border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 px-4 py-3 text-sm focus:border-blue-500 focus:ring-2 focus:ring-blue-300 outline-none transition-all"                        name="password"
                    >
                    <small>در صورت تغییر کلمه عبور این فیلد را پر کنید.</small>
                </div>
                @error('password')
                <span class="text-red-500"> {{$message}}</span>
                @enderror
            </div>


            <br>
            <br>
            <br>
            <div class="col-span-12 flex justify-end mt-6">
                <button
                    type="submit"
                    class="rounded-xl bg-blue-600 px-8 py-3 text-white font-DanaMedium transition-all duration-300 hover:bg-blue-700 hover:shadow-lg active:scale-95"
                >
                    ذخیره تغییرات
                </button>
            </div>
        </form>
    </div>
@endsection
