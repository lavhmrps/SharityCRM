<?php

if(isset($_POST['logout'])){
    session_destroy();
    session_unset();
    header("Location: ../index.php");
}
?>



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

        <div class="container" id="navbarmenucontainer">
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
            
            <ul class="nav navbar-nav navbar-right">
                <li>
                    <form method="post">
                        <input type="submit" name="logout" id="logoutbtn" value="Logg ut"/>
                    </form>
                </li>
            </ul>
        </div>

        <!-- /.navbar-collapse -->
        <div class="collapse col-md-2"></div>

        <!-- /.container -->
    </div>




</div>


</nav>

<div class="menu_anchor"></div>
<div id="menudropdown">
    <div id="newsMenu" class="menus">
        <ul class="nav navbar-nav">
            <li>
                <a href="../pages/showNews.php">Vis alle</a>
            </li>
            <li>
                <a href="../pages/registerNews.php">Registrer ny</a>

            </li>
        </ul> 
    </div>
    <div id="statsMenu" class="menus" >
        <ul class="nav navbar-nav">
            <li>
                <a href="#">Månedvis</a>
            </li>
            <li>
                <a href="../pages/slick.html">slick</a>
            </li>
            <li>
                <a href="../pages/statistics1.php">År</a>
            </li>
            <li>
                <a href="../pages/statistics.php">Totalt</a>
            </li>
            <li>
                <a href="../pages/statistics2.php">WIP</a>
            </li>
        </ul>      
    </div>
    <div id="projectMenu" class="menus">
        <ul class="nav navbar-nav">
            <li>
             <a href="../pages/showProjects.php">Vis alle</a>
         </li>
         <li>
            <a href="../pages/registerProject.php">Registrer nytt</a>
        </li>
        <li>

        </li>

    </ul>  
</div>
<div id="organizationMenu" class="menus">
    <ul class="nav navbar-nav">
        <li>
         <a href="../pages/home.php">Hjem</a>
     </li>
     <li>
         <a href="../pages/change_orginfo.php">Endre informasjon</a>
     </li>
 </ul>

</div>
</div>


<script type="text/javascript" src="../js/menuBar.js"></script>




