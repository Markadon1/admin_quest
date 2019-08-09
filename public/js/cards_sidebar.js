$(document).ready(function () {
    $("#cvest").change();
});

function sidebar() {
    var val = $('.left_bar input[type=radio]:checked').val()
    $.ajax({
        type:'POST',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url:'/cards/menu',
        data: {val:val},
        success:function (result) {
            $('#content_view').html(result);
            if(val === "bonus"){
            window.location.hash = val + "&";
            $("#promo").click();
            }
            else{
                window.location.hash = val;
            }
            if(val === "pay"){
                window.location.hash = val + "&";
                $("#balance").click();
            }

        }
    });

}