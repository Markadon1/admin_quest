function pay() {

    var sum = $('#sum').val()
    var quality = $('#quality').val()

    $.ajax({
        type: 'POST',
        headers: {
            'X-CSRF-token': $('meta[name="csrf-token"]').attr('content')
        },
        url: '/add_balance',
        data:{
            sum:sum,
            quality:quality
        },
        success:function (result) {
          $('#pay_content').html(result);
          alert('Оплата прошла успешно!');
        }
    })
}