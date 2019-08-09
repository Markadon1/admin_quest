<div class="bg_transp" id="#bg_transp" onclick="close_cashbox()"></div>

<div class="cashbox_modal" id="cashbox_modal">
<div class="cashbox_modal_header">
    <span>Кассы и счета</span>
    <button onclick="close_cashbox()"><i class="fas fa-times"></i></button>
</div>
    <div class="cashbox_modal_body">
        <input type="hidden" value="0" id="id">
        <div class="cashbox_modal_body_item">
            <label for="name_cash">Название</label>
            <input id="name_cash" name="name" required>
        </div>
        <div class="cashbox_modal_body_item">
            <label for="comment_cash">Комментарий</label>
            <input id="comment_cash" name="comment">
        </div>
    </div>

        <button class="cashbox_modal_submit" type="button" onclick="send_form()">Сохранить</button>

</div>
<div class="cashbox_header stock_add_btn">
    <button type="button" id="add_cashbox" onclick="cashbox()"><i class="fas fa-plus"></i> Создать</button>
</div>
<div class="cashbox_body" id="cashbox_body">
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
</div>