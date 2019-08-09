<div class="stock_content_header">
    <div class="col-3">Название</div>
    <div class="col-3">Тип</div>
    <div class="col-6">Описание</div>
</div>
<hr>
<div class="contragent_body">
    @if($cost_count == 0)
        Статьи отсутствуют
    @else
        @foreach($user->costs as $cost)
            <div class="stock_content_body_item">
                <div class="col-3">{{$cost->name}}</div>
                <div class="col-3" style="display: flex">
                    @if($cost->type == 'Расход')
                        <div class="cost_type_circle" style="background: red;"></div>
                    @elseif($cost->type == 'Доход')
                        <div class="cost_type_circle" style="background: green;"></div>
                    @elseif($cost->type == 'Перемещение')
                        <div class="cost_type_circle" style="background: yellow;"></div>
                    @endif
                    {{$cost->type}}
                </div>
                <div class="col-6">{{$cost->description}}</div>
                <div class="col-1 rest_del">
                    <i class="fas fa-edit" onclick="contragent_restore{{$cost->id}}()"></i>
                    <i style="margin-left: 10px" class="far fa-trash-alt" onclick="contragent_del{{$cost->id}}()"></i>
                </div>
            </div>
            <script>
                function cost_restore{{$cost->id}}() {
                    var id = "{{$cost->id}}"
                    var name = "{{$cost->name}}"
                    var description = "{{$cost->description}}"
                    $.ajax({
                        type: "GET",
                        url: "contragent/create",
                        success:function (result) {
                            $('#stock_form').show().css("display","flex");
                            $('.stock_form').html(result);

                            $('#contr_id').attr("value",id);
                            $('#contr_name').attr("value",name);
                            $('#contr_phone').attr("value",description);
                            $('#type_cost').attr("value",type);
                        }
                    })
                }
                function contragent_del{{$cost->id}}() {
                    var id = "{{$cost->id}}"
                    var name = "{{$cost->name}}"
                    $.ajax({
                        type: "POST",
                        url: "contragent/delete",
                        headers: {
                            'X-CSRF-token': $('meta[name="csrf-token"]').attr('content')
                        },
                        data: {id:id},
                        success: function (result) {
                            $('#contragent_content').html(result);
                            alert("Контрагент: '" + name + "' успешно удалён!");
                        }
                    })
                }
            </script>

        @endforeach
    @endif
</div>