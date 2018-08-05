// Replacement for the jQuery toggle() event that was deprecated in jQuery 1.8 and removed
// in jQuery 1.9.  This version found at http://forum.jquery.com/topic/beginner-function-toggle-deprecated-what-to-use-instead

$.fn.clicktoggle = function (open, close)
{
    return this.each(function() {
                                 var clicked = false;
                                 $(this).click(function() {
                                     if (clicked)
                                     {
                                         clicked = false;
                                         return close.apply(this, arguments);
                                     }
                                     clicked = true;
                                     return open.apply(this, arguments);
                                 });
    });
};

$(document).ready(function () {
    $('.prod_description').hide();
    $('.main h2').clicktoggle(
           function() {
               $(this).next('.prod_description').slideDown();
               $(this).addClass('close');
           },
           function() {
               $(this).next('.prod_description').slideUp();
               $(this).removeClass('close');
           }
       ); // end toggle
}); // end ready