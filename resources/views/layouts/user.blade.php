<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="author" content="KasymovRuslan">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Где играть') }}</title>
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.css') }}?p=1"/>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}"/>
    <link rel="icon" type="image/svg+xml" href="favicon.svg">
</head>
<body>
<div class="wrapper">
    <div class="content">
        <div class="container-fluid header">
            <div class="container">
                <div class="row">
                    <div class="col-6 col-sm-3">
                        <div class="logo">
                            {{--<img src="images/logo.svg" alt="где поиграть">--}}
                        </div>
                    </div>
                    <div class="col-6 col-sm-4 col-md-2 order-sm-last">
                        @guest
                            <div class="profile-small justify-content-around p-1-0">
                                <a href="{{ route('login') }}">{{ __('auth.login') }}</a>
                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}">{{ __('auth.register') }}</a>
                                @endif
                            </div>
                        @else
                            <div class="profile-small dropdown-toggle" id="dropdownMenuButton" data-toggle="dropdown"
                                 aria-haspopup="true" aria-expanded="false">
                                <div class="profile-small-name">{{ Auth::user()->name }}</div>
                                <div class="profile-small-img"><img src="{{ Auth::user()->avatar_small  }}" alt=""></div>
                            </div>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" x-placement="top-start"
                                 style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, -116px, 0px);">
                                <a class="dropdown-item" href="/users/{{ Auth::user()->id }}">Профиль</a>
                                <a class="dropdown-item" href="/users/{{ Auth::user()->id }}/edit">Редактировать</a>
                                <a class="dropdown-item" href="#">Помощь</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                      style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        @endguest
                    </div>
                    <div class="col-12 col-sm-5 col-md-7">
                        <nav class="navbar navbar-expand-md justify-content-center">
                            <button class="navbar-toggler navbar-light" type="button" data-toggle="collapse"
                                    data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
                                    aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon "></span> Меню сайта
                            </button>
                            <div class="collapse navbar-collapse" id="navbarNav">
                                <ul class="navbar-nav" id="menu">
                                    <li class="nav-item active">
                                        <a class="nav-link animated" href="#">Виды спорта</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link animated" href="#">Организаторы</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link animated" href="#">Новости</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link animated" href="#">О сайте</a>
                                    </li>
                                </ul>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-6 col-md-3">
                    @guest
                        <div class="auth-form">
                            <form action="">
                                <a href="{{ route('register') }}">{{ __('Register') }}</a> <span
                                        class="d-lg-inline d-none">|</span> <span
                                        class="active-link">{{ __('Login') }}</span>
                                <label>
                                    <input type="text" name="num" id="num" placeholder="Номер">
                                </label>
                                <label>
                                    <input type="password" name="pass" id="pass" placeholder="Пароль">
                                </label>
                                <button class="btn-gp">Войти</button>
                                <a href="#">Забыли пароль?</a>
                            </form>
                        </div>
                    @else
                        <div class="menu">
                            <nav class="navbar navbar-expand-md">
                                <button class="navbar-toggler navbar-light" type="button" data-toggle="collapse"
                                        data-target="#leftBar" aria-controls="leftBar" aria-expanded="false"
                                        aria-label="Toggle navigation">
                                    <span class="navbar-toggler-icon "></span> Меню профиля
                                </button>
                                <div class="collapse navbar-collapse" id="leftBar">
                                    <ul class="navbar-nav flex-column" id="leftsidebar">
                                        <li class="nav-item active">
                                            <a class="nav-link animated profile-link" href="#"><span
                                                        class="icon-home"></span> Профиль</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link animated msg-link" href="#"><span
                                                        class="icon-messages"></span> Сообщения</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link animated games-link" href="#"><span
                                                        class="icon-games"></span> Мои игры</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link animated groups-link" href="#"><span
                                                        class="icon-groups"></span> Группы</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link animated photo-link" href="#"><span
                                                        class="icon-photo"></span> Фотоотчеты</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link animated news-link" href="#"><span
                                                        class="icon-news"></span>
                                                Мои новости</a>
                                        </li>
                                    </ul>
                                </div>
                            </nav>
                        </div>
                    @endguest
                </div>
                <div class="col-6 col-md-3 order-md-last">
                    <div class="title d-md-block d-none">Новости</div>
                    <div class="news-block">
                        <div class="news-one">
                            <div class="author-img">
                                <img src="images/simple_img.png" alt="">
                            </div>
                            <div class="autor-data">
                                <div class="name">Руслан</div>
                                <div class="news-date">24.08.19</div>
                            </div>
                            <div class="news-block-title">
                                Изменение в расписании игр!
                            </div>
                            <div class="news-block-content">
                                Со следующего месяца уличные игры будут
                                проводиться еженедельно в...
                            </div>
                            <a href="#">читать далее</a>
                        </div>
                        <hr>
                        <div class="news-one">
                            <div class="author-img">
                                <img src="images/simple_img.png" alt="">
                            </div>
                            <div class="autor-data">
                                <div class="name">Руслан</div>
                                <div class="news-date">24.08.19</div>
                            </div>
                            <div class="news-block-title">
                                Изменение в расписании игр!
                            </div>
                            <div class="news-block-content">
                                Со следующего месяца уличные игры будут
                                проводиться еженедельно в...
                            </div>
                            <a href="#">читать далее</a>
                        </div>
                        <a href="#">Все новости</a>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>
    <footer class="footer_bg">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-4">
                    <div class="logo justify-content-center">
                        {{--<img src="images/logo.svg" alt="где поиграть">--}}
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="footer-data">
                        <div class="footer-nav">
                            <a href="" class="animate">Игрокам</a><a href="" class="animate">Организаторам</a><a href=""
                                                                                                                 class="animate">О
                                сайте</a>
                        </div>
                        <div class="footer-text">
                            Находясь на нашем сайте вы подписываете <a href="" class="animate">пользовательское
                                соглашение</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</div>
<script src="{{ asset('js/jquery.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
<script src="{{ asset('bootstrap/js/bootstrap.js') }}"></script>
<script src="{{ asset('js/cbpFWTabs.js') }}"></script>

</body>
</html>