//search box
$('.search-icon').click(function(){
  $(this).parents('.new-form').find('.search').toggleClass('open');
});

$(document).ready(function(){
     if($(window).width()<990){
     $('.info').remove().insertAfter(".profile");
     }
     $(window).resize(function(){

         if ($(window).width() < 990) {
             $('.info').remove().insertAfter(".profile");
             // console.log("oioi");
         } else {
           $('.profile').remove().insertAfter(".info");

         }

     });

})

// $(window).resize(function(){
//
//     if ($(window).width() < 990) {
//         $('.info').remove().insertAfter(".profile");
//         // console.log("oioi");
//     }
//
// });
