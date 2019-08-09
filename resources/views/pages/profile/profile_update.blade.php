<form method="POST" enctype="multipart/form-data" action="{{url('/profile/create')}}">
    @csrf
@foreach($user->infos as $info)
    <h5>Настройки профиля</h5>
    <hr>
    <div class="info_container">
        <h6 style="padding-left: 20px">Основная информация</h6>
        <hr>
        <div class="form_add">
            <div class="form_left_block">
                <div class="text_input">
                    <label for="name">Название</label>
                    <input id="name" name="name" type="text" value="{{$info->name}}" placeholder="PHOBIA" required>
                </div>
                <h6>Рабочие часы</h6>
                <div class="number_input">
                    <div>
                        <label for="min_hour" class="focus_label">
                            c
                        </label>
                        <input name="min_hour" value="{{$info->min_hour}}" type="text" id="min_hour" class="focus_input" required>
                    </div>
                    <div>
                        <label for="max_hour">
                            до
                        </label>
                        <input name="max_hour" type="text" value="{{$info->max_hour}}" id="max_hour" required>
                    </div>
                </div>
                <div class="flex_block" style="flex-direction: column">
                    <label for="web">Сайт</label>
                    @if($info->web == 'NULL')
                    <input type="text" class="web_input" name="web" id="web" placeholder="https://www.example.com">
                        @else
                        <input type="text" class="web_input" name="web" id="web" value="{{$info->web}}" placeholder="https://www.example.com">
                    @endif
                </div>



            </div>

            <div class="form_center_block">
                <div class="flex_block" style="flex-direction: column">
                    <label for="web">Телеграм канал</label>
                    @if($info->telegram == 'NULL')
                        <input type="text" class="web_input" name="telegram" id="web" placeholder="">
                    @else
                        <input type="text" class="web_input" value="{{$info->telegram}}" name="telegram" id="web" placeholder="">
                    @endif
                </div>
                <div class="flex_block" style="flex-direction: column">
                    <label for="web">YouTube канал</label>
                    @if($info->youtube == 'NULL')
                        <input type="text" class="web_input" name="youtube" id="web" placeholder="">
                    @else
                        <input type="text" class="web_input" value="{{$info->youtube}}" name="youtube" id="web" placeholder="">
                    @endif

                </div>
                <div class="flex_block" style="flex-direction: column">
                    <label for="Facebook">Facebook</label>
                    @if($info->facebook == 'NULL')
                        <input type="text" class="web_input" name="facebook" id="facebook" placeholder="">
                    @else
                        <input type="text" class="web_input" value="{{$info->facebook}}" name="facebook" id="facebook" placeholder="">
                    @endif
                </div>
            </div>
            <div class="form_right_block">
                <div class="flex_block" style="flex-direction: column">
                    <label for="web">Яндекс.метрика</label>
                    @if($info->yandex == 'Не указана')
                    <input type="text" class="web_input" name="yandex" id="web" placeholder="">
                    @else
                        <input type="text" class="web_input" value="{{$info->yandex}}" name="yandex" id="web" placeholder="">
                    @endif
                </div>
                <div class="flex_block" style="flex-direction: column">
                    <label for="web">Google Analytics</label>
                    @if($info->google == 'NULL')
                        <input type="text" class="web_input" name="google" id="web" placeholder="">
                    @else
                        <input type="text" class="web_input" value="{{$info->google}}" name="google" id="web" placeholder="">
                    @endif
                </div>
                <div class="form_check" style="margin-top: 55px">
                    <input type="checkbox" value="Да" name="email_req" id="email_req">
                    <label for="email_req"></label>
                    <p>Сделать e-mail обязательным для заполнения</p>
                </div>

            </div>
        </div>
        <h6 style="padding-left: 20px">Интеграция с АльфаSMS ( только для Украины )</h6>
        <hr>
        <div class="form_add">
            <div class="form_left_block" style="flex-direction: column">
                <div class="flex_block" style="flex-direction: column">
                    <label for="web">Ключ</label>
                    @if($info->key_sms == 'NULL')
                        <input type="text" class="web_input" name="key_sms" id="web" placeholder="">
                    @else
                        <input type="text" value="{{$info->key_sms}}" class="web_input" name="key_sms" id="web" placeholder="">
                    @endif
                </div>

            </div>
            <div class="form_center_block">
                <div class="flex_block" style="flex-direction: column">
                    <label for="web">Имя отправителя</label>
                    @if($info->name_sms == 'NULL')
                        <input type="text" class="web_input" name="name_sms" id="web" placeholder="">
                    @else
                        <input type="text" class="web_input" value="{{$info->name_sms}}" name="name_sms" id="web" placeholder="">
                    @endif
                </div>
            </div>
        </div>
        <h6 style="padding-left: 20px">Календарь</h6>
        <hr>
        <div class="form_add">
            <div class="form_left_block" style="flex-direction: column">
                <label for="calendar">Начальная вкладка в календаре</label>
                <select class="profile_select" id="calendar" name="calendar">
                    <option value="{{$info->calendar}}">{{$info->calendar}}</option>
                    @if($info->calendar != 'День')
                    <option value="День">День</option>
                    @elseif($info->calendar != 'Неделя')
                    <option value="Неделя">Неделя</option>
                    @endif
                    @if($info->calendar != 'Месяц')
                    <option value="Месяц">Месяц</option>
                    @endif
                </select>
            </div>
            <div class="form_center_block">
                <div class="form_check" style="margin-top: 40px">
                    @if($info->cancel_calendar == 'Да')
                        <input type="checkbox" value="Да" checked name="cancel_calendar" id="new">
                    @else
                        <input type="checkbox" value="Да" name="cancel_calendar" id="new">
                    @endif
                    <label for="new"></label>
                    <p>Показывать отменённые брони в календаре?</p>
                </div>
            </div>
        </div>

        <h6 style="padding-left: 20px;margin-top: 20px">Адреса квестов</h6>
        <hr>
        <div class="form_add">
            <div class="form_left_block">
                <div class="type_block" style="width: 100%;">
                    <select id="address" name="address">
                        @foreach($user->addresses as $address)
                            <option value="{{$address->id}}">{{$address->city}}, {{$address->address}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form_center_block">
                <button type="button" class="add_address_profile" onclick="address_form()"><i class="fas fa-plus"></i> Добавить адрес</button>
            </div>
        </div>
    </div>
    @endforeach
    <input type="hidden" value="{{$info->id}}" name="id">
    <button type="submit" class="add_form_btn">Создать</button>

</form>
