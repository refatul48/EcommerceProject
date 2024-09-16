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


        <!--Register section start-->
        <section class="login-section py-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-5 col-12 tt-login-img"
                        data-background="{{ asset('backend/assets/images/banner/login.png') }}">
                    </div>
                    <div class="col-lg-5 col-12 bg-white d-flex p-0 tt-login-col shadow">
                        <form class="tt-login-form-wrap p-3 p-md-6 p-lg-6 py-7 w-100" method="POST"
                            action="{{ route('register') }}">
                            @csrf
                            <div class="text-center mb-7">
                                <a href="index.html"><img src="{{ asset('backend/assets/images/logo.png') }}"
                                        alt="logo"></a>
                            </div>
                            <h4 class="mb-3">Get started absolutely free</h4>
                            <p class="fs-xs">Already have an account? <a href="{{ route('login') }}"
                                    class="text-secondary">Sign in</a></p>
                            <div class="row g-3">
                                <div class="col-sm-6">
                                    <div class="input-field">
                                        <input type="text" placeholder="First name" name="firstname" id="firstname"
                                            class="theme-input" required>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="input-field">
                                        <input type="text" placeholder="Last name" name="lastname" id="lastname"
                                            class="theme-input" required>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="input-field">
                                        <input type="email" placeholder="Email" name="email" id="email"
                                            class="theme-input" required>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="input-field">
                                        <input type="phone" placeholder="Phone" name="phone" id="phone"
                                            class="theme-input" value="+88" required>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="input-field check-password">
                                        <input type="password" placeholder="Password" name="password" id="password"
                                            class="theme-input" required>
                                        <span class="eye eye-icon"><i class="fa-solid fa-eye"></i></span>
                                        <span class="eye eye-slash"><i class="fa-solid fa-eye-slash"></i></span>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="input-field check-password">
                                        <input type="password" placeholder="Confirm Password"
                                            name="password_confirmation" id="password_confirmation" class="theme-input"
                                            required>
                                        <span class="eye eye-icon"><i class="fa-solid fa-eye"></i></span>
                                        <span class="eye eye-slash"><i class="fa-solid fa-eye-slash"></i></span>
                                    </div>
                                </div>
                            </div>
                            <div class="row g-4 mt-4">
                                <div class="col-sm-6">
                                    <button type="submit" class="btn btn-primary w-100">Create account</button>
                                </div>
                            </div>
                            <p class="mb-0 fs-xxs mt-4 text-center">By signing up, I agree to <a href="#"
                                    class="text-dark">Terms of Use and Privacy Policy</a></p>
                        </form>

                    </div>
                </div>
            </div>
        </section>
        <!--Register section end-->


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