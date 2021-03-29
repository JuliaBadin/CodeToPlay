$(document).ready(function(){
  var width = $(window).width();
  console.log(width);
  if (width < 990) {
        $("video").attr("src","https://i.imgur.com/xzOdZ96.mp4");
        $("video").attr("controls");
      }

  $('video').on('ended',function(){
      $(".content, .footer").fadeIn("slow");
      $(".footer").css("display","flex");
});
  });

$(window).resize(function(){
  location.reload();
});
