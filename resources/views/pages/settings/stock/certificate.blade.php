<div class="stock_content_header">
    <div class="col-2 text-center">Сертификат</div>
    <div class="col-1 text-center">Скидка</div>
    <div class="col-2 text-center">Действует до</div>
    <div class="col-1 text-center">Наценка</div>
    <div class="col-2 text-center">Дата последнего исп</div>
    <div class="col-2 text-center">Кол-во применений</div>
</div>
<hr>
<div class="stock_content_body">
    @foreach($user->cards as $card)
        @foreach($card->certificates as $cert)
            <div class="stock_content_body_item">
                <div class="col-2 text-center">{{$cert->number}}</div>
                <div class="col-1 text-center">{{$cert->stock}} {{$cert->stock_type}}</div>
                <div class="col-2 text-center">{{$cert->date}}</div>
                <div class="col-1 text-center">{{$cert->under_stock}}</div>
                <div class="col-2 text-center">{{$cert->last_date}}</div>
                <div class="col-2 text-center">{{$cert->quality}}</div>
            </div>
        @endforeach
    @endforeach
</div>