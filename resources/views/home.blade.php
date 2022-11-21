<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Nike</title>
        <link rel='icon' href="https://pngimg.com/uploads/nike/nike_PNG7.png">

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">
        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('styles/home.css') }}">
        <link rel="stylesheet" href="{{ asset('styles/background.css') }}">
        <link rel="stylesheet" href="{{ asset('styles/footer.css') }}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    </head>
    <body class="antialiased">
        <div class="left-logo hidden fixed sm:block">
            <img src="https://pngimg.com/uploads/nike/nike_PNG7.png" width="75" height="75">
        </div>
        <div class="relative flex items-top justify-center min-h-screen bg-gray-100 white:bg-gray-900 sm:items-center py-4 sm:pt-0">
            @if (Route::has('login'))
                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                    @auth
                        <a href="{{ url('/users') }}" class="ml-4 text-lg text-gray-700 dark:text-gray-500">
                            <button type="button" class="btn btn-outline-light">Info</button>
                        </a>
                        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('frm-logout').submit();" class="ml-4 text-lg text-gray-700 dark:text-gray-500">
                            <button type="button" class="btn btn-outline-light">Exit</button>
                        </a>
                        <form id="frm-logout" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    @else
                        <a href="{{ route('login') }}" class="ml-4 text-lg text-gray-700 dark:text-gray-500">
                            <button type="button" class="btn btn-outline-light">Log in</button>
                        </a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 text-lg text-gray-700 dark:text-gray-500">
                                <button type="button" class="btn btn-outline-light">Join us</button>
                            </a>
                        @endif
                    @endauth
                    @if (Route::has('help'))
                        <a href="{{ route('help') }}" class="ml-4 text-lg text-gray-700 dark:text-gray-500">
                            <button type="button" class="btn btn-outline-light">Help</button>
                        </a>
                    @endif
                </div>
            @endif
        </div>
        <div class="video-background">
            <div class="video-foreground">
                <iframe src="https://www.youtube.com/embed/Dy9EqjHf2zw?hd=1&mute=1&controls=0&showinfo=0&rel=0&autoplay=1&loop=1&playlist=Dy9EqjHf2zw" frameborder="0" allowfullscreen></iframe>
            </div>
        </div>
        <div class="footer-dark">
            <footer>
                <div class="container">
                    <div class="row">
                        <div class="col-sm-6 col-md-3 item">
                            <h3>Team members</h3>
                            <ul>
                                <li><a href="#">Nguyễn Huy Hoàn 20194569</a></li>
                                <li><a href="#"></a></li>
                                <li><a href="#"></a></li>
                                <li><a href="#"></a></li>
                                <li><a href="#"></a></li>
                            </ul>
                        </div>
                        <div class="col-sm-6 col-md-3 item">
                            <h3>Technologies</h3>
                            <ul>
                                <li><a href="#">PHP Laravel 9</a></li>
                                <li><a href="#">MySQL</a></li>
                                <li><a href="#">Bootstrap</a></li>
                            </ul>
                        </div>
                        <div class="col-md-6 item text">
                            <h3>Our goal</h3>
                            <p>
                                
                            </p>
                        </div>
                        <div class="col item social"><a href="#"><i class="icon ion-social-facebook"></i></a><a href="#"><i class="icon ion-social-twitter"></i></a><a href="#"><i class="icon ion-social-snapchat"></i></a><a href="#"><i class="icon ion-social-instagram"></i></a>
                        </div>
                    </div>
                    <p class="copyright">Web Programming © 2022</p>
                </div>
            </footer>
        </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>
    </body>
</html>
