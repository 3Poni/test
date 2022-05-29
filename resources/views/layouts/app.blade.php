<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title></title>
    <link rel="stylesheet" href="{{ asset('plugins/111/assets/vendors/animate.css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/111/assets/vendors/slick-carousel/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/111/assets/vendors/slick-carousel/slick-theme.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/111/assets/css/style.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"/>
    <script src="{{ asset('plugins/111/assets/vendors/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('plugins/111/assets/js/loader.js') }}"></script>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- CSRF Token -->
</head>
<body>
<div class="oleez-loader"></div>
    <header class="oleez-header">
        <nav class="navbar navbar-expand-lg navbar-light">
            <a class="navbar-brand" href="#"><img src="{{ asset('plugins/111/assets/images/4444.png') }}" alt="Oleez"></a>
            <div class="collapse navbar-collapse" id="oleezMainNav">
                <ul class="navbar-nav mx-auto mt-2 mt-lg-0">
                    <li class="nav-item active">
                        <a class="nav-link" href="/">Главная <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/about">О нас</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#!" id="pagesDropdown" data-toggle="dropdown"
                           aria-haspopup="true" aria-expanded="false">Статьи</a>
                        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
                            <a class="dropdown-item" href="{{ route('main.articles.index') }}">Все статьи</a>
                            @auth
                            <a class="dropdown-item" href="{{ route('personal.article.create') }}">Добавить статью</a>
                                @endauth
                        </div>
                    </li>
                </ul>
                <ul class="navbar-nav d-none d-lg-flex">
                    @if (Route::has('login'))
                        @auth
                            <li class="nav-item">
                                <a  class=" nav-link btn btn-warning " href="{{ url('/artadd') }}">Создать статью</a>
                            </li>
                            <li class="pl-3 nav-item">
                                <a class="nav-link btn btn-warning" href="{{ route('personal.main.index') }}">Личный кабинет</a>
                            </li>
                            <li class="pl-3 nav-item">
                                <form action="{{ route('logout') }}" method="post">
                                    @csrf
                                <input class="btn btn-outline-primary" type="submit" value="Выйти">
                                </form>
                            </li>
                        @else
                            <li class="pl-3 nav-item">
                                <a class="nav-link btn btn-warning me-2" href="{{ route('login') }}">Вход</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="pl-3 nav-item">
                                    <a class="nav-link nav-link-btn" href="{{ route('register') }}">Регистрация</a>
                                </li>
                            @endif
                        @endauth
                    @endif
                    <li class="nav-item">
                        <a class="pl-3 nav-link nav-link-btn" href="#!" data-toggle="searchModal">
                            <img src="{{ asset('plugins/111/assets/images/search.svg') }}" alt="search">
                        </a>
                    </li>
                    <li class="nav-item ml-5">
                        <a class="nav-link pr-0 nav-link-btn" href="#!" data-toggle="offCanvasMenu">
                            <img src="{{ asset('plugins/111/assets/images/social icon@2x.svg') }}" alt="social-nav-toggle">
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>

<div class="container">
    @yield('content')
</div>
<footer class="oleez-footer wow fadeInUp">
    <div class="container">
        <div class="footer-content">
            <div class="row">
                <div class="col-md-6">
{{--                    <img src="{{ asset('plugins/111/assets/images/Logo_1.svg') }}" alt="oleez" class="footer-logo">--}}
{{--                    <p class="footer-intro-text">Don't be shy, get in touch with us and create the world again!</p>--}}
{{--                    <nav class="footer-social-links">--}}
{{--                        <a href="#!">Fb</a>--}}
{{--                        <a href="#!">Tw</a>--}}
{{--                        <a href="#!">In</a>--}}
{{--                        <a href="#!">Be</a>--}}
{{--                    </nav>--}}
                </div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-6 footer-widget-text">
                            <h6 class="widget-title">PHONE</h6>
                            <p class="widget-content">8 800 555 35 35</p>
                        </div>
                        <div class="col-md-6 footer-widget-text">
                            <h6 class="widget-title">EMAIL</h6>
                            <p class="widget-content">NIKO-LUIS@yandex.ru</p>
                        </div>
                        <div class="col-md-6 footer-widget-text">
                            <h6 class="widget-title">Адрес</h6>
                            <p class="widget-content">г. Иркутск <br> Российская Федерация</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-text">
            <p class="mb-0">Текст для футера, возможно стоит прикрепить ссылку.</p>
        </div>
    </div>
</footer>
<!-- Off canvas social menu -->
<nav id="offCanvasMenu" class="off-canvas-menu">
    <button type="button" class="close" aria-label="Close" data-dismiss="offCanvasMenu">
        <span aria-hidden="true">&times;</span>
    </button>
    <ul class="oleez-social-menu">
        <li>
            <a href="#!" class="oleez-social-menu-link">Facebook</a>
        </li>
        <li>
            <a href="#!" class="oleez-social-menu-link">Instagram</a>
        </li>
        <li>
            <a href="#!" class="oleez-social-menu-link">Behance</a>
        </li>
        <li>
            <a href="#!" class="oleez-social-menu-link">Dribbble</a>
        </li>
        <li>
            <a href="#!" class="oleez-social-menu-link">Email</a>
        </li>
    </ul>
</nav>
<!-- Full screen search box -->
<div id="searchModal" class="search-modal">
    <button type="button" class="close" aria-label="Close" data-dismiss="searchModal">
        <span aria-hidden="true">&times;</span>
    </button>
    <form action="{{ route('main.search.index') }}" method="get" class="oleez-overlay-search-form">
        <label for="search" class="sr-only">Поиск</label>
        <input type="search" class="oleez-overlay-search-input" id="s" name="s" placeholder="Введите ваш запрос">
    </form>
</div>

<script src="{{ asset('plugins/111/assets/vendors/popper.js/popper.min.js') }}"></script>
<script src="{{ asset('plugins/111/assets/vendors/wowjs/wow.min.js') }}"></script>
<script src="{{ asset('plugins/111/assets/vendors/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('plugins/111/assets/vendors/slick-carousel/slick.min.js') }}"></script>
<script src="{{ asset('plugins/111/assets/js/main.js') }}"></script>
<script src="{{ asset('plugins/111/assets/js/landing.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

<script>
    new WOW({mobile: false}).init();
</script>
</body>

</html>
