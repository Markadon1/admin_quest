<div class="stock_content_header">
    <div class="col-2 text-center">Название</div>
    <div class="col-2 text-center">Промокод</div>
    <div class="col-1 text-center">Скидка</div>
    <div class="col-2 text-center">Действует до</div>
    <div class="col-2 text-center">Одноразовый</div>
    <div class="col-1 text-center">Наценка</div>
    <div class="col-2 text-center">Кол-во применений</div>
</div>
<hr>
<div class="stock_content_body">
    @foreach($user->cards as $card)
        @foreach($card->promo as $promo)
<div class="stock_content_body_item">
                <div class="col-2 text-center">{{$promo->name}}</div>
                <div class="col-2 text-center">{{$promo->number}}</div>
                <div class="col-1 text-center">{{$promo->stock}} {{$promo->stock_type}}</div>
                <div class="col-2 text-center">{{$promo->date}}</div>
                <div class="col-2 text-center">{{$promo->single}}</div>
                <div class="col-1 text-center">{{$promo->under_stock}}</div>
                <div class="col-2 text-center">{{$promo->quality}}</div>
</div>
            @endforeach
        @endforeach
</div>
