$(document).ready(function () {
    var card_id = $('#card_id').val()
    $.ajax({
        type: "POST",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url:'/load_photo_rest',
        data: {card_id:card_id},
        success:function (result) {
            $('#photo_all_result').html(result);
        }
    })
});