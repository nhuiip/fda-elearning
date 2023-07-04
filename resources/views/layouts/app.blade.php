<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {{-- <meta charset="utf-8"> --}}
    {{-- <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/> --}}
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description"
        content="An impressive and flawless site template that includes various UI elements and countless features, attractive ready-made blocks and rich pages, basically everything you need to create a unique and professional website.">
    <meta name="keywords"
        content="bootstrap 5, business, corporate, creative, gulp, marketing, minimal, modern, multipurpose, one page, responsive, saas, sass, seo, startup, html5 template, site template">
    <meta name="author" content="elemis">
    <title>@yield('title')</title>
    <link rel="shortcut icon" href="./assets/img/favicon.png">
    <link rel="stylesheet" href="{{ asset('css/font-awesome.css') }}">
    <link rel="stylesheet" href="{{ asset('css/plugins.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/colors/navy.css') }}">
    <x-embed-styles />
    <style>
        /* body {
            background-color: #f1dfd3 !important;
        } */
    </style>
    @yield('css')
</head>

<body>
    <div class="content-wrapper">
        <nav class="navbar navbar-expand-lg bg-light">
            <div class="container">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mb-2 mb-lg-0 ms-lg-auto">
                        <li class="nav-item">
                            <a class="nav-link  @if (Route::is('home')) active @endif" aria-current="page"
                                href="{{ route('home') }}">หมวดการเรียนรู้</a>
                        </li>
                        @if (Auth::user()->passed)
                            <li class="nav-item">
                                <a class="nav-link" aria-current="page" href="{{ route('pdf') }}">ดาวน์โหลดใบรับรอง</a>
                            </li>
                        @endif
                        <li class="nav-item">
                            <a class="nav-link" href="">ยินดีต้อนรับ, {{ Auth::user()->name }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page"
                                onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();"><i
                                    data-feather="log-in">ออกจากระบบ</a>
                        </li>
                    </ul>
                </div>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
        </nav>
        <section class="wrapper image-wrapper bg-cover bg-image bg-xs-none bg-gray">
            <img src="{{ asset('img/_banner.jpg') }}" alt="" width="100%">
        </section>
        <section class="wrapper bg-light">
            <div class="container pt-5 pt-md-10 pb-10 pb-md-15">
                @yield('content')
            </div>
        </section>
        <footer class="text-inverse" style="background-color: #f1dfd3">
            <div class="container pt-5 pt-md-10 pb-5 pb-md-10">
                <div class="row gy-6 gy-lg-0">
                    <div class="col-md-4 col-lg-3">
                        <div class="widget">
                            <p class="mb-4 text-black-50">© 2023 FDA. <br class="d-none d-lg-block">All rights
                                reserved.</p>
                        </div>
                    </div>
                    <div class="col-md-8 col-lg-9">
                        <div class="widget text-black-50">
                            <address class="pe-xl-10 pe-xxl-15 text-black-50">งานมาตรฐานสถานที่ กลุ่มกำกับดูแลหลังออกสู่ตลาด กองผลิตภัณฑ์สมุนไพร</address>
                            <a href="mailto:saraban@fda.moph.go.th" class="text-black-50">warisa.yangngan@gmail.com</a><br>
                            025907164
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>
    <div class="progress-wrap">
        <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
            <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
        </svg>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="{{ asset('js/plugins.js') }}"></script>
    <script src="{{ asset('js/theme.js') }}"></script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>
    @yield('js')
</body>

</html>
