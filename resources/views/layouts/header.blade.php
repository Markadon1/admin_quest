<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="{{asset('js/jquery-3.4.0.js')}}"></script>
    <script src="{{asset('js/bootstrap.bundle.js')}}"></script>
    <script src="{{asset('js/ion.rangeSlider.js')}}"></script>
    <script src="{{asset('js/jquery.color.js')}}"></script>
    <script src="{{asset('js/menu.js')}}"></script>
    <script src="{{asset('js/prism.js')}}"></script>
    <script type="text/javascript" src="{{url('js/jquery.imgareaselect.pack.js')}}"></script>
    <script type="text/javascript" src="{{url('https://cdn.jsdelivr.net/momentjs/latest/moment.min.js')}}"></script>
    <script type="text/javascript" src="{{url('js/datepicker.min.js')}}"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
    <script src="{{url('https://kit.fontawesome.com/ab4de56d1d.js')}}"></script>
    <title>Admin-Quests</title>
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/menu.css') }}" rel="stylesheet">
    <link href="{{ asset('css/chosen.css')}}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('css/ion.rangeSlider.css') }}" rel="stylesheet">
    <link href="{{ asset('css/imgareaselect-default.css') }}" rel="stylesheet">
</head>
<body>
@if(Auth::guest())
<div class="header">
    <div class="header_name">Admin-Quests</div>

        <div style="margin-top: 10px">
            <a href="{{route('login')}}">Вход</a>
            <a href="{{route('register')}}">Регистрация</a>
        </div>
</div>
<hr>
@else
    <div id="stock_form" class="stock_form_container_bg">
        <div class="stock_form_container">
            <div class="stock_form_container_close">
                <span><i class="fas fa-times"></i></span>
            </div>
            <div class="stock_form" id="form_add_stock">

            </div>
        </div>
    </div>
<div class="container-body">
<div class="left_sidebar" id="sidebar">
    <div id="menu_logo" class="menu_logo_container">
    <div class="menu_logo hide_menu" onclick="menu()" id="click_logo">
    </div>
    </div>
    <div class="menu_item">
        <a class="menu_link" href="{{url('/profile')}}">
            <img class="menu_item_img" src="{{asset('images/icons/profile.png')}}">
            <p class="menu_item_text">Профиль</p>
        </a>
    </div>
    <div class="menu_item">
        <a class="menu_link" href="{{url('/')}}">
                <img class="menu_item_img" src="{{asset('images/icons/games.png')}}">
                <p class="menu_item_text">Игры</p>
        </a>
    </div>
    <div class="menu_item">
        <a class="menu_link" href="{{url('/')}}">
            <img class="menu_item_img" src="{{asset('images/icons/clients.png')}}">
            <p class="menu_item_text">Клиенты</p>
        </a>
    </div>
    <div class="menu_item">
        <a class="menu_link" href="{{url('/workers')}}">
            <img class="menu_item_img" src="{{asset('images/icons/workers.png')}}">
            <p class="menu_item_text">Сотрудники</p>
        </a>
    </div>
    <div class="menu_item">
        <a class="menu_link" href="{{url('/')}}">
            <img class="menu_item_img" src="{{asset('images/icons/finance.png')}}">
            <p class="menu_item_text">Финансы</p>
        </a>
    </div>
    <div class="menu_item">
        <a class="menu_link" href="{{url('/cards')}}">
                <img class="menu_item_img" src="{{asset('images/icons/settings.png')}}">
                <p class="menu_item_text">Карточки</p>
        </a>
    </div>
    <div class="menu_item">
        <a class="menu_link" href="{{ route('logout') }}"
           onclick="event.preventDefault();
           document.getElementById('logout-form').submit();">
            <img class="menu_item_img" src="{{asset('images/icons/exit.png')}}">
            <p class="menu_item_text">Выход</p>
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    </div>
</div>
<div class="content">
    @yield('content')
</div>
</div>
@endif
@yield('auth')
<script src="{{asset('js/chosen.jquery.js')}}"></script>
<script src="{{asset('js/init.js')}}"></script>
<script src="{{asset('js/prism.js')}}"></script>
</body>
</html>