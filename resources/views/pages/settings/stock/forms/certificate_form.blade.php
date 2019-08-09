<h6>Сертификат</h6>
<form class="form_add_stock"  action="{{url('certificate/create')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <label for="number">Номер сертификата</label>
    <input type="text" id="number" name="number" value="CR-{{time()}}">

    <label for="stock_val">Скидка</label>
    <div style="display: flex">
        <input type="text" id="stock_val" name="stock_val" value="">

        <select id="stock_type" name="stock_type">
            <option>%</option>
            <option>грн</option>
        </select>
    </div>

    <label for="date_cert">Действует до</label>
    <input type="text" id="date_cert" name="date_cert" value="">

    <label for="quest">Привязать к квесту</label>
    <select id="quest" name="quest_id">
        @foreach($user->cards as $card)
            <option value="{{$card->id}}">{{$card->name}}</option>
        @endforeach
    </select>

    <div class="form_check">
        <input type="checkbox" value="Да" name="stock_radio" id="stock_radio">
        <label for="stock_radio"></label>
        <p>Применять ли скидку к наценкам?</p>
    </div>
    <div class="form_check">
        <input type="checkbox" checked value="Да" name="active" id="active">
        <label for="active"></label>
        <p>Активировать</p>
    </div>
    <button id="form_add_stock_btn" style="display:none;" type="submit"></button>
    <button class="form_add_stock_btn"  onclick="return validateForm()" type="button">Сохранить</button>
    <script>
        $(function() {
            $('input[name="date_cert"]').daterangepicker({
                singleDatePicker: true,
                showDropdowns: true,
                minYear: 2019,
                maxYear: 2021

            });
        });
    </script>
</form>