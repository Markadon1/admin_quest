$(document).ready(function () {
    var balance_item = "balance"
    $.ajax({
        type:'GET',
        url:'/pay/menu',
        data: {balance_item:balance_item},
        success:function (result) {
            $('#pay_content').html(result);
            var url = window.location.href;
            var split = url.split('&');
            split.pop();
            window.location.href = split[0] + "&" + balance_item;
        }
    });
});
function balance() {
    var balance_item = $('.balance_menu input[type=radio]:checked').val()
    $.ajax({
        type:'GET',
        url:'/pay/menu',
        data: {balance_item:balance_item},
        success:function (result) {
            $('#pay_content').html(result);
            var url = window.location.href;
            var split = url.split('&');
            split.pop();
            window.location.href = split[0] + "&" + balance_item;
        }
    });
}