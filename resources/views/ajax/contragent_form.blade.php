<div class="contragent_form">
    <h6>Создание котрагента</h6>
    <form>
    <div class="contragent_form_body">
    <div class="contragent_form_left">
        <label for="contr_name">Название</label>
        <input id="contr_name" required>
        <label for="contr_inn">ИНН</label>
        <input id="contr_inn" required>
        <label for="contr_phone">Телефон</label>
        <input id="contr_phone">
    </div>
        <div class="contragent_form_right">
            <label for="contr_face">Контактное лицо</label>
            <input id="contr_face">
            <label for="contr_email">Почта</label>
            <input id="contr_email">
            <label for="contr_address">Адрес</label>
            <input id="contr_address">
            <input type="hidden" id="contr_id" value="0">
        </div>
    </div>
        <button type="submit" style="display: none" id="contr_submit"></button>
    </form>
    <button class="form_add_contragent_btn" onclick="add_contragent()" type="button">Сохранить</button>


</div>