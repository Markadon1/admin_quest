@extends('layouts.header')
@section('content')
<script src="{{asset('js/add_photo.js')}}"></script>
    <div class="main">
        <div class="main_page">
            <h2>Медиа</h2>
        </div>
        <div class="main_else">
            <a href="{{url('cards/')}}"><div class="main_else_add">
                    <button class="cancel_btn add_card_hover"><i class="far fa-times-circle"></i></button>
                </div>
            </a>
        </div>
    </div>
    <div class="content_view">
        <div class="form_container">
            <h5>Добавление фото и видео на квест "{{$quest->name}}"</h5>
            <hr>
            @if(session()->has('success'))
                {{session('success')}}
                <hr>
                @endif
            @if($photo_count <= 5)
            <form method="POST" id="photo_form" action="{{url('/multi/add_photo')}}" enctype="multipart/form-data">
            @csrf
                <label id="photo_label" class="btn btn-success" for="photo_input">Добавить фото</label>
                <input type="file" id="photo_input" class="" name="photo" required>
                <input type="hidden" value="{{$quest->id}}" name="card_id">
                <button type="submit" style="display: none" id="go"></button>
            </form>
                <script>
                    $('#photo_input').change(function(e) {
                        $('#go').click();
                    });
                </script>
            @endif
            <div id="photo_container">
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
                        <script>
                          function main{{$photo->id}}() {

                                var id = $('#photo_id{{$photo->id}}').val()
                                var card_id = $('#card_id{{$quest->id}}{{$photo->id}}').val()
                                $.ajax({
                                    type:'POST',
                                    headers: {
                                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                    },
                                    url:'/multi/main',
                                    data: {
                                        id:id,
                                        card_id:card_id
                                    },
                                    success:function (result) {
                                        $('#photo_container').html(result);

                                    }
                                })
                            }
                           function del{{$photo->id}}() {

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
        </div>
    </div>
@endsection