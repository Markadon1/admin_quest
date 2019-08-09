<div class="bg_transp" id="#bg_transp" onclick="close_payment()"></div>

<div class="cashbox_modal" id="payment_modal">
    <div class="cashbox_modal_header">
        <span>Создание схемы расходов</span>
        <button onclick="close_payment()"><i class="fas fa-times"></i></button>
    </div>
    <div class="cashbox_modal_body">
        <input type="hidden" value="0" id="payment_id">
        <div class="cashbox_modal_body_item">
            <label for="name_payment">Название</label>
            <input id="name_payment" name="name_payment" required>
        </div>
        <div id="error_cost_name" style="width: 50%;text-align: right;"></div>
        <div class="payment_modal_body_item">
            <label for="game_payment">За игру</label>
            <input id="game_payment" value="0" name="game_payment">
            <select id="type_payment">
                <option value="грн">грн</option>
                <option value="%">%</option>
            </select>
        </div>
        <div class="cashbox_modal_body_item">
            <label for="month_payment">Оклад в месяц</label>
            <input id="month_payment" value="0" name="month_payment" required>
            <span>грн</span>
        </div>
        <div class="cashbox_modal_body_item">
            <label for="one_payment">Оклад за выход</label>
            <input id="one_payment" value="0" name="one_payment" required>
            <span>грн</span>
        </div>
        <div style="justify-content: flex-end; width: 80%" class="form_check">
            <input type="checkbox" value="Да" name="payment_radio" id="payment_radio">
            <label for="payment_radio"></label>
            <p>Учитывать скидку клиентам</p>
        </div>
    </div>

    <button class="cashbox_modal_submit" id="cost_send_btn" type="button" onclick="send_payment()">Сохранить</button>

</div>

<script src="{{asset('js/payment.js')}}"></script>

<div class="cashbox_header stock_add_btn">
    <button type="button" id="create_btn_contragent" onclick="payment()"><i class="fas fa-plus"></i> Создать</button>
</div>
<div class="contragent_content" id="payment_body">
</div>