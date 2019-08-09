<div class="balance_history">
    <div class="balance_history_header">
        <div class="col-2">Дата</div>
        <div class="col-2">Сумма</div>
        <div class="col-2">Кол-во ключей</div>
    </div>
    <hr>
    @foreach($user->balance as $balance)
    <div class="balance_history_content">
        <div class="col-2">{{$balance->created_at}}</div>
        <div class="col-2">{{$balance->sum}} грн</div>
        <div class="col-2">{{$balance->quality}}</div>
    </div>
    <hr>
        @endforeach
</div>