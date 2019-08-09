
    @foreach($quest->photos as $photo)
        <div id="photo_content{{$photo->id}}">
            <div class="photo_item">
                <img src="{{asset('images/photo/'.$photo->name)}}">
                <div class="photo_item_btns">
                    <input type="hidden" id="photo_id{{$photo->id}}" value="{{$photo->id}}">
                    <input type="hidden" id="card_id{{$quest->id}}{{$photo->id}}" value="{{$quest->id}}">
                    @if($photo->main == 0)
                        <button type="button" id="photo_main_btn{{$photo->id}}" onclick="main{{$photo->id}}()" class="photo_main_btn">Сделать главным</button>
                    @else
                        <button type="button" id="photo_main_btn{{$photo->id}}" class="photo_main_btn box_shadow">Главное фото</button>
                    @endif
                    <button type="button" id="photo_del_btn{{$photo->id}}" onclick="del{{$photo->id}}()" class="photo_del_btn">Удалить</button>
                </div>
            </div>
        </div>

    @endforeach
