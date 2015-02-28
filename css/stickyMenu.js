$(window).scroll(function(e) {

    // Get the position of the location where the scroller starts.
    var scroller_anchor = $(".menu_anchor").offset().top;
    var nav_height = $('.scroller').height();

    // Check if the user has scrolled and the current position is after the scroller start location and if its not already fixed at the top 
    if ($(this).scrollTop() >= scroller_anchor && $('.menus').css('position') != 'fixed') 
    {    // Change the CSS of the scroller to hilight it and fix it at the top of the screen.
        $('.menus').css({
            'position': 'fixed',
            'top': nav_height //49px
        });


    } 
    else if ($(this).scrollTop() < scroller_anchor && $('.menus').css('position') != 'relative') 
    {    // If the user has scrolled back to the location above the scroller anchor place it back into the content.

        // Change the height of the scroller anchor to 0 and now we will be adding the scroller back to the content.
        $('.menu_anchor').css('height', '0px');

        // Puts header at its original position
        $('.menus').css({
            'position': 'relative',
            'top' : '0'
        });
    }
});