<div class="stock_content_header">
    <div class="col-3 text-center">Название</div>
    <div class="col-2 text-center">От услуг</div>
    <div class="col-2 text-center">В месяц</div>
    <div class="col-2 text-center">В день</div>
    <div class="col-2 text-center">Учёт скидки</div>
    <div class="col-1 text-center"></div>
</div>
<hr>
<div class="contragent_body">
    @if($payment_count == 0)

    @else
        @foreach($user->payments as $payment)
            <div class="stock_content_body_item">
                <div class="col-3 text-center">{{$payment->name}}</div>
                <div class="col-2 text-center">{{$payment->sum}} {{$payment->type}}</div>
                <div class="col-2 text-center">
                    {{$payment->month}}
                    @if($payment->month != 0)
                        грн
                        @endif
                </div>
                <div class="col-2 text-center">
                    {{$payment->day}}
                    @if($payment->day != 0)
                        грн
                    @endif
                </div>
                <div class="col-2 text-center">{{$payment->stock}}</div>
                <div class="col-1 text-center rest_del">
                    <i class="fas fa-edit" onclick="payment_restore{{$payment->id}}()"></i>
                    <i style="margin-left: 10px" class="far fa-trash-alt" onclick="payment_del{{$payment->id}}()"></i>
                </div>
            </div>
            <script>
                function payment_restore{{$payment->id}}() {
                    var name = "{{$payment->name}}"
                    var sum = "{{$payment->sum}}"
                    var month = "{{$payment->month}}"
                    var one = "{{$payment->day}}"
                    var id = "{{$payment->id}}"

                            $('#payment_modal').animate({
                                top: "+=500",
                                opacity: "1"
                            },500,function () {});
                            $('.bg_transp').show();
                            $('#name_payment').attr("value",name);
                            $('#game_payment').attr("value",sum);
                            $('#month_payment').attr("value",month);
                            $('#one_payment').attr("value",one);
                            $('#payment_id').attr("value",id);

                }
                function payment_del{{$payment->id}}() {
                    var id = "{{$payment->id}}"
                    $.ajax({
                        type: "POST",
                        url: "/payment/delete",
                        headers: {
                            'X-CSRF-token': $('meta[name="csrf-token"]').attr('content')
                        },
                        data: {id:id},
                        success: function (result) {
                            $('#payment_body').html(result);
                            alert("Схема: '" + name + "' успешно удалена!");
                        }
                    })
                }
            </script>

        @endforeach
    @endif
</div>