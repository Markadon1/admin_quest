
function validateForm()
{

    var z = $('#stock_val').val();
    if(/\D/.test(z))
    {
        $('#stock_val').css("border","1px solid red");
        $('#error_stock').html("Некорректный ввод. Допустимые символы (0-9)").css({"color":"red","margin-bottom":"20px"})
    }
    else{
        $('#form_add_stock_btn').click();
        $('#stock_val').css("border","1px solid #dcd9da");
        $('#error_stock').hide()
    }
}
