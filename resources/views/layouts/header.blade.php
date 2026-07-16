<header class="header">
    <!-- Desktop -->
    <div class="container mt-5 hidden flex-col gap-y-6 lg:flex">
        <!-- TOPBAR -->
        <div class="flex-between">
            <!-- Search Box -->
            <div class="relative z-20">
                <form action="http://127.0.0.1:8000/products">
                    <!-- INPUT -->
                    <div
                        class="search-btn-open flex gap-x-2 app-border bg-gray-50 dark:bg-gray-700 p-1 rounded-full cursor-pointer ring-blue-400 w-84 transition-all"
                    >
                        <button type="submit">
                            <svg class="size-6 p-1.5 flex-center text-gray-100 bg-blue-600 rounded-full w-9 h-9">
                                <use href="#search"/>
                            </svg>
                        </button>

                        <input
                            placeholder="جستجو در محصولات..."
                            type="text"
                            name="keyword"
                            value=""
                            style="border: 0"
                        />
                    </div>
                </form>
            </div>
            <!-- Logo -->
            <a href="{{route('index')}}" class="flex flex-col text-center ml-20">
                    <span class="font-MorabbaMedium text-4xl flex items-center">
                        فروشگاه<span class="text-blue-500">درنیکا</span>
                    </span>
                <p class="font-DanaMedium text-gray-400"> خرید موبایل و لپ‌تاپ</p>
            </a>
            <!--  Action -->
            <div class="flex items-center gap-x-3">
                @auth()
                    <!-- Account Btn -->
                    <button class="group relative flex-center py-2 px-4 app-border rounded-full app-hover delay-75">
                        <a href="" class="flex items-center gap-x-1">
                            <svg class="size-5">
                                <use href="#user"/>
                            </svg>
                            <p>حساب کاربری</p>
                        </a>
                        <div
                            class="absolute dark:border-none border border-gray-100 w-52 p-2 bg-white text-gray-900 dark:text-gray-100 flex flex-col gap-y-3 opacity-0 invisible group-hover:opacity-100 group-hover:visible group-hover:top-12 transition-all delay-100 dark:bg-gray-700 top-20 rounded-lg text-base shadow child:transition-all duration-300 child:py-1.5 child:px-2 z-30 child:rounded-lg child:w-full">
                            <a href="{{route('account.orders')}}"
                               class="flex items-center gap-x-2  hover:bg-blue-500 hover:text-gray-100">
                                <svg class="h-5 w-5">
                                    <use href="#user"></use>
                                </svg>
                                سفارشات من
                            </a>
                            <a href="{{route('account.edit-profile.index')}}"
                               class="flex items-center gap-x-2  hover:bg-blue-500 hover:text-gray-100">
                                <svg class="h-5 w-5">
                                    <use href="#cog"></use>
                                </svg>
                                اطلاعات کاربری
                            </a>
                            <a href="{{route('auth.logout.index')}}"
                               class="flex items-center gap-x-2  hover:bg-red-500 dark:hover:bg-red-500 hover:text-gray-100">
                                <svg class="h-5 w-5">
                                    <use href="#arrow-left-end"></use>
                                </svg>
                                خروج از حساب
                            </a>
                        </div>
                    </button>
                @else
                    <!-- LOGIN -->
                    <button class="flex-center py-2 px-4  app-border rounded-full app-hover">
                        <a href="{{route('auth.login.index')}}" class="flex items-center gap-x-2">
                            <p>ورود | ثبت‌نام</p>
                            <svg class="size-5">
                                <use href="#arrow-left-end"/>
                            </svg>
                        </a>
                    </button>
                @endauth

                <!-- Toggle theme -->
                <button class="toggle-theme flex-center p-2 app-border rounded-full app-hover">
                    <svg class="inline-block dark:hidden size-6">
                        <use href="#moon"/>
                    </svg>
                    <svg class="hidden dark:inline size-6">
                        <use href="#sun"/>
                    </svg>
                </button>
                <!-- Shopping cart -->
                <a href="http://127.0.0.1:8000/cart"
                   class="flex-center p-2 bg-blue-600 text-gray-100 rounded-full open-cart relative">
                    <svg class="size-6">
                        <use href="#shopping-bag"/>
                    </svg>
                    <span class="absolute -top-1 -right-1 flex h-4 w-4">
                        <span
                            class="animate-ping absolute inline-flex h-full w-full rounded-full bg-red-600 opacity-75">

                        </span>
                        <span
                            class="relative inline-flex rounded-full h-4 w-4 bg-red-500 text-xs pt-1 flex-center text-white">
                            1
                        </span>
                    </span>
                </a>
            </div>
        </div>
        @include('layouts.navbar')
    </div>

</header>

