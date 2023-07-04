<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description"
        content="An impressive and flawless site template that includes various UI elements and countless features, attractive ready-made blocks and rich pages, basically everything you need to create a unique and professional website.">
    <meta name="keywords"
        content="bootstrap 5, business, corporate, creative, gulp, marketing, minimal, modern, multipurpose, one page, responsive, saas, sass, seo, startup, html5 template, site template">
    <meta name="author" content="elemis">
    <title>Login</title>
    <link rel="shortcut icon" href="./assets/img/favicon.png">
    <link rel="stylesheet" href="{{ asset('css/plugins.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <style>
        .image-wrapper:not(.mobile) {
            background-attachment: unset !important;
        }
    </style>
</head>

<body>
    <div class="content-wrapper">
        <img src="{{ asset('img/_banner.jpg') }}" alt="" width="100%">
        <section class="wrapper image-wrapper bg-image bg-overlay bg-overlay-light-600 text-white">
            <div class="container pt-10 pb-15 pt-md-15 pb-md-20 text-center">
                <div class="row">
                    <div class="col-lg-8 mx-auto">
                        {{-- <h1 class="display-1 mb-3">Sign In</h1> --}}
                    </div>
                </div>
            </div>
        </section>
        <section class="wrapper bg-light">
            <div class="container pb-14 pb-md-16">
                <div class="row">
                    <div class="col-lg-7 col-xl-6 col-xxl-5 mx-auto mt-n20">
                        <div class="card">
                            <div class="card-body p-11 text-center">
                                <h2 class="mb-3 text-start">สวัสดี</h2>
                                <p class="lead mb-6 text-start">กรุณากรอกอีเมล และรหัสการเข้าใช้งานตามที่ท่านได้สมัครไว้
                                </p>
                                <form method="POST" action="{{ route('login') }}">
                                    @csrf
                                    <div class="form-floating mb-4">
                                        <input type="email" class="form-control" placeholder="อีเมล" id="email"
                                            name="email">
                                        <label for="email">อีเมล</label>
                                    </div>
                                    <div class="form-floating password-field mb-4">
                                        <input type="password" class="form-control" placeholder="รหัสผ่าน"
                                            id="password" name="password">
                                        <span class="password-toggle"><i class="uil uil-eye"></i></span>
                                        <label for="password">รหัสผ่าน</label>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <button class="btn btn-primary rounded-pill btn-login w-100 mb-2"
                                                type="submit">เข้าสู่ระบบ</button>
                                        </div>
                                        <div class="col-6 pe-1">
                                            <a href="https://docs.google.com/forms/d/e/1FAIpQLScmQoMUZs_qr1HwfF7W9ieIRKLf2g5KiC05ct8qKmV-WPBlAA/viewform" class="btn btn-info rounded-pill btn-login w-100 mb-2">ลงทะเบียน</a>
                                        </div>
                                        <div class="col-6 ps-1">
                                            <button class="btn btn-secondary rounded-pill btn-login w-100 mb-2"
                                                type="button" onclick="sendPassword(this)">ลืมรหัสผ่าน</button>
                                        </div>
                                    </div>
                                    @if (!empty($errors->all()))
                                        @foreach ($errors->all() as $error)
                                            <p>{{ $error }}</p>
                                        @endforeach
                                    @endif
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
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
    <div class="progress-wrap">
        <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
            <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
        </svg>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('js/plugins.js') }}"></script>
    <script src="{{ asset('js/theme.js') }}"></script>
    <script>
        function sendPassword(e) {
            let url = "{!! route('sent-password') !!}";
            let token = $('meta[name="csrf-token"]').attr('content');
            Swal.fire({
                title: 'กรุณากรอกอีเมลที่ท่านใช้สมัคร',
                input: 'email',
                inputAttributes: {
                    autocapitalize: 'off'
                },
                showCancelButton: true,
                confirmButtonText: 'ตกลง',
                cancelButtonText: 'ยกเลิก',
                showLoaderOnConfirm: true,
                preConfirm: (email) => {
                    return $.ajax({
                        url: url,
                        type: 'POST',
                        data: {
                            _token: token,
                            email: email
                        },
                        success: function(response) {
                            console.log(response);
                            if (response == true) {
                                return response;
                            } else {
                                Swal.showValidationMessage(response);
                            }
                        }
                    })
                },
                allowOutsideClick: () => !Swal.isLoading()
            }).then((result) => {
                console.log(result);
                if (result.isConfirmed) {
                    Swal.fire({
                        icon: 'success',
                        title: 'ส่งรหัสผ่านอีกครั้งเรียบร้อยแล้ว',
                        showConfirmButton: false,
                        timer: 2000
                    })
                } else {
                    Swal.close();
                }
            })
        }
    </script>
</body>

</html>
