<h6>Промокод</h6>
<form class="form_add_stock" action="{{url('promo/create')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <label for="name">Название</label>
    <input type="text" id="name" name="name" value="" required>

    <label for="number">Номер</label>
    <input type="text" id="number" name="number" value="CR-{{time()}}" required>

    <label for="stock_val">Скидка</label>
    <div style="display: flex">
    <input type="text" id="stock_val" name="stock_val" value="" required>

        <select id="stock_type" name="stock_type">
            <option>%</option>
            <option>грн</option>
        </select>
    </div>
    <div id="error_stock">

    </div>

    <label for="date">Действует до</label>
    <input type="text" id="date" name="date" value="" required>

    <label for="quest">Привязать к квесту</label>
    <select id="quest" name="quest_id">
        @foreach($user->cards as $card)
            <option value="{{$card->id}}">{{$card->name}}</option>
            @endforeach
    </select>
    <div class="form_check">
        <input type="checkbox" value="Да" name="single" id="single">
        <label for="single"></label>
        <p>Одноразовый</p>
    </div>
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
    <button style="display: none" id="form_add_stock_btn"></button>
    <button class="form_add_stock_btn" type="button" onclick="return validateForm()">Сохранить</button>
<script>
    $(function() {
        $('input[name="date"]').daterangepicker({
            singleDatePicker: true,
            showDropdowns: true,
            minYear: 2019,
            maxYear: 2021

        });
    });

</script>
</form>
