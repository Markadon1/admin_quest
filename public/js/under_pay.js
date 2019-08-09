$(document).ready(function () {
    if($('#und_pay').is(':checked')){

        $('#dop').show();
        $('#dop_max').show();

        var max = $('#max_gamer').val();
        $('#dop_text').text(max);
    }
    else {

        $('#dop').hide();
        $('#dop_max').hide();

    }
});


function under_pay() {
    if($('#und_pay').is(':checked')){

        $('#dop').show();
        $('#dop_max').show();

        $('#max_gamer_pay').val(100);
        $('#max_gamer_col').val(8);

        var max = $('#max_gamer').val();
        $('#dop_text').text(max);
    }
    else {

        $('#dop').hide();
        $('#dop_max').hide();

        $('#max_gamer_pay').val(0);
        $('#max_gamer_col').val(0);
    }
}
$(function () {
    $('#max_gamer').keyup(function () {

        var max = $('#max_gamer').val();
        $('#dop_text').text(max);
    });
});

function pay_type() {
    var type = $('#type_pay').val();
    $('#pay_type_text').text(type);
}