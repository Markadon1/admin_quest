function menu() {
    if($('#click_logo').hasClass('hide_menu')){

        $('#click_logo').removeClass('hide_menu');

        $('#sidebar').animate({
            backgroundColor: "#e1dcdf",
            width: "220px",
            height: "100vh"
        },500, function () {}).addClass('box_shadow');

        $('#menu_logo').animate({
            backgroundColor: "#ffcd19"
        },500,function () {}).addClass('box_shadow_logo');

        $('.menu_item').animate({
            opacity: "1",
            left: "+=220px"
        },500,function () {});
    }
    else{

        $('#click_logo').addClass('hide_menu');

        $('#sidebar').animate({
            backgroundColor: "rgba(0,0,0,0)",
            width: "80px",
            height: "80px"
        },500, function () {}).removeClass('box_shadow');

        $('#menu_logo').animate({
            backgroundColor: "rgba(0,0,0,0)"
        },500,function () {}).removeClass('box_shadow_logo');

        $('.menu_item').animate({
            opacity: "0",
            left: "-=220px"
        },500,function () {});
    }

}
