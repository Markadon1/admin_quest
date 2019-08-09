function change_month() {
    var change = $('.months input[type=radio]:checked').val();
    var sum = $('#start_sum').val();
    var quality = $('#start_quality').val();

    if(change === 'one'){
        $('#sum_text').text(sum + ' грн');
        $('#quality_text').text(quality);
        $('#sum').attr("value", sum);
        $('#quality').attr("value",quality);
    }
    if(change === 'three'){
        $('#sum_text').text(sum*3 + ' грн');
        $('#quality_text').text(quality * 3);
        $('#sum').attr("value",sum * 3);
        $('#quality').attr("value", quality * 3);
    }
    if(change === 'six'){
        $('#sum_text').text((sum*6 - (sum*6/10)) + ' грн');
        $('#quality_text').text(quality*6);
        $('#sum').attr("value",(sum*6 - (sum*6/10)));
        $('#quality').attr("value",quality*6);
    }
    if(change === 'twelve'){
        $('#sum_text').text((sum*12 - (sum*6/5)) + ' грн');
        $('#quality_text').text(quality*12);
        $('#sum').attr("value",(sum*12 - (sum*6/5)));
        $('#quality').attr("value",quality*12);
    }
}
