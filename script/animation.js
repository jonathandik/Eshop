$(document).ready(function () {
    $('#photo').animate(
                        {
                            left: '+=400px',
                            height: '+=247px',
                            width: '+=392px'
                        },
                        4000,
                        function () { 
                                     $('#caption').fadeIn(2000,
                                                          function () { 
                                                                       $('#photo, #caption').fadeOut(4000);
                                                                      } 
                                                          );
                                    }
                       ); 
});
