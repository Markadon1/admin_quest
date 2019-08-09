$.ajax({
    type: 'GET',
    url: '/costs',
    success: function (result) {
        $('#cost_body').html(result);
    }
});