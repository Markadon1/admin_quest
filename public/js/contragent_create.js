$('#create_btn_contragent').click(function () {
    $.ajax({
        type: "GET",
        url: "contragent/create",
        success:function (result) {
            $('#stock_form').show().css("display","flex");
            $('.stock_form').html(result)
        }
    })
});
$('.stock_form_container_close').click(function () {
    $('#stock_form').hide()
});
function add_contragent() {
    var id = $('#contr_id').val()
    var name = $('#contr_name').val()
    var phone = $('#contr_phone').val()
    var email = $('#contr_email').val()
    var inn = $('#contr_inn').val()
    var face = $('#contr_face').val()
    var address = $('#contr_address').val()
    if(name === ''){
        $('#contr_submit').click()
    }
    else{
        if(phone === ''){
            phone = 'Не указан'
        }
        if(email === ''){
            email = 'Не указана'
        }
        if(inn === ''){
            inn = 'Не указан'
        }
        if(face === ''){
            face = 'Не указан'
        }
        if (address === ''){
            address = 'Не указан'
        }
    $.ajax({
        type: "POST",
        headers: {
            'X-CSRF-token': $('meta[name="csrf-token"]').attr('content')
        },
        data: {
            id:id,
            name:name,
            phone:phone,
            email:email,
            inn:inn,
            face:face,
            address:address
        },
        url: "contragent/send",
        success:function (result) {
            $('#stock_form').hide();
            $('#contragent_content').html(result)
        }
    })
    }
}