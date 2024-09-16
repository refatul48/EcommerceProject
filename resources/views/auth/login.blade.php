<!DOCTYPE html>
<html lang="en" data-bs-theme="light">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Meta -->
    <meta name="description"
        content="Grostore Grocery eCommerce html template. Multivendor responsive eCommerce template">
    <meta name="author" content="ThemeTags">
    <meta name="keywords"
        content="Grostore Grocery ecommerce, admin template, online shop, e-commerce, ecommerce template, marketplace, modern, responsive, business, mobile, bootstrap, html5, css3, js, gallery, slider, touch, creative, clean">

    <!-- Favicon icon -->
    <link rel="icon" href="{{ asset('backend/assets/images/favicon.png') }}" type="image/png" sizes="16x16">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
        integrity="sha384-k6RqeWeci5ZR/Lv4MR0sA0FfDOM5Ddb58J2A4nUQ4jc8HfZZshU5OZl+lwq1lUhX" crossorigin="anonymous">


    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('backend/assets/fontawesome/css/all.min.css') }}">


    <!-- Title -->
    <title>Medicine Store</title>

    <!-- Build:css -->
    <link rel="stylesheet" href="{{ asset('backend/assets/css/demo1/main.css') }}">
    <!-- Endbuild -->

</head>

<body>



    <div class="main-wrapper">


        <!--login section start-->
        <section class="login-section py-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-5 col-12 tt-login-img"
                        data-background="{{ asset('backend/assets/images/banner/login.png') }}">
                    </div>
                    <div class="col-lg-5 col-12 bg-white d-flex p-0 tt-login-col shadow">
                        <form class="tt-login-form-wrap p-3 p-md-6 p-lg-6 py-7 w-100" method="POST"
                            action="{{ route('login') }}">
                            @csrf
                            <div class="mb-7">
                                <a href="index.html">
                                    <img src="{{ asset('backend/assets/images/logo.png') }}" alt="logo">
                                </a>
                            </div>
                            <h2 class="mb-4 h3">Hey there! <br>Welcome back <span class="text-secondary">Medicine
                                    Store</span></h2>
                            <div class="row g-3">
                                <div class="col-sm-12">
                                    <div class="input-field">
                                        <label class="fw-bold text-dark fs-sm mb-1">Email</label>
                                        <input type="email" name="email" placeholder="Enter your email"
                                            class="theme-input" required>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="input-field check-password">
                                        <label class="fw-bold text-dark fs-sm mb-1">Password</label>
                                        <div class="check-password">
                                            <input type="password" name="password" placeholder="Password"
                                                class="theme-input" required>
                                            <span class="eye eye-icon">
                                                <i class="fa-solid fa-eye"></i>
                                            </span>
                                            <span class="eye eye-slash">
                                                <i class="fa-solid fa-eye-slash"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex align-items-center justify-content-between mt-4">
                                <div class="checkbox d-inline-flex align-items-center gap-2">
                                    <div class="theme-checkbox flex-shrink-0">
                                        <input type="checkbox" id="save-password" name="remember">
                                        <span class="checkbox-field">
                                            <i class="fa-solid fa-check"></i>
                                        </span>
                                    </div>
                                    <label class="save-password fs-sm" for="save-password">Remember for 30 days</label>
                                </div>
                                <a href="#" class="fs-sm">Forgot Password</a>
                            </div>


                            <div class="row g-4 mt-4">
                                <div class="col-sm-6">
                                    <button type="submit" class="btn btn-primary w-100">Sign In</button>
                                </div>
                            </div>


                            <p class="mb-0 fs-xs mt-4">Don't have an Account? <a href="{{ route('register') }}">Sign
                                    Up</a></p>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <!--login section end-->


    </div>

    <!-- Scroll bottom to top button start -->
    <button class="scroll-top-btn">
        <i class="far fa-hand-pointer"></i>
    </button>
    <!-- Scroll bottom to top button end -->

    <!-- Font Awesome JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/js/all.min.js"></script>
    <script src="{{ asset('backend/assets/fontawesome/js/all.js') }}"></script>
    <!-- Your other JS files -->

    <!-- Build:js -->
    <script src="{{ asset('backend/assets/js/vendors/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('backend/assets/js/vendors/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('backend/assets/js/vendors/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('backend/assets/js/vendors/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('backend/assets/js/vendors/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('backend/assets/js/vendors/simplebar.min.js') }}"></script>
    <script src="{{ asset('backend/assets/js/vendors/parallax-scroll.js') }}"></script>
    <script src="{{ asset('backend/assets/js/vendors/isotop.pkgd.min.js') }}"></script>
    <script src="{{ asset('backend/assets/js/vendors/countdown.min.js') }}"></script>
    <script src="{{ asset('backend/assets/js/vendors/range-slider.js') }}"></script>
    <script src="{{ asset('backend/assets/js/vendors/waypoints.js') }}"></script>
    <script src="{{ asset('backend/assets/js/vendors/counterup.min.js') }}"></script>
    <script src="{{ asset('backend/assets/js/vendors/typer.js') }}"></script>
    <script src="{{ asset('backend/assets/js/app.js') }}"></script>
    <!-- Endbuild -->
</body>

</html>