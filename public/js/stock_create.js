$('#create_btn_cert').click(function () {
    var form_name = "certificate";
        $.ajax({
            type: "POST",
            url: "cards/bonus/create",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {form_name:form_name},
            success:function (result) {
                $('#stock_form').show().css("display","flex");
                $('.stock_form').html(result)
            }
    })
});
$('#create_btn_promo').click(function () {
    var form_name = "promo";
    $.ajax({
        type: "POST",
        url: "cards/bonus/create",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {form_name:form_name},
        success:function (result) {
            $('#stock_form').show().css("display","flex");
            $('.stock_form').html(result)
        }
    })
});
$('#create_btn_stock').click(function () {
    var form_name = "stock";
    $.ajax({
        type: "POST",
        url: "cards/bonus/create",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {form_name:form_name},
        success:function (result) {
            $('#stock_form').show().css("display","flex");
            $('.stock_form').html(result)
        }
    })
});
$('.stock_form_container_close').click(function () {
   $('#stock_form').hide()
});