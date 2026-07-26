<!-- Start::main-header -->
<header class="app-header sticky" id="header">

    <!-- Start::main-header-container -->
    <div class="main-header-container container-fluid">

        <!-- Start::header-content-left -->
        <div class="header-content-left">

            <!-- Start::header-element -->
            <div class="header-element mx-lg-0 me-2 d-lg-none">
                <a aria-label="Hide Sidebar" class="sidemenu-toggle header-link" data-bs-toggle="sidebar"
                   href="javascript:void(0);">
                    <svg xmlns="http://www.w3.org/2000/svg" class="header-link-icon menu-btn" width="24" height="24"
                         viewBox="0 0 24 24">
                        <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                              stroke-width="1.5" d="M4 5h12M4 12h16M4 19h8" color="currentColor"></path>
                    </svg>
                    <svg xmlns="http://www.w3.org/2000/svg" class="header-link-icon menu-btn-close" width="24"
                         height="24" viewBox="0 0 24 24">
                        <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                              stroke-width="1.5" d="m18 6l-6 6m0 0l-6 6m6-6l6 6m-6-6L6 6"
                              color="currentColor">

                        </path>
                    </svg>
                </a>
            </div>
            <!-- End::header-element -->

            <!-- Start::header-element -->
            <div class="header-element">
                <div class="horizontal-logo">
                    <a href="{{route('admin.dashboard.index')}}" class="header-logo">
                        <span class="text-primary fs-6 fw-bold">پنل مدیریت</span>
                    </a>
                </div>
            </div>
            <!-- End::header-element -->

            <!-- Start::header-element -->
            <div class="header-element header-search d-md-block d-none my-auto">
                    @yield('breadcrumb')
                </div>

            <!-- End::header-element -->

        </div>
        <!-- End::header-content-left -->

        <!-- Start::header-content-right -->
        <ul class="header-content-right">

            <!-- Start::header-element -->
            <li class="header-element header-theme-mode">
                <!-- Start::header-link|layout-setting -->
                <a href="javascript:void(0);" class="header-link layout-setting">
								<span class="light-layout">
									<!-- Start::header-link-icon -->
									<svg xmlns="http://www.w3.org/2000/svg" class="header-link-icon" width="1em"
                                         height="1em" viewBox="0 0 24 24">
                                        <path fill="none" stroke="currentColor"
                                              stroke-linecap="round"
                                              stroke-linejoin="round"
                                              stroke-width="1.5"
                                              d="M21.5 14.078A8.557 8.557 0 0 1 9.922 2.5C5.668 3.497 2.5 7.315 2.5 11.873a9.627 9.627 0 0 0 9.627 9.627c4.558 0 8.376-3.168 9.373-7.422"
                                              color="currentColor"></path>
                                    </svg>
                                    <!-- End::header-link-icon -->
								</span>
                    <span class="dark-layout">
									<!-- Start::header-link-icon -->
									<svg xmlns="http://www.w3.org/2000/svg" class="header-link-icon" width="1em"
                                         height="1em" viewBox="0 0 24 24">
                                        <path fill="none" stroke="currentColor"
                                              stroke-linecap="round"
                                              stroke-linejoin="round"
                                              stroke-width="1.5"
                                              d="M17 12a5 5 0 1 1-10 0a5 5 0 0 1 10 0M12 2v1.5m0 17V22m7.07-2.929l-1.06-1.06M5.99 5.989L4.928 4.93M22 12h-1.5m-17 0H2m17.071-7.071l-1.06 1.06M5.99 18.011l-1.06 1.06"
                                              color="currentColor"></path>
                                    </svg>
                        <!-- End::header-link-icon -->
								</span>
                </a>
                <!-- End::header-link|layout-setting -->
            </li>
            <!-- End::header-element -->


            <!-- Start::header-element -->
            <li class="header-element dropdown">
                <!-- Start::header-link|dropdown-toggle -->
                <a href="javascript:void(0);" class="header-link dropdown-toggle" id="mainHeaderProfile"
                   data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">
                    <div class="d-flex align-items-center">
                        <div>
                            <img
                                src="{{asset('assets/admin/images/faces/DefaultAvatar.jpg')}}"
                                alt="img"
                                class="avatar avatar-sm avatar-rounded">
                        </div>
                    </div>
                </a>
                <!-- End::header-link|dropdown-toggle -->
                <ul class="main-header-dropdown dropdown-menu pt-0 overflow-hidden header-profile-dropdown dropdown-menu-end"
                    aria-labelledby="mainHeaderProfile">
                    <li class="p-3 border-bottom">
                        <div class="d-flex align-items-center">
                            <div>
                                <p class="mb-0 fw-semibold lh-1">{{auth('admin')->user()->full_name}}</p>
                                <span class="fs-11 text-muted">{{auth('admin')->user()->username}}</span>
                            </div>
                        </div>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li>
                        <a class="dropdown-item d-flex align-items-center text-danger px-3"
                           href="{{route('admin.auth.logout')}}">
                            <i
                                class="ri-logout-circle-line fs-15 me-2 text-danger fw-normal"
                                style="position: relative; top: -2px"
                            ></i>
                            خروج
                        </a>
                    </li>
                </ul>
            </li>
            <!-- End::header-element -->


        </ul>
        <!-- End::header-content-right -->
    </div>

    <!-- End::main-header-container -->

</header>
<!-- End::main-header -->
