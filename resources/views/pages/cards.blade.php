@extends('layouts.header')
@section('content')

    <div class="main">
        <div class="main_page">
            <img src="{{asset('images/icons/settings.png')}}">
            <h2>Настройки</h2>
        </div>
    </div>

    <div class="content_view">
        <div class="left_bar">
            <input type="radio" value="cvest" class="sidebar_radio rad1" checked onchange="sidebar()" id="cvest" name="radio_bar">
            <label class="left_bar_item" for="cvest">
                <img src="{{asset('images/icons/cvest.png')}}">
                <span>Квесты</span>
            </label>
            <input type="radio" value="bonus" class="sidebar_radio rad2"  onchange="sidebar()" id="bonus" name="radio_bar">
            <label class="left_bar_item" for="bonus">
                <img src="{{asset('images/icons/bonus.png')}}">
                <span>Акции</span>
            </label>

            <input type="radio" value="cash" class="sidebar_radio rad3" onchange="sidebar()" id="cash" name="radio_bar">
            <label class="left_bar_item" for="cash">
                <img src="{{asset('images/icons/cash.png')}}">
                <span>Кассы</span>
            </label>
            <input type="radio" value="contragent" class="sidebar_radio rad4" onchange="sidebar()" id="contragent" name="radio_bar">
            <label class="left_bar_item" for="contragent">
                <img src="{{asset('images/icons/contragent.png')}}">
                <span>Контрагенты</span>
            </label>
            <input type="radio" value="costs" class="sidebar_radio rad5" onchange="sidebar()" id="costs" name="radio_bar">
            <label class="left_bar_item" for="costs">
                <img src="{{asset('images/icons/costs.png')}}">
                <span>Статьи расходов</span>
            </label>
            <input type="radio" value="payment" class="sidebar_radio rad5" onchange="sidebar()" id="payment" name="radio_bar">
            <label class="left_bar_item" for="payment">
                <img src="{{asset('images/icons/payment.png')}}">
                <span>Расчёт ЗП</span>
            </label>
            <input type="radio" value="pay" class="sidebar_radio rad5" onchange="sidebar()" id="pay" name="radio_bar">
            <label class="left_bar_item" for="pay">
                <img src="{{asset('images/icons/pay.png')}}">
                <span>Оплата</span>
            </label>
            </div>
            <script src="{{asset('js/stock.js')}}"></script>
            <script src="{{asset('js/cards_sidebar.js')}}"></script>
            <script src="{{asset('js/add_cashbox.js')}}"></script>
            <script src="{{asset('js/add_cost.js')}}"></script>
            <script src="{{asset('js/add_payment.js')}}"></script>

            <div class="content_view_main" id="content_view">

            </div>


    </div>


@endsection