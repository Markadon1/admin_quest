<h6>Акции</h6>
<form class="form_add_stock" action="{{url('/stock/create')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <label for="name">Название</label>
    <input type="text" id="name" name="name" value="" required>

    <label for="stock_descript">Описание</label>
    <textarea type="text" id="stock_descript" name="stock_descript" required maxlength="500"></textarea>

    <label for="stock_val">Скидка</label>
    <div style="display: flex">
        <input type="text" id="stock_val" name="stock_val" value="" required>

        <select id="stock_type" name="stock_type">
            <option>%</option>
            <option>грн</option>
        </select>
    </div>

    <div class="form_check">
        <input type="checkbox" value="Да" name="stock_radio" id="stock_radio">
        <label for="stock_radio"></label>
        <p>Применять ли скидку к наценкам?</p>
    </div>
    <button id="form_add_stock_btn" style="display:none;" type="submit"></button>
    <button class="form_add_stock_btn" onclick="return validateForm()" type="button">Сохранить</button>

</form>