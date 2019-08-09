<div class="stock_content_header">
    <div class="col-2 text-center">Название</div>
    <div class="col-4 text-center">Условие</div>
    <div class="col-1 text-center">Скидка</div>
    <div class="col-1 text-center">Наценка</div>
    <div class="col-2 text-center">Дата последнего исп</div>
    <div class="col-2 text-center">Кол-во применений</div>
</div>
<hr>
<div class="stock_content_body">
    @foreach($user->stocks as $stock)
        <div class="stock_content_body_item">
        <div class="col-2 text-center">{{$stock->name}}</div>
        <div class="col-4 text-center">{{$stock->description}}</div>
        <div class="col-1 text-center">{{$stock->stock}} {{$stock->stock_type}}</div>
        <div class="col-1 text-center">{{$stock->under_stock}}</div>
        <div class="col-2 text-center">{{$stock->date}}</div>
        <div class="col-2 text-center">{{$stock->quality}}</div>
        </div>
    @endforeach
</div>