function cost() {
    $('#cost_modal').animate({
        top: "+=500",
        opacity: "1"
    },500,function () {});
    $('.bg_transp').show();
    $('#name_cost').attr("value","");
    $('#descript_cost').attr("value","");
    $('#cost_id').attr("value","0")
}
function close_cost(){
    $('#cost_modal').animate({
        top: "-=500",
        opacity: "0"
    },500,function () {});
    $('.bg_transp').hide();
}

function send_cost() {

    var name = $('#name_cost').val()
    var type = $('#type_cost').val()

    var description = $('#descript_cost').val()
    var id = $('#cost_id').val()
    if (description === ""){
        description = "Отсутствует"
    }
    if(name === ""){
        $('#name_cost').css("border","1px solid red");
        $('#error_cost_name').html("Укажите название статьи").css({"color":"red","margin-bottom":"20px","margin-left":"30%"})
    }
    else{
        $('#name_cost').css("border","1px solid #dcd9da");
        $('#error_cost_name').hide();
    if(type === '-'){
        $('#type_cost').css("border","1px solid red");
        $('#error_cost').html("Пожалуйста, выберите тип статьи").css({"color":"red","margin-bottom":"20px","margin-left":"30%"})
    }
    else{
        $('#type_cost').css("border","1px solid #dcd9da");
        $('#error_cost').hide();
    $.ajax({
        type: 'POST',
        headers: {
            'X-CSRF-token': $('meta[name="csrf-token"]').attr('content')
        },
        url: '/add_cost',
        data: {
            name:name,
            type:type,
            description:description,
            id:id
        },
        success: function (result){
            $('#cost_body').html(result);
            if(id === "0"){
                alert('Статья успешно добавлена!');
            }
            $('#cost_modal').animate({
                top: "-=500",
                opacity: "0"
            },500,function () {});
            $('.bg_transp').hide();
        }
    })
    }
    }
}