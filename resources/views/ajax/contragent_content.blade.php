<div class="stock_content_header">
    <div class="col-2 text-center">Название</div>
    <div class="col-2 text-center">Телефон</div>
    <div class="col-2 text-center">Почта</div>
    <div class="col-3 text-center">Контактное лицо</div>
    <div class="col-2 text-center">ИНН</div>
    <div class="col-1 text-center"></div>
</div>
<hr>
<div class="contragent_body">
    @if($contr_count == 0)

        @else
    @foreach($user->contragents as $contragent)
            <div class="stock_content_body_item">
                <div class="col-2 text-center">{{$contragent->name}}</div>
                <div class="col-2 text-center">{{$contragent->phone}}</div>
                <div class="col-2 text-center">{{$contragent->email}}</div>
                <div class="col-3 text-center">{{$contragent->face}}</div>
                <div class="col-2 text-center">{{$contragent->inn}}</div>
                <div class="col-1 text-center rest_del">
                    <i class="fas fa-edit" onclick="contragent_restore{{$contragent->id}}()"></i>
                    <i style="margin-left: 10px" class="far fa-trash-alt" onclick="contragent_del{{$contragent->id}}()"></i>
                </div>
            </div>
        <script>
            function contragent_restore{{$contragent->id}}() {
                var id = "{{$contragent->id}}"
                var name = "{{$contragent->name}}"
                var phone = "{{$contragent->phone}}"
                var email = "{{$contragent->email}}"
                var inn = "{{$contragent->inn}}"
                var face = "{{$contragent->face}}"
                var address = "{{$contragent->address}}"
                $.ajax({
                    type: "GET",
                    url: "contragent/create",
                    success:function (result) {
                        $('#stock_form').show().css("display","flex");
                        $('.stock_form').html(result);

                        $('#contr_id').attr("value",id);
                        $('#contr_name').attr("value",name);
                        $('#contr_phone').attr("value",phone);
                        $('#contr_email').attr("value",email);
                        $('#contr_inn').attr("value",inn);
                        $('#contr_address').attr("value",address);
                        $('#contr_face').attr("value",face);
                    }
                })
            }
            function contragent_del{{$contragent->id}}() {
                var id = "{{$contragent->id}}"
                var name = "{{$contragent->name}}"
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