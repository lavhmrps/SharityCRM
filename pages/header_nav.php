<?php

if(isset($_POST['logout'])){
    session_destroy();
    session_unset();
    header("Location:index.php");
}
?>

<style type="text/css">

    #newsMenu, #statsMenu, #projectMenu, #organizationMenu{
        background-color: #333;
        height:0px;
        width: 100%;
        z-index: 100000;    
        overflow: hidden;
    }
    #newsMenu ul, #statsMenu ul, #projectMenu ul, #organizationMenu ul{
        margin-left: 36%;
        padding:12px;
    }
    #newsMenu ul li, #statsMenu ul li, #projectMenu ul li, #organizationMenu ul li{
        margin-left:50px;
    }

    #newsMenu ul li a, #statsMenu ul li a, #projectMenu ul li a, #organizationMenu ul li a{
        color: #fff;
        padding:2px;
        font-size: 14px;
    }

    #newsMenu ul li a:hover, #organizationMenu ul li a:hover, #statsMenu ul li a:hover, #projectMenu ul li a:hover{
        background-color: transparent;
        color: #ccc;
        text-decoration: none;
    }



</style>

<div class="navbar navbar-inverse" id="topheader">
    <div class="collapse navbar-collapse navbar-ex1-collapse">
        <div class="row" id="topheadertext">
            <div class="col-md-1"></div>
            <div class="col-md-2"></div>
            <div class="col-md-6"><h2>Sharity</h2></div>
            <div class="col-md-2"></div>
            <div class="col-md-1"></div>
        </div>
    </div>
</div>

<!-- Navigation -->
<div class="scroller_anchor"></div>
<nav class="navbar navbar-default top-nav-collapse scroller" role="navigation" id="navbarContainer">
    <div class="col-md-1"></div>
    <div class="col-md-10" id="nobottommargin">

        <div class="container" >
            <div class="navbar-header page-scroll col-md-4">
                <button type="button" class="navbar-toggle btncolor" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <!--<a class="navbar-brand page-scroll" href="javascript:void(0)" id="menu_toggle"></a>
            -->
            </div>


        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse navbar-ex1-collapse col-md-6">

            <ul class="nav navbar-nav" id="menunav">
                <!-- Hidden li included to remove active class from about link when scrolled up past about section -->

                <li>
                    <a class="page-scroll" name ="showProjectMenu" id="scndmenu" style="cursor:pointer;">Prosjekter</a>
                </li>
                <li>
                    <a class="page-scroll" name ="showNewsMenu" id="scndmenu" style="cursor:pointer;">Nyheter</a>
                </li>
                <li>
                    <a class="page-scroll" name ="showStatsMenu" id="scndmenu" style="cursor:pointer;">Statistikk</a>
                </li>
                <li>
                    <a class="page-scroll" name ="showOrganizationMenu" id="scndmenu" style="cursor:pointer;">Min organisasjon</a>
                </li>
            </ul>

        </div>

        <!-- /.navbar-collapse -->
        <div class="collapse col-md-2"></div>

        <!-- /.container -->
    </div>




</div>

<div class="collapse navbar-collapse navbar-ex1-collapse col-md-1" id="logoutContainer">
    <ul class="nav navbar-nav" id="nomargintop">
        <li>
            <form method="post">
                <input type="submit" name="logout" id="logoutbtn" value="Logg ut"/>
            </form>
        </li>
    </ul>

</div>
</nav>

<div class="menu_anchor"></div>
<div id="menudropdown">
    <div id="newsMenu" class="menus">
        <ul class="nav navbar-nav">
            <li>
                <a href="showNews.php">Vis alle</a>
            </li>
            <li>
                <a href="registerNews.php">Registrer ny</a>
            </li>
        </ul> 
    </div>
    <div id="statsMenu" class="menus">
        <ul class="nav navbar-nav">
            <li>
                <a href="#">Månedvis</a>
            </li>
            <li>
                <a href="#">År</a>
            </li>
            <li>
                <a href="statistics.php">Totalt</a>
            </li>
        </ul>      
    </div>
    <div id="projectMenu" class="menus">
        <ul class="nav navbar-nav">
            <li>
               <a href="showProjects.php">Vis alle</a>
           </li>
           <li>
            <a href="registerProject.php">Registrer nytt</a>
        </li>
    </ul>  
</div>
<div id="organizationMenu" class="menus">
    <ul class="nav navbar-nav">
        <li>
           <a href="home.php">Hjem</a>
       </li>
       <li>
           <a href="change_orginfo.php">Endre informasjon</a>
       </li>
   </ul>

</div>
</div>


<script type="text/javascript">
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




</script>





