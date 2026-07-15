<!doctype html>
<html lang="fa" dir="rtl">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>
        فروشگاه درنیکا
        | صفحه اصلی
    </title>

    <link rel="stylesheet" href="{{asset('assets/styles/app.css')}}">
    <link rel="stylesheet" href="{{asset('assets/swiper/swiper.css')}}">


    <!-- ==========================  DARK MODE SCRIPT ============================= -->
    <script type="text/javascript">
        if (
            localStorage.theme === "dark" ||
            (!("theme" in localStorage) &&
                window.matchMedia("(prefers-color-scheme: dark)").matches)
        ) {
            document.documentElement.classList.add("dark");
        } else {
            document.documentElement.classList.remove("dark");
        }
    </script>
</head>

<body>

@include('layouts.icons')

@includeUnless(isset($withoutHeader),'layouts.header')

@yield('content')

@includeUnless(isset($withoutFooter),'layouts.footer')
<!-- Overlay -->
<div class="overlay"></div>
<div class="search-overlay"></div>

<script src="{{asset('assets/scripts/jquery-4.0.0.min.js')}}"></script>
<script src="{{asset('assets/swiper/swiper.js')}}"></script>
<script src="{{asset('assets/scripts/app.js')}}"></script>
<script type="module" src="{{asset('assets/scripts/slider.js')}}"></script>



</body>
</html>

