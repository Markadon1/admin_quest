<div class="balance_content">
    <div class="balance_left">
        <div class="balance_quality">
            <div class="balance_quality_item">
                <p>Остаток ключей</p>
                <p class="balance_quality_sum">{{$user->key_sum}}</p>
            </div>
            <div class="balance_quality_item">
                <p>Квестов активно</p>
                <p class="balance_quality_sum">{{$quest_count}}</p>
            </div>
            <div class="balance_quality_item">
                <p>Дней до оплаты</p>
                <p class="balance_quality_sum">{{floor($user->key_sum / $quest_count)}}</p>
            </div>
        </div>
        <div class="balance_pay">
            <div class="balance_pay_header">
                Оплатить виджеты на
            </div>
            <div class="balance_pay_content">
                <div class="months" id="months">
                    <input type="radio" id="one_month" onchange="change_month()" checked value="one" name="month">
                    <label for="one_month">1 мес</label>
                    <input type="radio" id="three_month" onchange="change_month()" value="three" name="month">
                    <label for="three_month">3 мес</label>
                    <input type="radio" id="six_month" onchange="change_month()" value="six" name="month">
                    <label for="six_month">6 мес</label>
                    <input type="radio" id="twelve_month" onchange="change_month()" value="twelve" name="month">
                    <label for="twelve_month">12 мес</label>
                </div>

                <div class="balance_pay_quality">
                    <input type="hidden" id="start_quality" value="{{$quest_count * 30}}">
                    <input type="hidden" id="start_sum" value="{{$quest_count * 30 * 10}}">

                    <input type="hidden" id="quality" name="quality" value="{{$quest_count * 30}}">
                    <input type="hidden" id="sum" name="sum" value="{{$quest_count * 30 * 10}}">

                    <p>Кол-во ключей: <span id="quality_text">{{$quest_count * 30}}</span></p>
                    <p>Итого к оплате: <span id="sum_text">{{$quest_count * 30 * 10}} грн</span></p>
                </div>
                <button type="button" onclick="pay()" class="balance_pay_btn">Оплатить</button>
                <p class="document"><span>Договор офёрта</span></p>
            </div>

        </div>
    </div>
    <div class="balance_right">
        <div class="balance_right_img">

        </div>
        <div class="balance_right_content">
            <h4>Как работает биллинг</h4>
            <h5>В день по ключику</h5>
            <p>За использование виджетов для записи онлайн с Вашего счета ежедневно списывается один ключик за каждый активный квест. Если у Вас 3 активных квеста, то ежедневные списания составят 3 ключика. С ценовой политикой можно ознакомиться тут - Тарифы. </p>
            <div class="balance_right_comp">
            <p>Юр лицо:</p>
            <p>ООО 'THE CLAN AGENCY'</p>
            <p>ИНН: *********</p>
            <p>ОГРН: ********</p>
            </div>
        </div>
    </div>
</div>
<script src="{{url('js/balance_quality.js')}}"></script>