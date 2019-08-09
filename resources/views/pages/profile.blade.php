@extends('layouts.header')
@section('content')
<script>
    $(document).ready(function () {
        $.ajax({
            type: 'POST',
            headers: {
                'X-CSRF-token': $('meta[name="csrf-token"]').attr('content')
            },
            url: '/profile/change',
            success:function (result) {
                $('#form_container').html(result);
            }
        })

    })
</script>
    <div class="main">
        <div class="main_page">
            <img src="{{asset('images/icons/profile_set.png')}}" style="margin-right: 10px">
            <h2>Настройки профиля</h2>
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
        <div class="form_container" id="form_container">

        </div>
    </div>
@endsection