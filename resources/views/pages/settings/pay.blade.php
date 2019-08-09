
<div class="stock">
    <div class="stock_header">
        <div class="stock_menu balance_menu" id="balance_menu">
            <div>
                <input  type="radio" id="balance" checked value="balance" onchange="balance()" name="radio_stock">
                <label class="stock_btn stock_btn_first" for="balance">Оплата</label>
            </div>
            <div>
                <input type="radio" id="history" onchange="balance()" value="history" name="radio_stock">
                <label class="stock_btn stock_btn_last" for="history">История</label>
            </div>
        </div>

    </div>
    <div class="pay_content" id="pay_content">

    </div>
    <script src="{{asset('js/balance.js')}}"></script>
    <script src="{{asset('js/add_balance.js')}}"></script>
</div>