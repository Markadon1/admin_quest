@if($cashbox_count == 0)
    <div class="cashbox_body_item_none">
        Ни одной кассы не создано
    </div>
@else
    @foreach($user->cashboxes as $cashbox)

        <div class="cashbox_body_item">
            <div>
                <h4>{{$cashbox->name}}</h4>
                <span>{{$cashbox->comment}}</span>
            </div>
            <div>
                <span>Сумма</span>
                <h5>{{$cashbox->sum}} грн</h5>
            </div>
            <div class="cashbox_edit_btn">
                <i class="fas fa-edit" onclick="edit_cashbox_{{$cashbox->id}}()"></i>
                <i style="margin-left: 15px" onclick="cashbox_del{{$cashbox->id}}()" class="far fa-trash-alt"></i>
            </div>
        </div>
        <script>
            function edit_cashbox_{{$cashbox->id}}() {
                var name = "{{$cashbox->name}}"
                var comment = "{{$cashbox->comment}}"
                var id = "{{$cashbox->id}}"
                $('#cashbox_modal').animate({
                    top: "+=500",
                    opacity: "1"
                },500,function () {});
                $('.bg_transp').show();
                $('#name_cash').attr("value",name);
                $('#comment_cash').attr("value",comment);
                $('#id').attr("value",id);
            }

            function cashbox_del{{$cashbox->id}}() {
                var id = "{{$cashbox->id}}"
                var name = "{{$cashbox->name}}"
                $.ajax({
                    type: "POST",
                    url: "cashbox/delete",
                    headers: {
                        'X-CSRF-token': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {id:id},
                    success: function (result) {
                        $('#cashbox_body').html(result);
                        alert("Касса '" + name + "' успешно удалена!");
                    }
                })
            }
        </script>
    @endforeach
@endif