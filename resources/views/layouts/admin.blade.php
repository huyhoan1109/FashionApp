<!DOCTYPE html>
<html lang="en" class="light">
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <!-- BEGIN: Head -->
    <head>
        <meta charset="utf-8">
        <link href="#" rel="shortcut icon">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Admin</title>
        <!-- BEGIN: CSS Assets-->
        <link rel="stylesheet" href="{{ asset('admin/dist/css/app.css') }}" />
        <!-- END: CSS Assets-->
        @livewireStyles
    </head>
    <!-- END: Head -->
    <body class="py-5">
        <!-- BEGIN: Mobile Menu -->
        <div class="mobile-menu md:hidden">
            <div class="mobile-menu-bar">
                <a href="{{route('admin.dashboard')}}" class="flex mr-auto">
                    <img alt="Admin" class="w-6" src="{{ asset('dist/images/logo.svg') }}">
                </a>
                <a href="javascript:;" class="mobile-menu-toggler"> <i data-lucide="bar-chart-2" class="w-8 h-8 text-white transform -rotate-90"></i> </a>
            </div>
            <div class="scrollable">
                <a href="javascript:;" class="mobile-menu-toggler"> <i data-lucide="x-circle" class="w-8 h-8 text-white transform -rotate-90"></i> </a>
                <ul class="scrollable__content py-2">
                    <li>
                        <a href="{{ route('admin.dashboard') }}" class="menu ">
                            <div class="menu__icon"> <i data-lucide="home"></i> </div>
                            <div class="menu__title"> Dashboard <i data-lucide="chevron-down" class="menu__sub-icon transform rotate-180"></i> </div>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:;" class="menu">
                            <div class="menu__icon"> <i data-lucide="shopping-bag"></i> </div>
                            <div class="menu__title"> My Shop <i data-lucide="chevron-down" class="menu__sub-icon "></i> </div>
                        </a>
                        <ul class="">
                            <li>
                                <a href="{{ route('admin.categories',['category_id'=>'1']) }}" class="menu">
                                    <div class="menu__icon"> <i data-lucide="activity"></i> </div>
                                    <div class="menu__title"> Categories </div>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:;" class="menu">
                                    <div class="menu__icon"> <i data-lucide="activity"></i> </div>
                                    <div class="menu__title"> Products <i data-lucide="chevron-down" class="menu__sub-icon "></i> </div>
                                </a>
                                <ul class="">
                                    <li>
                                        <a href="{{ route('admin.products') }}" class="menu">
                                            <div class="menu__icon"> <i data-lucide="zap"></i> </div>
                                            <div class="menu__title">Product List</div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('admin.product.add') }}" class="menu">
                                            <div class="menu__icon"> <i data-lucide="zap"></i> </div>
                                            <div class="menu__title">Add New Product</div>
                                        </a>
                                    </li>
                                </ul>
                            </li>


                            <li>
                                <a href="javascript:;" class="menu">
                                    <div class="menu__icon"> <i data-lucide="activity"></i> </div>
                                    <div class="menu__title"> Coupons
                                    <i data-lucide="chevron-down" class="menu__sub-icon "></i> 
                                    </div>
                                </a>
                                <ul class="">
                                    <li>
                                        <a href="{{ route('admin.coupons') }}" class="menu">
                                            <div class="menu__icon"> <i data-lucide="zap"></i> </div>
                                            <div class="menu__title">Coupon List</div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('admin.coupon.add') }}" class="menu">
                                            <div class="menu__icon"> <i data-lucide="zap"></i> </div>
                                            <div class="menu__title">Add New Coupon</div>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="{{ route('admin.orders') }}" class="menu">
                                    <div class="menu__icon"> <i data-lucide="activity"></i> </div>
                                    <div class="menu__title"> Orders </div>
                                </a>
                            </li>

                        </ul>
                    </li>
                    
                    
    
                    <li>
                        <a href="javascript:;" class="menu">
                            <div class="menu__icon"> <i data-lucide="users"></i> </div>
                            <div class="menu__title"> Users <i data-lucide="chevron-down" class="menu__sub-icon "></i> </div>
                        </a>
                        <ul class="">
                            <li>
                                <a href="{{ route('admin.users') }}" class="menu">
                                    <div class="menu__icon"> <i data-lucide="activity"></i> </div>
                                    <div class="menu__title"> User List </div>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('admin.user.add') }}" class="menu">
                                    <div class="menu__icon"> <i data-lucide="activity"></i> </div>
                                    <div class="menu__title"> Add New User </div>
                                </a>
                            </li>
                            
                        </ul>
                    </li>    
                </ul>
            </div>
        </div>
        <!-- END: Mobile Menu -->
        <div class="flex mt-[4.7rem] md:mt-0">
            <!-- BEGIN: Side Menu -->
            <nav class="side-nav">
                <a href="{{route('admin.dashboard')}}" class="intro-x flex items-center pl-5 pt-4">
                    <img alt="Admin" class="w-6" src="{{asset('admin/dist/images/logo.svg')}}">
                    <span class="hidden xl:block text-white text-lg ml-3"> Admin </span> 
                </a>
                <div class="side-nav__devider my-6"></div>
                <ul>
                    <li>
                        <a href="{{ route('admin.dashboard') }}" class="side-menu ">
                            <div class="side-menu__icon"> <i data-lucide="home"></i> </div>
                            <div class="side-menu__title">
                                Dashboard 
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:;" class="side-menu">
                            <div class="side-menu__icon"> <i data-lucide="shopping-bag"></i> </div>
                            <div class="side-menu__title">
                                My Shop
                                <div class="side-menu__sub-icon "> <i data-lucide="chevron-down"></i> </div>
                            </div>
                        </a>
                        <ul class="">
                            <li>
                                <a href="{{ route('admin.categories',['category_id'=>'1'])  }}" class="side-menu">
                                    <div class="side-menu__icon"> <i data-lucide="activity"></i> </div>
                                    <div class="side-menu__title"> Categories </div>
                                </a>
                            </li>                         
                            <li>
                                <a href="javascript:;" class="side-menu">
                                    <div class="side-menu__icon"> <i data-lucide="activity"></i> </div>
                                    <div class="side-menu__title">
                                        Products 
                                        <div class="side-menu__sub-icon "> <i data-lucide="chevron-down"></i> </div>
                                    </div>
                                </a>
                                <ul class="">
                                    <li>
                                        <a href="{{ route('admin.products') }}" class="side-menu">
                                            <div class="side-menu__icon"> <i data-lucide="zap"></i> </div>
                                            <div class="side-menu__title">Product List</div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('admin.product.add') }}" class="side-menu">
                                            <div class="side-menu__icon"> <i data-lucide="zap"></i> </div>
                                            <div class="side-menu__title">Add New Product</div>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            
                            <li>
                                <a href="javascript:;" class="side-menu">
                                    <div class="side-menu__icon"> <i data-lucide="activity"></i> </div>
                                    <div class="side-menu__title">
                                        Coupons 
                                        <div class="side-menu__sub-icon "> <i data-lucide="chevron-down"></i> </div>
                                    </div>
                                </a>
                                <ul class="">
                                    <li>
                                        <a href="{{ route('admin.coupons') }}" class="side-menu">
                                            <div class="side-menu__icon"> <i data-lucide="zap"></i> </div>
                                            <div class="side-menu__title">Coupon List</div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('admin.coupon.add') }}" class="side-menu">
                                            <div class="side-menu__icon"> <i data-lucide="zap"></i> </div>
                                            <div class="side-menu__title">Add New Coupon</div>
                                        </a>
                                    </li>
                                </ul>
                                <li>
                                    <a href="{{ route('admin.orders') }}" class="side-menu">
                                        <div class="side-menu__icon"> <i data-lucide="activity"></i> </div>
                                        <div class="side-menu__title"> Orders </div>
                                    </a>
                                </li>
                            </li>
                        </ul>
                    </li>
                  
                    <li>
                        <a href="javascript:;" class="side-menu">
                            <div class="side-menu__icon"> <i data-lucide="users"></i> </div>
                            <div class="side-menu__title">
                                Users 
                                <div class="side-menu__sub-icon "> <i data-lucide="chevron-down"></i> </div>
                            </div>
                        </a> 
                            <ul class="">
                                <li>
                                    <a href="{{ route('admin.users') }}" class="side-menu">
                                        <div class="side-menu__icon"> <i data-lucide="zap"></i> </div>
                                        <div class="side-menu__title">User List</div>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('admin.user.add') }}" class="side-menu">
                                        <div class="side-menu__icon"> <i data-lucide="zap"></i> </div>
                                        <div class="side-menu__title">Add New User</div>
                                    </a>
                                </li>
                            </ul>
                        </li>
                </ul>
            </nav>
            <!-- END: Side Menu -->
            <!-- BEGIN: Content -->
            <div class="content">
                <main class="main">
                    @yield('main')
                </main>           
            </div>
            <!-- END: Content -->
        </div>
        @livewireScripts
        <!-- BEGIN: JS Assets-->
        <script src="{{ asset('admin/dist/js/app.js') }}"></script>
        <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v3.x.x/dist/alpine.min.js"></script>
        <!-- END: JS Assets-->
    </body>
</html>