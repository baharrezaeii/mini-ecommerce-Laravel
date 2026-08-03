@extends('layouts.app')
@section('content')
    <div
        class="container py-12">

        <h3 class="text-xl md:text-2xl font-MorabbaMedium text-gray-800 dark:text-gray-50">دسـته بندی

            <span class="text-blue-600 dark:text-blue-500">محصولات</span>
        </h3>



        <div
            class="flex items-center justify-evenly flex-wrap mt-12 child:mb-8 gap-x-8 child:items-center child:flex-col child:duration-300 child:cursor-pointer child:gap-y-1 child:text-gray-800 child:dark:text-gray-300 child:relative">

            @foreach($categories as $category)

                <a href="#"
                   class="border rounded-xl p-5 text-center">

                    {{ $category->name }}

                </a>

            @endforeach

        </div>

    </div>
@endsection
