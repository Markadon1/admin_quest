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

                <input type="hidden" name="id" value="{{$worker->id}}" id="worker_id">

                <div class="add_worker_img">
                    <input type="file" id="logo_worker" value="" name="logo_worker">
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
                            <input type="text" id="name" value="{{$worker->name}}" name="name" required>
                        </div>
                        <div class="add_worker_boxes_item">
                            <label for="position">Должность</label>
                            <input id="position" type="text" value="{{$worker->position}}" name="position" required>
                        </div>
                        <div class="add_worker_boxes_item">
                            <label for="email">Почта</label>
                            <input id="email" type="email" value="{{$worker->email}}" name="email">
                        </div>
                        <div class="add_worker_boxes_item">
                            <label for="phone">Телефон</label>
                            <input id="phone" type="text" name="phone" value="{{$worker->phone}}">
                        </div>
                        <div class="add_worker_boxes_item">
                            <label for="payment">Схема расчёта ЗП</label>
                            <select id="payment" name="payment">

                                    @if($worker_payment == 0)
                                    <option value="0" selected>Без схемы</option>
                                    @foreach($user->payments as $payment)
                                            <option value="{{$payment->id}}">{{$payment->name}}</option>
                                    @endforeach
                                    @endif
                                    @if($worker_payment != 0)
                                        @foreach($worker->payments as $work_pay)
                                                <option selected value="{{$work_pay->id}}">{{$work_pay->name}}</option>

                                            <option value="0">Без схемы</option>
                                            @foreach($user->payments as $payment)
                                                @if($payment->id != $work_pay->id)
                                                <option value="{{$payment->id}}">{{$payment->name}}</option>
                                                    @endif
                                            @endforeach
                                            @endforeach
                                    @endif
                            </select>
                        </div>
                        <div class="add_worker_boxes_checkbox">
                            @if($worker->access == 'Да')
                            <input type="checkbox" checked value="Да" name="access" id="access">
                            @else
                            <input type="checkbox" value="Да" name="access" id="access">
                            @endif
                                <label for="access"></label>
                            <p>Разрешить доступ в систему</p>
                        </div>
                    </div>
                    <h5 style="margin-top: 10px">Уведомления</h5>
                    <hr>
                    <div class="worker_messages">
                        <div class="worker_messages_item">
                            <div class="add_worker_message_checkbox">
                                @if($worker->telegram == 'Да')
                                <input type="checkbox" value="Да" checked name="worker_telegram" id="worker_telegram">
                                @else
                                    <input type="checkbox" value="Да" name="worker_telegram" id="worker_telegram">
                                @endif
                                <label for="worker_telegram"></label>
                                <p>Telegram уведомления</p>
                            </div>
                            <div class="add_worker_boxes_descript">
                                <p>Чтобы подключить телеграм оповещения сотрудник должен найти нашего бота QAmessengerBot и отправить ему свой идентификатор</p>
                            </div>
                        </div>
                        <div class="worker_messages_item">
                            <div class="add_worker_message_checkbox">
                                @if($worker->sms == 'Да')
                                <input type="checkbox" checked value="Да" name="worker_sms" id="worker_sms">
                                @else
                                    <input type="checkbox" value="Да" name="worker_sms" id="worker_sms">
                                @endif
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
                        <div class="add_worker_quest">
                            <select id="worker_quest" name="worker_quest[]" class="chosen-select select_quest" multiple data-placeholder="Выберите квесты">
                                @foreach($user->cards as $card)
                                    <option value="{{$card->id}}">{{$card->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div id="worker_quests">
                            @foreach($worker->cards as $quest)
                                <div class="worker_quest_item">
                                {{$quest->name}}<i style="cursor: pointer;margin-left: 5px" class="fas fa-times" onclick="delete_quest{{$quest->id}}()"></i>
                                </div>
                                <script>
                                    function delete_quest{{$quest->id}}() {
                                        var quest_id = "{{$quest->id}}"
                                        var worker_id = "{{$worker->id}}"
                                        $.ajax({
                                            type: "POST",
                                            headers: {
                                                'X-CSRF-token': $('meta[name="csrf-token"]').attr('content')
                                            },
                                            url: "/workers/update/delete_quest",
                                            data: {
                                                quest_id:quest_id,
                                                worker_id:worker_id
                                            },
                                            success:function (result) {
                                                $('#worker_quests').html(result);
                                            }
                                        })
                                    }
                                </script>
                            @endforeach
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