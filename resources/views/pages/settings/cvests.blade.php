<div class="header_quest">
    <h5 class="header_quest_h5">
        Все квесты
    </h5>

    <div class="stock_add_btn add_cvest">
        <a href="{{url('cards/create_cvest')}}">
        <button type="button"><i class="fas fa-plus"></i> Создать</button>
        </a>
    </div>

</div>
<div class="cvests">


    @if($cards_count == 0)
        <div class="">Добавьте первый квест</div>
    @else
    @foreach($user->cards as $card)

    <div class="cvest_item" id="cvest{{$card->id}}">
        <script>
            $('#cvest{{$card->id}}').on('click',function (e) {
                $('#btn_restore{{$card->id}}').click();
            })
        </script>
        @foreach($card->photos as $photo)
            @if($photo->main == 1)
                <div class="img_block">
                <img src="{{asset('images/photo/'.$photo->name)}}">
                </div>
            @endif
        @endforeach
        <div class="cvest_item_content">
            <div>
        <p class="cvest_item_name">{{$card->name}}</p>
            </div>
            <div class="cvest_item_info">
                <p>{{$card->phone}}</p>
                @foreach($card->addresses as $address)
                    <p>{{$address->city}}, {{$address->address}}</p>
                    @endforeach
            </div>
        </div>
    </div>
        <form method="GET" action="{{url('cards/restore')}}">
            @csrf
            <input type="hidden" value="{{$card->id}}" name="id">
            <button id="btn_restore{{$card->id}}" style="display: none" type="submit"></button>
        </form>
        @endforeach
    @endif
</div>