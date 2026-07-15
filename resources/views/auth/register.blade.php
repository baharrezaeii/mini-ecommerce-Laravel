@extends('layouts.app')

@section('content')
    <section class="relative flex items-center justify-center min-h-screen w-full">
        <!-- background -->
        <div class="pointer-events-none absolute inset-0 flex items-center justify-center overflow-hidden
      [mask-image:radial-gradient(circle_at_center,rgba(255,255,255,1)_0%,rgba(255,255,255,0)_85%)]">
            <svg
                class="absolute left-0 top-0 h-full w-full stroke-black/10 stroke-[2]
         [mask-image:radial-gradient(circle_at_center,rgba(255,255,255,1)_20%,rgba(255,255,255,0)_95%)] dark:stroke-white/10">
                <rect width="100%" height="100%" stroke-width="0" fill="url(#grid-pattern)"></rect>
                <defs>
                    <pattern id="grid-pattern" viewBox="0 0 64 64" width="60" height="60" patternUnits="userSpaceOnUse">
                        <path d="M64 0H0V64" fill="none"></path>
                    </pattern>
                </defs>
            </svg>
        </div>
        <div
            class="relative w-[27rem] mx-5 flex flex-col justify-center py-12 px-4 md:px-8 bg-white dark:bg-gray-800 shadow-md rounded-xl">
            <div class="flex items-center justify-center">
                <button class="toggle-theme absolute left-2 top-2 flex-center p-1.5 rounded-full text-gray-300">
                    <svg class="inline-block dark:hidden size-5">
                        <use href="#moon"/>
                    </svg>
                    <svg class="hidden dark:inline size-5">
                        <use href="#sun"/>
                    </svg>
                </button>
                <a href="{{route('index')}}" class="flex flex-col text-center">
         <span class="font-MorabbaMedium text-4xl flex items-center">
             فروشگاه <span class="text-blue-500">درنیکا</span>
         </span>
                </a>
            </div>
            <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
                <p class="mb-2 text-gray-800 dark:text-gray-100 font-DanaMedium text-lg">ساخت حساب کاربری </p>


                <form class="space-y-5" action="{{route('auth.register.post')}}" method="POST">
                    @csrf
                    <div>
                        <label for="first_name" class="block text-sm/6 font-medium text-gray-500 dark:text-gray-300">
                            نام
                        </label>
                        <div class="mt-3">
                            <input
                                type="text"
                                id="first_name"
                                name="first_name"
                                autofocus
                                tabindex="1"
                                value="{{old('first_name')}}"
                                class="block w-full p-3 text-base outline dark:outline-none outline-1 -outline-offset-1 placeholder:text-gray-400  sm:text-sm/6 transition-all text-gray-800 dark:text-gray-100 dark:bg-gray-900 bg-slate-100 border border-transparent hover:border-slate-200 appearance-none rounded-md outline-none focus:bg-white focus:border-indigo-400 focus:ring-2 focus:ring-indigo-100 dark:focus:ring-blue-400"
                            />
                        </div>
                        <!-- ERROR -->
                        @error('first_name')
                        <span style="color: red"> {{$message}}</span>
                        @enderror
                    </div>

                    <div>
                        <label for="last_name" class="block text-sm/6 font-medium text-gray-500 dark:text-gray-300">
                            نام خانوادگی
                        </label>
                        <div class="mt-3">
                            <input
                                type="text"
                                id="last_name"
                                name="last_name"
                                tabindex="2"
                                value="{{old('last_name')}}"
                                class="block w-full p-3 text-base outline dark:outline-none outline-1 -outline-offset-1 placeholder:text-gray-400  sm:text-sm/6 transition-all text-gray-800 dark:text-gray-100 dark:bg-gray-900 bg-slate-100 border border-transparent hover:border-slate-200 appearance-none rounded-md outline-none focus:bg-white focus:border-indigo-400 focus:ring-2 focus:ring-indigo-100 dark:focus:ring-blue-400"
                            />
                        </div>
                        <!-- ERROR -->
                        @error('last_name')
                        <span style="color: red"> {{$message}}</span>
                        @enderror
                    </div>

                    <div>
                        <label for="mobile" class="block text-sm/6 font-medium text-gray-500 dark:text-gray-300">
                            شماره موبایل
                        </label>
                        <div class="mt-3">
                            <input
                                type="text"
                                id="mobile"
                                name="mobile"
                                tabindex="3"
                                value="{{old('mobile')}}"
                                class="block w-full p-3 text-base outline dark:outline-none outline-1 -outline-offset-1 placeholder:text-gray-400  sm:text-sm/6 transition-all text-gray-800 dark:text-gray-100 dark:bg-gray-900 bg-slate-100 border border-transparent hover:border-slate-200 appearance-none rounded-md outline-none focus:bg-white focus:border-indigo-400 focus:ring-2 focus:ring-indigo-100 dark:focus:ring-blue-400"
                            />
                        </div>
                        <!-- ERROR -->
                        @error('mobile')
                        <span style="color: red"> {{$message}}</span>
                        @enderror
                    </div>

                    <div>
                        <label for="email" class="block text-sm/6 font-medium text-gray-500 dark:text-gray-300">
                            پست الکترونیکی
                        </label>
                        <div class="mt-3">
                            <input
                                type="text"
                                id="email"
                                name="email"
                                tabindex="4"
                                value="{{old('email')}}"
                                class="block w-full p-3 text-base outline dark:outline-none outline-1 -outline-offset-1 placeholder:text-gray-400  sm:text-sm/6 transition-all text-gray-800 dark:text-gray-100 dark:bg-gray-900 bg-slate-100 border border-transparent hover:border-slate-200 appearance-none rounded-md outline-none focus:bg-white focus:border-indigo-400 focus:ring-2 focus:ring-indigo-100 dark:focus:ring-blue-400"
                            />
                        </div>
                        <!-- ERROR -->
                        @error('email')
                        <span style="color: red"> {{$message}}</span>
                        @enderror
                    </div>

                    <div>
                        <label for="password" class="block text-sm/6 font-medium text-gray-500 dark:text-gray-300">
                            رمز عبور
                        </label>
                        <div class="mt-3">
                            <input
                                type="password"
                                tabindex="5"
                                id="password"
                                name="password"
                                class="block w-full p-3 text-base outline dark:outline-none outline-1 -outline-offset-1 placeholder:text-gray-400  sm:text-sm/6 transition-all text-gray-800 dark:text-gray-100 dark:bg-gray-900 bg-slate-100 border border-transparent hover:border-slate-200 appearance-none rounded-md outline-none focus:bg-white focus:border-indigo-400 focus:ring-2 focus:ring-indigo-100 dark:focus:ring-blue-400"
                            />
                        </div>
                        <!-- ERROR -->
                        @error('password')
                        <span style="color: red"> {{$message}}</span>
                        @enderror
                    </div>

                    <div>
                        <label for="password" class="block text-sm/6 font-medium text-gray-500 dark:text-gray-300">
                            تکرار رمز عبور
                        </label>
                        <div class="mt-3">
                            <input
                                type="password"
                                tabindex="6"
                                id="password"
                                name="password_confirmation"
                                class="block w-full p-3 text-base outline dark:outline-none outline-1 -outline-offset-1 placeholder:text-gray-400  sm:text-sm/6 transition-all text-gray-800 dark:text-gray-100 dark:bg-gray-900 bg-slate-100 border border-transparent hover:border-slate-200 appearance-none rounded-md outline-none focus:bg-white focus:border-indigo-400 focus:ring-2 focus:ring-indigo-100 dark:focus:ring-blue-400"
                            />
                        </div>
                    </div>

                    <div>
                        <button type="submit" class="submit-btn" tabindex="7" >ساخت حساب کاربری</button>
                    </div>
                </form>
                <p class="mt-8 text-center text-sm/6 text-gray-500 dark:text-gray-300">
                    حساب کاربری دارید ؟
                    <a class="text-blue-400" href="{{route('auth.login.index')}}">ورود</a>
                </p>
            </div>
        </div>
    </section>
@endsection


