@extends('layouts.header')
@section('content')
    <script src="{{asset('js/under_pay.js')}}"></script>
    <div class="main">
        <div class="main_page">
            <h2>Новый квест</h2>
        </div>
        <div class="main_else">
            <a href="{{url('cards/')}}"><div class="main_else_add">
                    <button class="cancel_btn add_card_hover"><i class="far fa-times-circle"></i></button>
                </div>
            </a>
        </div>
    </div>
    <div class="transp"></div>
    <div class="address_form" id="address_form">
        <div class="address_form_header">
            <p>Добавить адрес</p>
            <i onclick="close_address()" class="fas fa-times"></i>
        </div>
        <form class="form_add_address" id="form_add_address">
            @csrf
            <div style="display: block !important;">
                <div>
                <label for="city">Город</label>

                <select id="city" name="city" style="" class="chosen-select" data-placeholder="Выберите город">
                    @foreach($oblasts as $obl)
                        <optgroup label="{{$obl->oblast}}">
                            @foreach($cities as $town)
                                @if($town->oblast_id == $obl->id)
                                    <option value="{{$town->locations}}">{{$town->locations}}</option>
                                @endif
                            @endforeach
                        </optgroup>
                    @endforeach
                </select>
                </div>
            </div>
            <div class="address_form_ad">
                <label for="address_input">Адрес*</label>
                <input id="address_input" name="address_input" required>
            </div>
            <div>
                <label for="metro">Метро</label>
                <input id="metro" name="metro" placeholder="5 минут от метро Научная">
            </div>
            <div>
                <label for="station">Остановка*</label>
                <input id="station" name="station" placeholder="Остановка Университет" required>
            </div>
            <div>
                <label for="flour">Этаж</label>
                <input id="flour" name="flour">
            </div>
            <button type="button" onclick="add_form()">Добавить</button>
            <button type="submit" style="display: none;"></button>
        </form>
    </div>
    <script src="{{asset('js/address_form.js')}}"></script>
    <div class="content_view">
    <div class="form_container">
    <h5>Основная информация</h5>
        <hr>
        <form method="POST" action="{{url('cards/add_quest')}}" enctype="multipart/form-data">
            @csrf
            <div class="form_add">
            <div class="form_left_block">
                <div class="text_input">
                    <label for="name">Название</label>
                    <input id="name" name="name" type="text" placeholder="Алькатрас" required>
                </div>
                <h6>Кол-во игроков</h6>
                <div class="number_input">
                    <div>
                    <label for="min_gamer" class="focus_label">
                        от
                    </label>
                    <input name="min_gamer" value="2" type="text" id="min_gamer" class="focus_input" required>
                    </div>
                    <div>
                    <label for="max_gamer">
                        до
                    </label>
                    <input name="max_gamer" type="text" value="4" id="max_gamer" required>
                    </div>
                </div>
                <div class="flex_block">
                    <div class="complex_select">
                    <label for="complex">Сложность</label>
                    <select id="complex" name="complex">
                        <option value="Лёгкий">Лёгкий</option>
                        <option selected value="Средний">Средний</option>
                        <option value="Тяжёлый">Тяжёлый</option>
                    </select>
                    </div>
                    <div class="time_block">
                        <h6>Время прохождения</h6>
                        <div>
                        <input type="text" value="60" id="time" name="time">
                        <label for="time">мин</label>
                        </div>
                    </div>
                </div>
                <div class="flex_block" style="margin-bottom: 28px">
                    <div class="complex_select">
                        <label for="fear">Уровень страха</label>
                        <select id="fear" name="fear">
                            <option selected value="0">Нет</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>
                    </div>
                    <div class="phone_block">
                        <label for="phone">Телефон</label>
                        <input type="text" name="phone" id="phone" placeholder="+380 (67) 344-33-33" required>
                    </div>
                </div>
                <div class="flex_block" style="flex-direction: column">
                    <div class="form_check">
                        <input type="checkbox" value="Да" name="actors" id="actors">
                        <label for="actors"></label>
                        <p>На квесте есть актёры?</p>
                    </div>
                    <div class="form_check">
                        <input type="checkbox" value="Да" onclick="under_pay()" name="und_pay" id="und_pay">
                        <label for="und_pay"></label>
                        <p>Есть доплата за игроков?</p>
                    </div>
                </div>
                <div class="flex_block" style="flex-direction: column">
                    <div id="dop" style="display: none">
                    <h6>Доплата за каждого после <span id="dop_text"></span> человек</h6>
                    <div class="dop">
                        <div>
                        <input type="text" value="0" id="max_gamer_pay" name="max_gamer_pay" required>
                        <label id="pay_type_text" for="max_gamer_pay">грн</label>
                        </div>
                        <div>
                        <select id="type_pay" name="type_pay" onchange="pay_type()">
                            <option selected value="грн">грн</option>
                            <option value="%">%</option>
                        </select>
                        </div>
                    </div>
                    </div>
                </div>
            </div>

            <div class="form_center_block">
                <div class="type_block">
                    <label for="type">Тип квеста</label>
                    <select id="type" name="type">
                        <option value="Эскейп квесты">Эскейп квесты</option>
                        <option value="Перфомансы">Перфомансы</option>
                        <option value="Экшн-квесты">Экшн-квесты</option>
                        <option value="Городские квесты">Городские квесты</option>
                        <option value="Морфеус">Морфеус</option>
                        <option value="VR квесты">VR квесты</option>
                        <option value="Квизы">Квизы</option>
                    </select>
                </div>
                <div class="flex_block" style="flex-direction: column">
                    <h6>Возраст от</h6>
                    <div class="age_block">
                        <input type="text" name="age" id="age" placeholder="12" required>
                        <label for="age">лет</label>
                    </div>
                </div>
                <div class="flex_block">
                    <div class="reserv_day" style="margin-right: 20px">
                        <h6>Бронь возможна за</h6>
                        <div>
                            <input type="text" name="reserv_min" id="reserv_min" placeholder="60" required>
                            <label for="reserv_min">мин</label>
                        </div>
                    </div>
                    <div class="reserv_day">
                        <h6>Период для брони</h6>
                        <div>
                            <input type="text" id="reserv_day" name="reserv_day" placeholder="5" required>
                            <label for="reserv_day">дней</label>
                        </div>
                    </div>
                </div>
                <div class="type_block">
                    <label for="address">Адрес <button class="add_address" onclick="address_form()" type="button">Добавить адрес</button></label>
                    <select id="address" name="address">
                            @foreach($user->addresses as $address)
                                <option value="{{$address->id}}">{{$address->city}}, {{$address->address}}</option>
                                @endforeach
                    </select>
                </div>
                <div class="flex_block" style="flex-direction: column">
                    <div class="form_check">
                        <input type="checkbox" value="Да" name="new" id="new">
                        <label for="new"></label>
                        <p>Поставить отметку "NEW"</p>
                    </div>
                    <div class="form_check">
                        <input type="checkbox" value="Да" name="online" id="online">
                        <label for="online"></label>
                        <p>Запретить онлайн запись</p>
                    </div>
                </div>
                <div class="flex_block" style="flex-direction: column">
                    <div style="display: none;" id="dop_max">
                    <h6>Максимальное кол-во игроков</h6>
                    <div class="max_with_pay">
                        <input type="text" id="max_gamer_col" name="max_gamer_col" placeholder="5" value="0" required>
                        <label for="max_gamer_col">чел</label>
                    </div>
                    </div>
                </div>
            </div>
            <div class="form_right_block">
                <div class="description">
                    <label for="short_desc">Короткое описание (5-10 слов о преимуществах)</label>
                    <textarea id="short_desc" name="short_desc" maxlength="1000"></textarea>
                </div>
                <div class="description_long">
                    <label for="desc">Полное описание</label>
                    <textarea id="desc" name="desc" maxlength="5000" ></textarea>
                </div>
                <div class="description_long">
                    <label for="legend">Легенда</label>
                    <textarea id="legend" name="legend" maxlength="5000"></textarea>
                </div>
            </div>
            </div>
            <button type="submit" id="req_address" style="display:none;"></button>
        </form>
        <button type="button" onclick="req_address()" class="add_form_btn">Создать</button>
    </div>
    </div>

@endsection