function address_form() {
    $('#address_form').animate({
       top: "+=600px"
    },500,function () {

    });
    $('.transp').animate({
        height: "show"
    },0,function () {

    });
}
function close_address() {
    $('#address_form').animate({
        top: "-=600px"
    },500,function () {

    });
    $('.transp').animate({
        height: "hide"
    },0,function () {

    });
}

function req_address() {
    var address = $('#address').val();
    if(address === null){
        alert('Необходимо добавить адрес!');
        $('#address_form').animate({
            top: "+=600px"
        },500,function () {

        });
        $('.transp').animate({
            height: "show"
        },0,function () {

        });
    }
    else{
        $('#req_address').click();
    }
}

function add_form() {
    var $form = $('#form_add_address');
    if(! $form[0].checkValidity()){
        $form.find(':submit').click();
    }
    else{
    var city = $('#city').val()
    var address = $('#address_input').val()
    var metro = $('#metro').val()
        if(metro === null){
            metro = 'NULL'
        }
    var station = $('#station').val()
    var flour = $('#flour').val()
        if(flour === null){
            flour = 'NULL'
        }
    $.ajax({
        type:'POST',
        headers: {
            'X-CSRF-token': $('meta[name="csrf-token"]').attr('content')
        },
        url:'/add_address',
        data: {
            city:city,
            address:address,
            metro:metro,
            station:station,
            flour:flour
        },
        success:function (result) {

            alert('Адрес успешно добавлен!');

            $('#address_form').animate({
                top: "-=600px"
            },500,function () {

            });
            $('.transp').animate({
                height: "hide"
            },0,function () {

            });

            $('#address').html(result);
        }
    });
    }
}