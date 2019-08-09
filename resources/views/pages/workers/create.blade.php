@extends('layouts.header')
@section('content')
    @if(session()->has('message'))
    <div class="done_modal">
        <i class="fas fa-times" onclick="close_modal()"></i>
        <p>{{session('message')}}</p>
        <div class="hr_done_modal"></div>
    </div>
    <script>
        $(document).ready(function () {
            $('.done_modal').animate({
                top: "10px"
            },500,function () {
                $('.hr_done_modal').animate({
                    width: "hide"
                },5000,function () {
                    $('.done_modal').animate({
                        top: "-400px"
                    },1000,function () {

                    })
                })
            });

        });
        function close_modal() {
            $('.done_modal').animate({
                top: "-400px"
            },1000,function () {

            })
        }
    </script>
    @endif
    <div class="main">
        <div class="main_page" style="width: 50%">
            <img src="{{asset('images/icons/games.png')}}">
            <h2>Добавление сотрудника</h2>
        </div>
        <div class="main_else">
            <a href="{{url('workers/')}}"><div class="main_else_add">
                    <button class="cancel_btn add_card_hover"><i class="far fa-times-circle"></i></button>
                </div>
            </a>
        </div>
    </div>
    <form action="{{url('worker/create')}}" method="POST" enctype="multipart/form-data">
        @csrf
    <div class="workers_content">
        <div class="add_worker_form">

            <input type="hidden" name="id" value="0" id="worker_id">


            <div class="add_worker_img">
                <input type="file" id="logo_worker" name="logo_worker">
                <label for="logo_worker" id="logo_label"></label>
                <p>Изменить фото</p>
            </div>
            <script>
                    $('#logo_worker').change( function (e) {
                        if (this.files[0]) {
                            var fr = new FileReader();
                            fr.addEventListener("load", function () {
                                document.querySelector("#logo_label").style.backgroundImage = "url(" + fr.result + ")";
                            }, false);
                            fr.readAsDataURL(this.files[0]);
                        }
                    });
            </script>
            <div class="add_worker_content">
                <h5>Личные данные</h5>
                <hr>
                <div class="add_worker_boxes">
                    <div class="add_worker_boxes_item">
                        <label for="name">Имя и фамилия*</label>
                        <input type="text" id="name" name="name" required>
                    </div>
                    <div class="add_worker_boxes_item">
                        <label for="position">Должность</label>
                        <input id="position" type="text" name="position" required>
                    </div>
                    <div class="add_worker_boxes_item">
                        <label for="email">Почта</label>
                        <input id="email" type="email" name="email">
                    </div>
                    <div class="add_worker_boxes_item">
                        <label for="phone">Телефон</label>
                        <input id="phone" type="text" name="phone">
                    </div>
                    <div class="add_worker_boxes_item">
                        <label for="payment">Схема расчёта ЗП</label>
                        <select id="payment" name="payment">
                            <option value="0">Без схемы</option>
                                @foreach($user->payments as $payment)
                                <option value="{{$payment->id}}">{{$payment->name}}</option>
                                @endforeach
                        </select>
                    </div>
                    <div class="add_worker_boxes_checkbox">
                        <input type="checkbox" value="Да" name="access" id="access">
                        <label for="access"></label>
                        <p>Разрешить доступ в систему</p>
                    </div>
                </div>
                <h5 style="margin-top: 10px">Уведомления</h5>
                <hr>
                <div class="worker_messages">
                    <div class="worker_messages_item">
                <div class="add_worker_message_checkbox">
                    <input type="checkbox" value="Да" name="worker_telegram" id="worker_telegram">
                    <label for="worker_telegram"></label>
                    <p>Telegram уведомления</p>
                </div>
                        <div class="add_worker_boxes_descript">
                            <p>Чтобы подключить телеграм оповещения сотрудник должен найти нашего бота QAmessengerBot и отправить ему свой идентификатор</p>
                        </div>
                    </div>
                    <div class="worker_messages_item">
                        <div class="add_worker_message_checkbox">
                            <input type="checkbox" value="Да" name="worker_sms" id="worker_sms">
                            <label for="worker_sms"></label>
                            <p>SMS уведомления о новых визитах</p>
                        </div>
                        <div class="add_worker_boxes_descript">
                            <p>Стоимость одной смс 0.27 коп за 70 символов. Рекомендуем использовать телеграм уведомления.</p>
                        </div>
                    </div>
                </div>
                    <div class="worker_change_quest">
                        <h5>С какими квестами работает сотрудник</h5>
                        <hr>
                    <div style="display: flex" class="worker_radio">
                        <input type="radio" id="all_quests"  name="worker_quest_change" onclick="worker_quest()" value="Все">
                        <label for="all_quests">Все</label>
                        <input type="radio" id="change_quests" checked name="worker_quest_change" onclick="worker_quest()" value="Выбранные">
                        <label for="change_quests">Выбранные</label>
                    </div>
                <div class="add_worker_quest" id="add_worker_quest">
                    <select id="worker_quest" name="worker_quest[]" class="chosen-select select_quest" multiple data-placeholder="Выберите квесты">
                        @foreach($user->cards as $card)
                            <option value="{{$card->id}}">{{$card->name}}</option>
                        @endforeach
                    </select>
                </div>
                </div>
                <script>
                    function worker_quest() {
                       var change = $('.worker_radio input[type=radio]:checked').val();
                       var y = $(window).scrollTop();
                       if(change !== 'Все'){
                           $('.add_worker_quest').css("display","block");
                           $(window).scrollTop(y+150);
                       }
                       else{
                           $('.add_worker_quest').css("display","none");
                       }
                   }

                </script>
                <button type="submit" class="create_worker_btn">Сохранить</button>
            </div>

        </div>
    </div>
    </form>
@endsection