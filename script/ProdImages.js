$(document).ready(function () { 
    $('#submenu a').click(function () {
        var placeHolder = $('#placeholder');
        if (placeHolder.length == 0)
        {
            // Return true to indicate that there is no placeholder and that the
            // default action for the link should be performed
            return true;
        }
        // Set the source for the image to be the same as the href in the link
        placeHolder.attr('src', $(this).attr('href'));
        var imageAlt = $(this).attr('alt');
        if (imageAlt.length == 0) {
            // If no alt attribute was supplied for the link, set the alt to be 'Unknown Product'.
            imageAlt = "Unknown Product";
        }
        $('#ImageCaption').text(imageAlt);
        // Return false to indicate that we have been successful and so the default action
        // for the link should not take place
        return false;
    });
}); // end document.ready

