
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
        $('.menu_anchor').css('height', '0');

        // Puts header at its original position
        $('.menus').css({
            'position': 'relative',
            'top' : '0px'
        });
    }
});










var newsToggle = true;
var statsToggle = true;
var projectToggle = true;
var organizationToggle = true;


$('a[name=showNewsMenu]').on("click", function() {

  if(newsToggle) {

    $("#newsMenu").animate({'height': '50px'}, 800);

    hideProject();
    hideOrganization();
    hideStats();
    



    //setTimeout(showNews, 8)

} else {

    $("#newsMenu").animate({'height': '0'}, 800);
}


newsToggle = !newsToggle;
});

function showNews(){
    $("#newsMenu").animate({'height': '50px'}, 800);
}


$('a[name=showStatsMenu]').on("click", function() {

  if(statsToggle) {

    $("#statsMenu").animate({'height': '50px'}, 800);


    hideNews();
    hideProject();
    hideOrganization();



} else {

    $("#statsMenu").animate({'height': '0'}, 800);
}
statsToggle = !statsToggle;
});


$('a[name=showProjectMenu]').on("click", function() {

  if(projectToggle) {

    $("#projectMenu").animate({'height': '50px'}, 800);

    hideNews();
    hideOrganization();
    hideStats();





} else {

    $("#projectMenu").animate({'height': '0'}, 800);
}
projectToggle = !projectToggle;
});


$('a[name=showOrganizationMenu]').on("click", function() {

  if(organizationToggle) {

    hideNews();
    hideStats();
    hideProject();

    $("#organizationMenu").animate({'height': '50px'}, 800);


    
    
    



} else {

    $("#organizationMenu").animate({'height': '0'}, 800);
}
organizationToggle = !organizationToggle;
});


function hideNews(){
    $("#newsMenu").animate({'height': '0'}, 0);
    newsToggle = true;
}

function hideStats(){
    $("#statsMenu").animate({'height': '0'}, 0);
    statsToggle = true;
}
function hideProject(){
    $("#projectMenu").animate({'height': '0'}, 0);
    projectToggle = true;
}
function hideOrganization(){
    $("#organizationMenu").animate({'height': '0'}, 0);
    organizationToggle = true;
}







