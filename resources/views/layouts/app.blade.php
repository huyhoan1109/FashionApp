<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta http-equiv="refresh" content="{{ config('session.lifetime')}}">
        <title>Nike</title>
        <link rel="icon" type="image/x-icon" href="{{ asset('assets/imgs/logo/logo.png') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/clicky-menu.css') }}">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
        <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.min.css'>
        <style type="text/css">
            .my-active span{
                background-color: #5cb85c !important;
                color: white !important;
                border-color: #5cb85c !important;
            }
            ul.pager>li {
                display: inline-flex;
                padding: 5px;
            }
        </style>
        @livewireStyles
    </head>
    <body>
    @include('sweetalert::alert')
    <header class="header-area header-style-1 header-height-2">
        <div class="header-top header-top-ptb-1 d-none d-lg-block">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-xl-3 col-lg-4">
                        <div class="header-info">
                            <ul>
                                <li>
                                    <a class="language-dropdown-active" href=""> 
                                        <i class="fi-rs-world"></i> English <i class="fi-rs-angle-small-down"></i>
                                    </a>
                                    <!-- <ul class="language-dropdown">
                                    </ul> -->
                                </li>                                
                            </ul>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-4">
                        <div class="text-center">
                            <div id="news-flash" class="d-inline-block">
                                <ul>
                                    <li>Super Value Deals - Save more with coupons <a href="{{ route('shop') }}">Shop now</a></li>
                                    <li>Discover our new products now <a href="{{ route('shop') }}">Shop now</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    @if (Route::has('login'))
                        @auth
                            <div class="header-info header-info-right">
                                <ul>                                
                                    <li>
                                        <a href= "{{ route('user.show') }}"> {{ Auth::user()->email }} </a>
                                        /
                                        <a href= "{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('frm-logout').submit();">
                                            Log Out 
                                        </a>
                                        <form id="frm-logout" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        @else
                            <div class="col-xl-3 col-lg-4">
                                <div class="header-info header-info-right">
                                    <ul>                                
                                        <li>
                                            <i class="fi-rs-key"></i><a href= "{{ route('login') }}">Log In </a>  / <a href="{{ route('register') }}">Sign Up</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        @endauth
                    @endif
                </div>
            </div>
        </div>
        <div class="header-middle header-middle-ptb-1 d-none d-lg-block">
            <div class="container">
                <div class="header-wrap">
                    <div class="logo logo-width-1">
                        <a href="{{ route('home') }}"><img width="10%" height="10%" src="{{ asset('assets/imgs/logo/logo-black.png') }}"></a>
                    </div>
                    <div class="header-right">
                        @livewire('search-component')
                        <div class="header-action-right">
                            <div class="header-action-2">
                                @livewire('wishlist-icon-component')
                                @livewire('cart-icon-component')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-bottom header-bottom-bg-color sticky-bar">
            <div class="container">
                <div class="header-wrap header-space-between position-relative">
                    <div class="logo logo-width-1 d-block d-lg-none">
                        <a href="{{ route('home') }}"><img src="{{ asset('assets/imgs/logo/logo.png') }} " alt="logo"></a>
                    </div>
                    <div class="main-menu main-menu-padding-1 main-menu-lh-2 d-none d-lg-block">
                        <nav>
                            <ul>
                                <li><a href=" {{ route('home') }}">Home</a></li>
                                <li><a href="{{ route('shop') }}">Shop</a></li>  
                                @auth                           
                                    <li><a href="{{ route('user.show') }}">My Account</a>
                                    </li>
                                @endauth
                            </ul>
                        </nav>
                    </div>
                    <div class="hotline d-none d-lg-block">
                        <p><a href="{{ route('contact') }}"><i class="fi-rs-smartphone"></i><span>Contact</span> (+84) 0000-000-000 </a></p>
                    </div>
                </div>
            </div>
        </div>
    </header>           
    <main class="main">
        @yield('main')
    </main>
    <footer class="main">
        <div class="container">
            <div class="divider center_icon mt-30 mb-30"><i class="fi-rs-fingerprint"></i></div>
        </div>
        <section class="section-padding footer-mid">
            <div class="container pt-15 pb-20">
                <div class="row">
                    <div class="col-lg-4 col-md-6">
                        <div class="widget-about font-md mb-md-5 mb-lg-0">
                            <div class="logo logo-width-1 wow fadeIn animated">
                                <a href="{{ route('home') }}"><img src="{{ asset('assets/imgs/logo/logo.png')}}" alt="logo"></a>
                            </div>
                            <h5 class="mt-20 mb-10 fw-600 text-grey-4 wow fadeIn animated">Contact</h5>
                            <p class="wow fadeIn animated">
                                <strong>Address: </strong> Ha Noi University of Science and Technology
                            </p>
                            <p class="wow fadeIn animated">
                                <strong>Phone: </strong>+84 0000-000-000
                            </p>
                            <p class="wow fadeIn animated">
                                <strong>Email: </strong>team3@webdevops.com
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-3">
                        <div class="row">
                            <div class="col-md-8 col-lg-12">
                                <h5 class="widget-title wow fadeIn animated">About Team</h5>
                                <ul class="footer-list wow fadeIn animated mb-sm-5 mb-md-0">
                                    <li><a href="#">Nguyễn Huy Hoàn - 20194569</a></li>
                                    <li><a href="#">Trần Quang Huy - 20190093</a></li>
                                    <li><a href="#">Hồ Tuấn Hưng - 20194583</a></li>
                                    <li><a href="#">Vũ Đức Dũng - 20194527</a></li>
                                    <li><a href="#"></a></li>                            
                                </ul>
                            </div>
                            <div class="col-md-4 col-lg-12 mt-md-3 mt-lg-0">
                                <h5 class="widget-title wow fadeIn animated">Follow Us</h5>
                                <div class="mobile-social-icon wow fadeIn animated mb-sm-5 mb-md-0">
                                    <a href="#"><img src="{{ asset('assets/imgs/theme/icons/icon-facebook.svg') }}" alt=""></a>
                                    <a href="#"><img src="{{ asset('assets/imgs/theme/icons/icon-twitter.svg') }}" alt=""></a>
                                    <a href="#"><img src="{{ asset('assets/imgs/theme/icons/icon-instagram.svg') }}" alt=""></a>
                                    <a href="#"><img src="{{ asset('assets/imgs/theme/icons/icon-pinterest.svg') }}" alt=""></a>
                                    <a href="#"><img src="{{ asset('assets/imgs/theme/icons/icon-youtube.svg') }}" alt=""></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-3">
                        <h5 class="widget-title wow fadeIn animated">Resource</h5>
                        <ul class="footer-list wow fadeIn animated mb-sm-5 mb-md-0">
                            <li><a href=""></a></li>
                            <li><a href=""></a></li>
                            <li><a href=""></a></li>
                            <li><a href=""></a></li>
                            <li><a href=""></a></li>                            
                        </ul>
                    </div>
                    <div class="col-lg-4 mob-center">
                        <h5 class="widget-title wow fadeIn animated">Install App</h5>
                        <div class="row">
                            <div class="col-md-8 col-lg-12">
                                <p class="wow fadeIn animated">From App Store or Google Play</p>
                                <div class="download-app wow fadeIn animated mob-app">
                                    <a href="#" class="hover-up mb-sm-4 mb-lg-0"><img src="assets/imgs/theme/app-store.jpg" alt=""></a>
                                    <a href="#" class="hover-up"><img src="assets/imgs/theme/google-play.jpg" alt=""></a>
                                </div>
                            </div>
                            <div class="col-md-4 col-lg-12 mt-md-3 mt-lg-0">
                                <p class="mb-20 wow fadeIn animated">Secured Payment Gateways</p>
                                <img class="wow fadeIn animated" src="{{ asset('assets/imgs/theme/payment-method.png') }}" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <div class="container pb-20 wow fadeIn animated mob-center">
            <div class="row">
                <div class="col-12 mb-20">
                    <div class="footer-bottom"></div>
                </div>
                <div class="col-lg-6">
                    <p class="float-md-left font-sm text-muted mb-0">
                        <a href="privacy-policy.html">Privacy Policy</a> | <a href="terms-conditions.html">Terms & Conditions</a>
                    </p>
                </div>
                <div class="col-lg-6">
                    <p class="text-lg-end text-start font-sm text-muted mb-0">
                        &copy; <strong class="text-brand">Web Programming</strong> All rights reserved
                    </p>
                </div>
            </div>
        </div>
    </footer> 
    @livewireScripts   
    <!-- Vendor JS-->
    <script src="{{ asset('assets/js/vendor/modernizr-3.6.0.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/jquery-migrate-3.3.0.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/slick.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/jquery.syotimer.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/wow.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/jquery-ui.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/perfect-scrollbar.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/magnific-popup.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/select2.min.js') }}" ></script>
    <script src="{{ asset('assets/js/plugins/waypoints.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/counterup.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/jquery.countdown.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/images-loaded.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/isotope.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/scrollup.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/jquery.vticker-min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/jquery.theia.sticky.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/jquery.elevatezoom.js') }}"></script>
    <!-- Template  JS -->
    <script src="{{ asset('js/firebase.js') }}"></script>
    <script src="{{ asset('assets/js/main.js?v=3.3') }}"></script>
    <script src="{{ asset('assets/js/shop.js?v=3.3') }}"></script>
    <script src="{{ asset('assets/js/clicky-menus.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.all.min.js"></script>
    <script>
        window.addEventListener('swal',function(event){
            Swal.fire(event.detail);
        });
    </script>
</html>