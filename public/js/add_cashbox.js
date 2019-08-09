function cashbox() {
    $('#cashbox_modal').animate({
        top: "+=500",
        opacity: "1"
    },500,function () {});
    $('.bg_transp').show();
    $('#name_cash').attr("value","");
    $('#comment_cash').attr("value","");
    $('#id').attr("value","0");
}
function close_cashbox(){
    $('#cashbox_modal').animate({
        top: "-=500",
        opacity: "0"
    },500,function () {});
    $('.bg_transp').hide();

}
function send_form() {
    var name = $('#name_cash').val()
    var comment = $('#comment_cash').val()
    var id = $('#id').val()

    $.ajax({
        type: 'POST',
        headers: {
            'X-CSRF-token': $('meta[name="csrf-token"]').attr('content')
        },
        url: '/add_cashbox',
        data: {
            name:name,
            comment:comment,
            id:id
        },
        success: function (result){
            $('#cashbox_body').html(result);
            if(id === "0"){
            alert('Касса успешно добавлена!');
            }
            $('#cashbox_modal').animate({
                top: "-=500",
                opacity: "0"
            },500,function () {});
            $('.bg_transp').hide();
        }
    })
}