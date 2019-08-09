function payment() {
    $('#payment_modal').animate({
        top: "+=500",
        opacity: "1"
    },500,function () {});
    $('.bg_transp').show();
    $('#name_payment').attr("value","");
    $('#game_payment').attr("value","0");
    $('#month_payment').attr("value","0");
    $('#one_payment').attr("value","0");
    $('#payment_id').attr("value","0");

}
function close_payment(){
    $('#payment_modal').animate({
        top: "-=500",
        opacity: "0"
    },500,function () {});
    $('.bg_transp').hide();
}

function send_payment() {

    var name = $('#name_payment').val()
    var sum = $('#game_payment').val()
    var month = $('#month_payment').val()
    var one = $('#one_payment').val()
    var id = $('#payment_id').val()
    var type = $('#type_payment').val()
    var stock = 'Нет';
    if($('#payment_radio').is(':checked')){
        stock = 'Да';
    }
    if(sum === ""){
        sum = "0"
    }
    if(month === "0"){
        month = "0"
    }
    if(one === ""){
        one = "0"
    }
    if(name === ""){
        $('#name_payment').css("border","1px solid red");
        $('#error_cost_name').html("Укажите название схемы").css({"color":"red","margin-bottom":"20px","margin-left":"30%"})
    }
    else{
        $('#name_payment').css("border","1px solid #dcd9da");
        $('#error_cost_name').hide();
            $.ajax({
                type: 'POST',
                headers: {
                    'X-CSRF-token': $('meta[name="csrf-token"]').attr('content')
                },
                url: '/add_payment',
                data: {
                    name:name,
                    one:one,
                    sum:sum,
                    month:month,
                    id:id,
                    type:type,
                    stock:stock
                },
                success: function (result){
                    $('#payment_body').html(result);
                    if(id === "0"){
                        alert('Схема успешно добавлена!');
                    }
                    $('#payment_modal').animate({
                        top: "-=500",
                        opacity: "0"
                    },500,function () {});
                    $('.bg_transp').hide();
                }
            })
        }
}