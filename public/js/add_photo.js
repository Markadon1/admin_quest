$('#photo_input_restore').change(function (e) {
    e.preventDefault()
    var photo = new FormData()
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content')
    var card_id = $('#card_id_rest').val()
    photo.append('photo', $('#photo_input_restore').prop('files')[0])
    photo.append('card_id', card_id)
    photo.append('_token',CSRF_TOKEN)
    $.ajax({
        type: "POST",
        url: "/multi/add_photo_restore",
        data: photo,
        cache: false,
        contentType: false,
        processData: false,
        success:function (result) {
                $('#photo_all_result').html(result)
        }
    })
});
