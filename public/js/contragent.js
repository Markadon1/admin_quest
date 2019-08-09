$(document).ready(function () {
   $.ajax({
       type:'GET',
       url:'/contragent/content',
       success:function (result) {
           $('#contragent_content').html(result);
       }
   })
});