
<div class="bg_transp" id="#bg_transp" onclick="close_cost()"></div>

<div class="cashbox_modal" id="cost_modal">
    <div class="cashbox_modal_header">
        <span>Создание статьи</span>
        <button onclick="close_cost()"><i class="fas fa-times"></i></button>
    </div>
    <div class="cashbox_modal_body">
        <input type="hidden" value="0" id="cost_id">
        <div class="cashbox_modal_body_item">
            <label for="name_cost">Название</label>
            <input id="name_cost" name="name_cost" required>
        </div>
        <div id="error_cost_name"></div>
        <div class="cashbox_modal_body_item">
            <label for="descript_cost">Описание</label>
            <input id="descript_cost" name="descript_cost">
        </div>
        <div class="cashbox_modal_body_item">
            <label for="type_cost">Тип</label>
            <select id="type_cost" name="type_cost">
                <option value="-">-</option>
                <option value="Расход">Расход</option>
                <option value="Доход">Доход</option>
                <option value="Перемещение">Перемещение</option>
            </select>
        </div>
        <div id="error_cost"></div>
    </div>

    <button class="cashbox_modal_submit" id="cost_send_btn" type="button" onclick="send_cost()">Сохранить</button>

</div>
<script src="{{asset('js/cost.js')}}"></script>
<div class="cashbox_header stock_add_btn">
    <button type="button" id="create_btn_contragent" onclick="cost()"><i class="fas fa-plus"></i> Создать</button>
</div>
<div class="contragent_content" id="cost_body">
</div>
