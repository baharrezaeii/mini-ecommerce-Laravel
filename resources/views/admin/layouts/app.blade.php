<!DOCTYPE html>

<html
    lang="fa"
    data-nav-layout="vertical"
    data-theme-mode="light"
    data-header-styles="light"
    data-menu-styles="light"
    dir="rtl"
    loader="enable"
    data-vertical-style="default">
<head>
    <!-- Meta Data -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>
        پنل مدیریت
        @isset($title)
            |
            {{$title}}
        @endisset
     </title>


    <meta name="csrf-token" content="G3faz5te2OVLWMw1sn2U47RRUgVWPGJznIyOIEMM">

    <!-- Favicon -->
    <link rel="icon" href="/assets/admin/images/brand-logos/favicon.ico" type="image/x-icon">

    <!-- Start::Styles -->

    <!-- Choices JS -->
    <script src="{{asset('assets/admin/js/choices.min.js')}}"></script>

    <!-- Main Theme Js -->
    <script src="{{asset('assets/admin/js/main.js')}}"></script>

    <link href="{{asset('assets/admin/css/bootstrap.rtl.min.css')}}" id="style" rel="stylesheet">

    <!-- Style Css -->
    <link href="{{asset('assets/admin/css/styles.css')}}" rel="stylesheet">

    <!-- Icons Css -->
    <link href="{{asset('assets/admin/css/icons.css')}}" rel="stylesheet">

    <!-- Node Waves Css -->
    <link href="{{asset('assets/admin/css/waves.min.css')}}" rel="stylesheet">

    <!-- Simplebar Css -->
    <link href="{{asset('assets/admin/css/simplebar.min.css')}}" rel="stylesheet">

    <!-- Color Picker Css -->
    <link rel="stylesheet" href="{{asset('assets/admin/css/nano.min.css')}}">

    <!-- Choices Css -->
    <link rel="stylesheet" href="{{asset('assets/admin/css/choices.min.css')}}">

    <!-- FlatPickr CSS -->
    <link rel="stylesheet" href="{{asset('assets/admin/css/flatpickr.min.css')}}">

    <!-- Auto Complete CSS -->
    <link rel="stylesheet" href="{{asset('assets/admin/css/autoComplete.css')}}">

    <!-- Prism CSS -->
    <link rel="stylesheet" href="{{asset('assets/admin/plugins/prismjs/themes/prism-coy.min.css')}}">

    <link rel="stylesheet" href="{{asset('assets/admin/plugins/dropzone/dropzone.css')}}">

    <!-- Persian Datepicker -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/persian-datepicker@1.2.0/dist/css/persian-datepicker.min.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/choices.js/public/assets/styles/choices.min.css"/>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body @class(['authentication-background' => isset($rawLayout)])>

<!-- Loader -->
<div id="loader" class="d-none">
    <img src="{{asset('assets/admin/images/media/loader.svg')}}" alt="">
</div>
<!-- Loader -->

<!-- page -->
<div class="page">
@includeUnless(isset($rawLayout),'admin.layouts.header')

@includeUnless(isset($rawLayout),'admin.layouts.sidebar')

    <!-- Start::app-content -->

    <div  @class([
    'main-content',
    'app-content ' => !isset($rawLayout),
    ])
    >
        @yield('content')
    </div>

    <!-- End::app-content -->
    @includeUnless(isset($rawLayout),'admin.layouts.footer')

</div>
<!-- End Page -->

<!-- Scroll To Top -->
<div class="scrollToTop" style="display: none;">
    <span class="arrow lh-1"><i class="ri-rocket-line align-middle fs-18"></i></span>
</div>
<div id="responsive-overlay"></div>
<!-- Scroll To Top -->

<!-- Persian Date Library -->
<script src="https://cdn.jsdelivr.net/npm/persian-date/dist/persian-date.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/persian-datepicker@1.2.0/dist/js/persian-datepicker.min.js"></script>

<!-- Popper JS -->
<script src="{{asset('assets/admin/js/popper.min.js')}}"></script>

<!-- Bootstrap JS -->
<script src="{{asset('assets/admin/js/bootstrap.bundle.min.js')}}"></script>

<!-- Defaultmenu JS -->
<script src="{{asset('assets/admin/js/defaultmenu.js')}}"></script>

<!-- Node Waves JS -->
<script src="{{asset('assets/admin/js/waves.min.js')}}"></script>

<!-- Sticky JS -->
<script src="{{asset('assets/admin/js/sticky.js')}}"></script>

<!-- Color Picker JS -->
<script src="{{asset('assets/admin/js/pickr.es5.min.js')}}"></script>

<!-- Date & Time Picker JS -->
<script src="{{asset('assets/admin/js/flatpickr.min.js')}}"></script>

<!-- Custom-Switcher JS -->
<script src="{{asset('assets/admin/js/custom-switcher.js')}}"></script>

<!-- Custom JS -->
<script src="{{asset('assets/admin/js/custom.js')}}"></script>

<script>
    document.addEventListener("DOMContentLoaded", function () {

        // ===== Choices =====
        const choicesEl = document.querySelector('#choices-single-default');
        if (choicesEl && window.Choices) {

            const choices = new Choices(choicesEl, {
                allowHTML: true,
                searchEnabled: false,
                shouldSort: false,
                itemSelectText: '',
                placeholder: true,
                placeholderValue: 'مرتب‌سازی بر اساس'
            });
            if (choicesEl) {
                choicesEl.addEventListener('change', function () {
                    if (this.form) this.form.submit();
                });
            }
        }

        // ===== ApexCharts =====
        const charts = document.querySelectorAll(".apex-chart");
        charts.forEach(chartEl => {
            if (chartEl) {
                const options = chartEl.dataset.options ? JSON.parse(chartEl.dataset.options) : {};
                const chart = new ApexCharts(chartEl, options);
                chart.render();
            }
        });

        // ===== Popper Example =====
        const popperRefs = document.querySelectorAll("[data-popper-ref]");
        popperRefs.forEach(ref => {
            const targetId = ref.getAttribute("data-popper-target");
            const popperEl = document.getElementById(targetId);
            if (popperEl) {
                Popper.createPopper(ref, popperEl, {
                    placement: 'bottom'
                });
            }
        });

    });
</script>

</body>
</html>
