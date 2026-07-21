@extends('layouts.app')

@section('content')
    <!-- Slider -->
    <div class="px-3 lg:container group w-full mt-4 lg:mt-10">
        <div dir="rtl" class="swiper header-slider h-52 md:h-96 cursor-pointer">
            <div class="swiper-wrapper">
                <a href="shop.html" class="swiper-slide">
                    <img src="{{asset('assets/images/slider/4.webp')}}" class="rounded-xl" alt="">
                </a>
                <a href="shop.html" class="swiper-slide">
                    <img src="{{asset('assets/images/slider/1.jpg')}}" class="rounded-xl" alt="">
                </a>
                <a href="shop.html" class="swiper-slide">
                    <img src="{{asset('assets/images/slider/2.jpg')}}" class="rounded-xl" alt="">
                </a>
                <a href="shop.html" class="swiper-slide">
                    <img src="{{asset('assets/images/slider/3.gif')}}" class="rounded-xl" alt="">
                </a>
            </div>
            <div class="swiper-pagination-wrapper">
                <div class="swiper-pagination"></div>
            </div>

            <!-- Swiper Navigation -->
            <div
                class="absolute z-10 bottom-5 opacity-0 invisible group-hover:opacity-100 transition-all duration-300 group-hover:visible right-6 hidden lg:flex items-center gap-x-2 child:flex-center child:w-9 child:h-9 child:cursor-pointer child:bg-white child:dark:bg-gray-800 child:text-gray-700 child:dark:text-gray-200 child:rounded-full child:shadow child-hover:text-blue-600 child-hover:dark:text-blue-500">
                <button class="button-prev">
                    <svg class="size-5 -rotate-90">
                        <use href="#chevron"/>
                    </svg>
                </button>
                <button class="button-next">
                    <svg class="size-5 rotate-90">
                        <use href="#chevron"/>
                    </svg>
                </button>
            </div>

        </div>
    </div>

    <!-- Main -->
    <main class="relative">
        <!-- CATEGORY -->
        <section class="mx-4 lg:container mt-20">
            <!-- SECTION TITLE -->
            <div
                class="flex flex-col gap-y-4 xs:flex-row items-center justify-between w-full text-center xs:text-start">
                <div class="flex items-center gap-x-2 sm:gap-x-4">
                    <span class="size-12 hidden xs:flex rounded-lg bg-white shadow-lg dark:bg-gray-800 flex-center">
                        <svg class="size-7 text-gray-700 dark:text-gray-100">
                            <use href="#squares"></use>
                        </svg>
                    </span>
                    <div class="space-y-1 md:space-y-1">
                        <h3 class="text-xl md:text-2xl font-MorabbaMedium text-gray-800 dark:text-gray-50">دسـته بندی
                            هـای
                            <span class="text-blue-600 dark:text-blue-500">محبوب</span>
                        </h3>
                        <p class="text-sm text-gray-500 dark:text-gray-300">جدیدترین و بروزترین دسته بندی ها</p>
                    </div>
                </div>
                <div class="w-full xs:w-auto flex justify-center items-center gap-x-2">
                </div>
            </div>
            <!-- ITEMS -->
            <div
                class="flex items-center justify-evenly flex-wrap mt-12 child:mb-8 gap-x-8 child:items-center child:flex-col child:duration-300 child:cursor-pointer child:gap-y-1 child:text-gray-800 child:dark:text-gray-300 child:relative"
            >
                @foreach($productCategories as $category)
                    <a href="{{route('products.index',['category_id'=>[$category->id =>'on']])}}" class="group flex">
                        <img src="{{asset('assets/images/category/5.png')}}"
                             class="w-[100px] h-[100px] lg:w-[120px] lg:h-[120px] object-cover group-hover:grayscale group-hover:opacity-90 duration-300"
                             alt="category1"/>
                        <p class="pt-1 text-sm lg:text-lg line-clamp-1">
                            {{$category->name}}
                        </p>
                    </a>
                @endforeach
            </div>
        </section>

        <!-- Latest products -->
        <section class="mx-4 lg:container mt-10 lg:mt-20">
            <!-- SECTION TITLE -->
            <div
                class="flex flex-col gap-y-4 xs:flex-row items-center justify-between w-full text-center xs:text-start">
                <div class="flex items-center gap-x-2 sm:gap-x-4">
                    <span class="size-12 hidden xs:flex rounded-lg bg-white shadow-lg dark:bg-gray-800 flex-center">
                        <svg class="size-7 text-gray-700 dark:text-gray-100">
                            <use href="#mobile"></use>
                        </svg>
                    </span>
                    <div class="space-y-1 md:space-y-1">
                        <h3 class="text-xl md:text-2xl font-MorabbaMedium text-gray-800 dark:text-gray-50">جدید ترین
                            <span class="text-blue-600 dark:text-blue-500">محصولات</span>
                        </h3>
                        <p class="text-sm text-gray-500 dark:text-gray-300">جدیدترین و بروزترین محصولات</p>
                    </div>
                </div>
                <div class="w-full xs:w-auto flex justify-between xs:justify-end  items-center gap-x-2">
                    <div class="flex items-center gap-x-2">
                        <button class="slider-navigate_btn LatestProducts-prev-slide">
                            <svg class="size-6 -rotate-90">
                                <use href="#chevron"/>
                            </svg>
                        </button>
                        <button class="slider-navigate_btn LatestProducts-next-slide">
                            <svg class="size-6 rotate-90">
                                <use href="#chevron"/>
                            </svg>
                        </button>
                    </div>
                    <a href="{{route('products.index',['sort'=>'newest'])}}"
                       class="group shadow-xl text-sm md:text-base flex gap-x-1.5 items-center px-2 h-10 md:px-3 text-white bg-blue-600 rounded-xl">
                        <p>مشاهده همه</p>
                        <span
                            class="w-7 h-7 rounded-full bg-blue-500 flex-center md:group-hover:-translate-x-1 transition-transform duration-300">
                            <svg class="size-5">
                                <use href="#arrow"/>
                            </svg>
                        </span>
                    </a>
                </div>

            </div>
            <!-- Latest products Slider -->
            <div class="swiper LatestProducts mt-5 w-full">
                <div class="swiper-wrapper py-5">
                    @foreach($newestProducts as $product)
                        @include('components.product')
                    @endforeach
                </div>
            </div>
        </section>

        <!-- Best-selling products -->
        <section class="mx-4 lg:container mt-10 lg:mt-20">
            <!-- SECTION TITLE -->
            <div
                class="flex flex-col gap-y-4 xs:flex-row items-center justify-between w-full text-center xs:text-start">
                <div class="flex items-center gap-x-2 sm:gap-x-4">
                    <span class="size-12 hidden xs:flex rounded-lg bg-white shadow-lg dark:bg-gray-800 flex-center">
                        <svg class="size-7 text-gray-700 dark:text-gray-100">
                            <use href="#mobile"></use>
                        </svg>
                    </span>
                    <div class="space-y-1 md:space-y-1">
                        <h3 class="text-xl md:text-2xl font-MorabbaMedium text-gray-800 dark:text-gray-50">محصولات
                            <span class="text-blue-600 dark:text-blue-500">پرفروش </span>
                        </h3>
                        <p class="text-sm text-gray-500 dark:text-gray-300">جدیدترین و بروزترین محصولات</p>
                    </div>
                </div>
                <div class="w-full xs:w-auto flex justify-between xs:justify-end  items-center gap-x-2">
                    <div class="flex items-center gap-x-2">
                        <button class="slider-navigate_btn BestSelling-prev-slide">
                            <svg class="size-6 -rotate-90">
                                <use href="#chevron"/>
                            </svg>
                        </button>
                        <button class="slider-navigate_btn BestSelling-next-slide">
                            <svg class="size-6 rotate-90">
                                <use href="#chevron"/>
                            </svg>
                        </button>
                    </div>
                    <a href="{{route('products.index',['sort'=>'best_selling'])}}"
                       class="group shadow-xl text-sm md:text-base flex gap-x-1.5 items-center px-2 h-10 md:px-3 text-white bg-blue-600 rounded-xl">
                        <p>مشاهده همه</p>
                        <span
                            class="w-7 h-7 rounded-full bg-blue-500 flex-center md:group-hover:-translate-x-1 transition-transform duration-300">
                            <svg class="size-5">
                                <use href="#arrow"/>
                            </svg>
                        </span>
                    </a>
                </div>

            </div>
            <!-- Latest products Slider -->
            <div class="swiper BestSelling mt-5 w-full">
                <div class="swiper-wrapper py-5">
                    @foreach($bestsellingProducts as $product)
                        @include('components.product')
                    @endforeach
                </div>
            </div>
        </section>

        <!-- Features -->
        <div
            class="container w-full mt-10 lg:mt-20 flex flex-wrap items-center justify-between gap-6 child:text-sm child:gap-y-1 child:cursor-pointer">
            <!-- item -->
            <span class="flex-col items-center justify-center hidden md:flex">
                <img class="w-14 h-14" src="{{asset('assets/images/svg/1.svg')}}" alt="">
                <p class="text-gray-500 dark:text-gray-300">امکان تحویل اکسپرس</p>
            </span>
            <span class="flex flex-col items-center justify-center">
                <img class="w-14 h-14" src="{{asset('assets/images/svg/2.svg')}}" alt="">
                <p class="text-gray-500 dark:text-gray-300">ضمانت اصل بودن کالا</p>
            </span>
            <span class="flex flex-col items-center justify-center">
                <img class="w-14 h-14" src="{{asset('assets/images/svg/3.svg')}}" alt="">
                <p class="text-gray-500 dark:text-gray-300">ضمانت بازگشت کالا</p>
            </span>
            <span class="flex flex-col items-center justify-center">
                <img class="w-14 h-14" src="{{asset('assets/images/svg/4.svg')}}" alt="">
                <p class="text-gray-500 dark:text-gray-300">پشتیبانی 24 ساعته</p>
            </span>
            <span class="flex flex-col items-center justify-center">
                <img class="w-14 h-14" src="{{asset('assets/images/svg/5.svg')}}" alt="">
                <p class="text-gray-500 dark:text-gray-300">امکان پرداخت در محل</p>
            </span>
        </div>
    </main>
@endsection
