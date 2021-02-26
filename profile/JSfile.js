//search box
$('.search-icon').click(function(){
  $(this).parents('.new-form').find('.search').toggleClass('open');
});

$(window).resize(function(){

    if ($(window).width() < 990) {
        $('.info').remove().insertAfter(".profile");
        // console.log("oioi");
    } else {
      $('.profile').remove().insertAfter(".info");

    }

});
