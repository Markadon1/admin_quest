$.ajax({
    type: 'GET',
    url: '/payment',
    success: function (result) {
        $('#payment_body').html(result);
    }
});