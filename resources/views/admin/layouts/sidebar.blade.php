<!-- Start::main-sidebar -->
<aside class="app-sidebar sticky" id="sidebar">

    <!-- Start::main-sidebar-header -->
    <div class="main-sidebar-header">
        <a href="{{route('admin.dashboard.index')}}" class="header-logo">
            <span class="text-primary fs-6 fw-bold">پنل مدیریت</span>
        </a>
    </div>
    <!-- End::main-sidebar-header -->

    <!-- Start::main-sidebar -->
    <div class="main-sidebar simplebar-scrollable-y" id="sidebar-scroll" data-simplebar="init">
        <div class="simplebar-wrapper" style="margin: -8px 0 -80px;">
            <div class="simplebar-height-auto-observer-wrapper">
                <div class="simplebar-height-auto-observer"></div>
            </div>
            <div class="simplebar-mask">
                <div class="simplebar-offset" style="left: 0; bottom: 0;">
                    <div class="simplebar-content-wrapper" tabindex="0" role="region"
                         aria-label="scrollable content" style="height: 100%; overflow: hidden scroll;">
                        <div class="simplebar-content" style="padding: 8px 0 80px;">

                            <!-- Start::nav -->
                            <nav class="main-menu-container nav nav-pills flex-column sub-open active open">
                                <div class="slide-left active open d-none" id="slide-left">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191" width="24" height="24"
                                         viewBox="0 0 24 24">
                                        <path
                                            d="M13.293 6.293 7.586 12l5.707 5.707 1.414-1.414L10.414 12l4.293-4.293z"></path>
                                    </svg>
                                </div>
                                <ul class="main-menu mx-0">
                                    <!-- Start::slide -->
                                    <li class="slide ">
                                        <a href="{{route('admin.dashboard.index')}}"
                                           class="side-menu__item {{activeAdminSidebar('admin.dashboard.index')}} ">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" width="1em"
                                                 height="1em" viewBox="0 0 24 24">
                                                <g fill="none" stroke="currentColor" stroke-linecap="round"
                                                   stroke-linejoin="round" stroke-width="1.5" color="currentColor">
                                                    <path d="m9 22l-.251-3.509a3.259 3.259 0 1 1 6.501 0L15 22"></path>
                                                    <path
                                                        d="M2.352 13.214c-.354-2.298-.53-3.446-.096-4.465s1.398-1.715 3.325-3.108L7.021 4.6C9.418 2.867 10.617 2 12.001 2c1.382 0 2.58.867 4.978 2.6l1.44 1.041c1.927 1.393 2.89 2.09 3.325 3.108c.434 1.019.258 2.167-.095 4.464l-.301 1.96c-.5 3.256-.751 4.884-1.919 5.856S16.554 22 13.14 22h-2.28c-3.415 0-5.122 0-6.29-.971c-1.168-.972-1.418-2.6-1.918-5.857z"></path>
                                                </g>
                                            </svg>
                                            <span class="side-menu__label">داشبورد</span>
                                        </a>
                                    </li>
                                    <!-- End::slide -->

                                    <!-- Start::slide -->
                                    <li class="slide ">
                                        <a href="{{route('admin.users.index')}}"
                                           class="side-menu__item {{activeAdminSidebar(['admin.users.index','admin.users.edit','admin.users.show'])}} ">

                                            <svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" width="1em"
                                                 height="1em" viewBox="0 0 24 24">
                                                <path fill="none" stroke="currentColor" stroke-linecap="round"
                                                      stroke-linejoin="round" stroke-width="1.5"
                                                      d="M13 2h-2C7.229 2 5.343 2 4.172 3.172S3 6.229 3 10v4c0 3.771 0 5.657 1.172 6.828S7.229 22 11 22h2c3.771 0 5.657 0 6.828-1.172S21 17.771 21 14v-4c0-3.771 0-5.657-1.172-6.828S16.771 2 13 2m8 10H3m12-5H9m6 10H9"
                                                      color="currentColor"></path>
                                            </svg>

                                            <span class="side-menu__label">مدیریت کاربران</span>
                                        </a>
                                    </li>
                                    <!-- End::slide -->

                                    <!-- Start::slide -->
                                    <li class="slide  ">
                                        <a href="{{route('admin.orders.index')}}"
                                           class="side-menu__item  {{activeAdminSidebar(['admin.orders.index','admin.orders.show','admin.orders.edit'])}}">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" width="1em"
                                                 height="1em" viewBox="0 0 24 24">
                                                <path fill="none" stroke="currentColor" stroke-linecap="round"
                                                      stroke-linejoin="round" stroke-width="1.5"
                                                      d="M2.5 12c0-4.478 0-6.718 1.391-8.109S7.521 2.5 12 2.5c4.478 0 6.718 0 8.109 1.391S21.5 7.521 21.5 12c0 4.478 0 6.718-1.391 8.109S16.479 21.5 12 21.5c-4.478 0-6.718 0-8.109-1.391S2.5 16.479 2.5 12M11 7h6M7 7h1m-1 5h1m-1 5h1m3-5h6m-6 5h6"
                                                      color="currentColor"></path>
                                            </svg>
                                            <span class="side-menu__label">مدیریت سفارشات</span>
                                        </a>
                                    </li>
                                    <!-- End::slide -->

                                    <!-- Start::slide -->
                                    <li class="slide  ">
                                        <a href="{{route('admin.products.index')}}"
                                           class="side-menu__item {{activeAdminSidebar(['admin.products.index','admin.products.show','admin.products.edit','admin.products.create'])}} ">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon"
                                                 width="1em" height="1em" viewBox="0 0 24 24">
                                                <path fill="none" stroke="currentColor" stroke-linecap="round"
                                                      stroke-linejoin="round" stroke-width="1.5"
                                                      d="M4 11v4c0 3.3 0 4.95 1.025 5.975S7.7 22 11 22h2c3.3 0 4.95 0 5.975-1.025S20 18.3 20 15v-4M3 9c0-.748 0-1.122.201-1.4a1.4 1.4 0 0 1 .549-.44C4.098 7 4.565 7 5.5 7h13c.935 0 1.402 0 1.75.16c.228.106.417.258.549.44C21 7.878 21 8.252 21 9s0 1.121-.201 1.4a1.4 1.4 0 0 1-.549.44c-.348.16-.815.16-1.75.16h-13c-.935 0-1.402 0-1.75-.16a1.4 1.4 0 0 1-.549-.44C3 10.121 3 9.748 3 9m3-5.214C6 2.799 6.8 2 7.786 2h.357A3.857 3.857 0 0 1 12 5.857V7H9.214A3.214 3.214 0 0 1 6 3.786m12 0C18 2.799 17.2 2 16.214 2h-.357A3.857 3.857 0 0 0 12 5.857V7h2.786A3.214 3.214 0 0 0 18 3.786M12 11v11"
                                                      color="currentColor"></path>
                                            </svg>
                                            <span class="side-menu__label">مدیریت محصولات</span>
                                        </a>
                                    </li>
                                    <!-- End::slide -->

                                    <!-- Start::slide -->
                                    <li class="slide ">
                                        <a href="{{route('admin.categories.index')}}"
                                           class="side-menu__item {{activeAdminSidebar(['admin.categories.index','admin.categories.show','admin.categories.edit','admin.categories.create'])}}  ">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" width="1em"
                                                 height="1em" viewBox="0 0 24 24">
                                                <g fill="none" stroke="currentColor" stroke-linecap="round"
                                                   stroke-linejoin="round" stroke-width="1.5" color="currentColor">
                                                    <path
                                                        d="m8.643 3.146l-1.705.788C4.313 5.147 3 5.754 3 6.75s1.313 1.603 3.938 2.816l1.705.788c1.652.764 2.478 1.146 3.357 1.146s1.705-.382 3.357-1.146l1.705-.788C19.687 8.353 21 7.746 21 6.75s-1.313-1.603-3.938-2.816l-1.705-.788C13.705 2.382 12.879 2 12 2s-1.705.382-3.357 1.146"></path>
                                                    <path
                                                        d="M20.788 11.097c.141.199.212.406.212.634c0 .982-1.313 1.58-3.938 2.776l-1.705.777c-1.652.753-2.478 1.13-3.357 1.13s-1.705-.377-3.357-1.13l-1.705-.777C4.313 13.311 3 12.713 3 11.731c0-.228.07-.435.212-.634"></path>
                                                    <path
                                                        d="M20.377 16.266c.415.331.623.661.623 1.052c0 .981-1.313 1.58-3.938 2.776l-1.705.777C13.705 21.624 12.879 22 12 22s-1.705-.376-3.357-1.13l-1.705-.776C4.313 18.898 3 18.299 3 17.318c0-.391.208-.72.623-1.052"></path>
                                                </g>
                                            </svg>
                                            <span class="side-menu__label">مدیریت دسته‌بندی‌ها</span>
                                        </a>
                                    </li>
                                    <!-- End::slide -->

                                    <!-- Start::slide -->
                                    <li class="slide active">
                                        <a href="{{route('admin.admins.index')}}"
                                           class="side-menu__item {{activeAdminSidebar(['admin.admins.index','admin.admins.edit','admin.admins.create'])}}  " >
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                 class="side-menu__icon"
                                                 width="1em"
                                                 height="1em"
                                                 viewBox="0 0 24 24">
                                                <path fill="none" stroke="currentColor" stroke-linecap="round"
                                                      stroke-linejoin="round" stroke-width="1.5"
                                                      d="M12 12a5 5 0 1 0-5-5a5 5 0 0 0 5 5Zm-7 9a7 7 0 0 1 14 0Z"/>
                                            </svg>
                                            <span class="side-menu__label">مدیریت مدیران</span>
                                        </a>
                                    </li>
                                    <!-- End::slide -->
                                    <!-- Start::slide -->
                                    <li class="slide  ">
                                        <a href="{{route('admin.sliders.create')}}"
                                           class="side-menu__item  {{activeAdminSidebar('admin.sliders.create')}}">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" width="1em"
                                                 height="1em" viewBox="0 0 24 24">
                                                <path fill="none" stroke="currentColor" stroke-linecap="round"
                                                      stroke-linejoin="round" stroke-width="1.5"
                                                      d="M2.5 12c0-4.478 0-6.718 1.391-8.109S7.521 2.5 12 2.5c4.478 0 6.718 0 8.109 1.391S21.5 7.521 21.5 12c0 4.478 0 6.718-1.391 8.109S16.479 21.5 12 21.5c-4.478 0-6.718 0-8.109-1.391S2.5 16.479 2.5 12M11 7h6M7 7h1m-1 5h1m-1 5h1m3-5h6m-6 5h6"
                                                      color="currentColor"></path>
                                            </svg>
                                            <span class="side-menu__label">افزودن اسلایدر</span>
                                        </a>
                                    </li>
                                    <!-- End::slide -->
                                </ul>
                                <div class="slide-right d-none" id="slide-right">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191" width="24" height="24"
                                         viewBox="0 0 24 24">
                                        <path
                                            d="M10.707 17.707 16.414 12l-5.707-5.707-1.414 1.414L13.586 12l-4.293 4.293z"></path>
                                    </svg>
                                </div>
                            </nav>
                            <!-- End::nav -->

                        </div>
                    </div>
                </div>
            </div>
            <div class="simplebar-placeholder" style="width: 239px; height: 1578px;"></div>
        </div>
        <div class="simplebar-track simplebar-horizontal" style="visibility: hidden;">
            <div class="simplebar-scrollbar" style="width: 0; display: none;"></div>
        </div>
        <div class="simplebar-track simplebar-vertical" style="visibility: visible;">
            <div class="simplebar-scrollbar"
                 style="height: 568px; transform: translate3d(0px, 0px, 0px); display: block;"></div>
        </div>
    </div>
    <!-- End::main-sidebar -->

</aside>
<!-- End::main-sidebar -->
