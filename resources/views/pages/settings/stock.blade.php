
<div class="stock">
    <div class="stock_header">
    <div class="stock_menu">
        <div>
        <input  type="radio" id="certificate" value="certificate" onchange="stock_menu()" name="radio_stock">
            <label class="stock_btn stock_btn_first" for="certificate">Сертификаты</label>
        </div>
        <div>
            <input type="radio" id="promo" onchange="stock_menu()" value="promo" name="radio_stock">
            <label class="stock_btn" for="promo">Промокоды</label>
        </div>
        <div>
            <input type="radio" id="stock" onchange="stock_menu()" value="stock" name="radio_stock">
            <label class="stock_btn stock_btn_last" for="stock">Акции</label>
        </div>
    </div>
        <div class="stock_add_btn">
            <button type="button" id="create_btn_cert"><i class="fas fa-plus"></i> Создать</button>
            <button type="button" style="display: none" id="create_btn_promo"><i class="fas fa-plus"></i> Создать</button>
            <button type="button" style="display: none" id="create_btn_stock"><i class="fas fa-plus"></i> Создать</button>
        </div>
        <script src="{{asset('js/stock_create.js')}}"></script>
    </div>
    <div class="stock_content" >
        <div class="stock_search">
            <input type="search" class="stock_search_input" placeholder="Поиск...">
            <button type="button" class="stock_search_btn">Найти</button>
        </div>

        <div id="stock_content">

        </div>
    </div>
</div>
<script src="{{asset('js/add_stock_form.js')}}"></script>