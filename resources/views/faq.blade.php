@extends('layouts.app')
@section('content')
    <main class="container relative">
        <!-- Breadcrumb -->
        <nav class="flex mt-8" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
                <li class="inline-flex items-center">
                    <a href="{{route('index')}}"
                       class="inline-flex items-center text-sm gap-x-1  text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
                        <svg class="w-4 h-4 mb-0.5">
                            <use href="#home" />
                        </svg>
                        صفحه اصلی
                    </a>
                </li>
                <li aria-current="page">
                    <div class="flex items-center">
                        <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true"
                             xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="m1 9 4-4-4-4" />
                        </svg>
                        <span class="ms-1 text-sm  text-gray-500 md:ms-2 dark:text-gray-400">سوالات متداول</span>
                    </div>
                </li>
            </ol>
        </nav>
        <div class="flex flex-col items-center justify-center gap-y-2.5 my-8">
            <h2 class="font-DanaMedium text-lg">سوالات متداول</h2>
        </div>
        <ul class="w-full rounded-xl py-4 flex items-center justify-center flex-col gap-y-4">
            <div class="max-w-xl rounded-xl px-4 dark:bg-gray-800 bg-gray-100">
                <button class="accordion-btn w-full text-right flex justify-between items-center p-4">
                    <span class="text-base md:text-lg">چگونه می‌توانم سفارشم را پیگیری کنم؟</span>
                    <svg class="w-5 h-5 rotate-90 duration-300 accordion-icon">
                        <use href="#chevron"></use>
                    </svg>
                </button>
                <div class="accordion-content overflow-hidden transition-all duration-300 ease-in-out max-h-0">
                    <p class="px-4 pb-4 text-gray-600 dark:text-gray-400">برای پیگیری سفارش، وارد حساب کاربری شوید و از قسمت سفارشات وضعیت بسته خود را بررسی کنید.</p>
                </div>
            </div>
            <div class="max-w-xl rounded-xl px-4 dark:bg-gray-800 bg-gray-100">
                <button class="accordion-btn w-full text-right flex justify-between items-center p-4 line-clamp-1">
                    <span class="text-base md:text-lg">آیا امکان تغییر آدرس وجود دارد؟</span>
                    <svg class="w-5 h-5 rotate-90 duration-300 accordion-icon">
                        <use href="#chevron"></use>
                    </svg>
                </button>
                <div class="accordion-content overflow-hidden transition-all duration-300 ease-in-out max-h-0">
                    <p class="px-4 pb-4 text-gray-600 dark:text-gray-400">بله، در صورتی که سفارش شما ارسال نشده باشد، می‌توانید از طریق پشتیبانی درخواست تغییر آدرس دهید.</p>
                </div>
            </div>
            <div class="max-w-xl rounded-xl px-4 dark:bg-gray-800 bg-gray-100">
                <button class="accordion-btn w-full text-right flex justify-between items-center p-4">
                    <span class="text-base md:text-lg">چگونه می‌توانم سفارشم را لغو کنم؟</span>
                    <svg class="w-5 h-5 rotate-90 duration-300 accordion-icon">
                        <use href="#chevron"></use>
                    </svg>
                </button>
                <div class="accordion-content overflow-hidden transition-all duration-300 ease-in-out max-h-0">
                    <p class="px-4 pb-4 text-gray-600 dark:text-gray-400">اگر سفارش شما در مرحله پردازش باشد، می‌توانید آن را از طریق حساب کاربری خود لغو کنید.</p>
                </div>
            </div>
            <div class="max-w-xl rounded-xl px-4 dark:bg-gray-800 bg-gray-100">
                <button class="accordion-btn w-full text-right flex justify-between items-center p-4">
                    <span class="text-base md:text-lg">مدت زمان ارسال سفارش چقدر است؟</span>
                    <svg class="w-5 h-5 rotate-90 duration-300 accordion-icon">
                        <use href="#chevron"></use>
                    </svg>
                </button>
                <div class="accordion-content overflow-hidden transition-all duration-300 ease-in-out max-h-0">
                    <p class="px-4 pb-4 text-gray-600 dark:text-gray-400">مدت زمان ارسال سفارش بسته به شهر و روش ارسال، بین ۲ تا ۷ روز کاری متغیر است.</p>
                </div>
            </div>
            <div class="max-w-xl rounded-xl px-4 dark:bg-gray-800 bg-gray-100">
                <button class="accordion-btn w-full text-right flex justify-between items-center p-4">
                    <span class="text-base md:text-lg">مدت زمان ارسال سفارش چقدر است؟</span>
                    <svg class="w-5 h-5 rotate-90 duration-300 accordion-icon">
                        <use href="#chevron"></use>
                    </svg>
                </button>
                <div class="accordion-content overflow-hidden transition-all duration-300 ease-in-out max-h-0">
                    <p class="px-4 pb-4 text-gray-600 dark:text-gray-400">مدت زمان ارسال سفارش بسته به شهر و روش ارسال، بین ۲ تا ۷ روز کاری متغیر است.</p>
                </div>
            </div>
        </ul>

    </main>
@endsection
