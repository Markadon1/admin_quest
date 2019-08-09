
    @if($photo_count <= 4)
        <div style="margin-left: 1%">
            <label id="photo_label" class="btn btn-success" for="photo_input_restore">Добавить фото</label>
            <input type="file" id="photo_input_restore" class="" name="photo" required>
            <input type="hidden" value="{{$card->id}}" name="card_id_rest" id="card_id_rest">
            <script src="{{asset('js/add_photo.js')}}"></script>
        </div>
    @endif
    <div class="photo_container_restore" id="photo_container_restore">
        @foreach($card->photos as $photo)
            <div class="photo_content" id="photo_content{{$photo->id}}">
                <div class="photo_item">
                    <img src="{{asset('images/photo/'.$photo->name)}}">
                    <div class="photo_item_btns">
                        <input type="hidden" id="photo_id{{$photo->id}}" value="{{$photo->id}}">
                        <input type="hidden" id="card_id{{$card->id}}{{$photo->id}}" value="{{$card->id}}">
                        @if($photo->main == 0)
                            <button type="button" id="photo_main_btn{{$photo->id}}" onclick="main_rest{{$photo->id}}()" class="photo_main_btn">Сделать главным</button>
                        @else
                            <button type="button" id="photo_main_btn{{$photo->id}}" class="photo_main_btn box_shadow">Главное фото</button>
                        @endif
                        <button type="button" id="photo_del_btn{{$photo->id}}" onclick="del_rest{{$photo->id}}()" class="photo_del_btn">Удалить</button>
                    </div>
                </div>
            </div>
            <script>
                function main_rest{{$photo->id}}() {

                    var id = $('#photo_id{{$photo->id}}').val()
                    var card_id = $('#card_id{{$card->id}}{{$photo->id}}').val()
                    var restore = "yes"
                    $.ajax({
                        type:'POST',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        url:'/multi/main',
                        data: {
                            id:id,
                            card_id:card_id,
                            restore: restore
                        },
                        success:function (result) {
                            $('#photo_all_result').html(result);

                        }
                    })
                }
                function del_rest{{$photo->id}}() {

                    var id = $('#photo_id{{$photo->id}}').val()
                    $.ajax({
                        type:'POST',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        url:'/multi/delete',
                        data: {id:id},
                        success:function () {
                            $('#photo_content{{$photo->id}}').hide();
                            alert('Фото успешно удалено!');
                        }
                    })
                }
            </script>
        @endforeach
    </div>
