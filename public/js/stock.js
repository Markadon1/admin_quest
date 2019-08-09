function stock_menu() {
    var menu_item = $('.stock_menu input[type=radio]:checked').val()
    $.ajax({
        type:'POST',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url:'/cards/stock_menu',
        data: {menu_item:menu_item},
        success:function (result) {
            $('#stock_content').html(result);
            var url = window.location.href;
            var split = url.split('&');
            split.pop();
            window.location.href = split[0] + "&" + menu_item;
            if(menu_item === 'promo'){
                $('#create_btn_promo').show();
                $('#create_btn_cert').hide();
                $('#create_btn_stock').hide();
            }
            if(menu_item === 'certificate'){
                $('#create_btn_promo').hide();
                $('#create_btn_cert').show();
                $('#create_btn_stock').hide();
            }
            if(menu_item === 'stock'){
                $('#create_btn_promo').hide();
                $('#create_btn_cert').hide();
                $('#create_btn_stock').show();
            }
        }
    });
}

