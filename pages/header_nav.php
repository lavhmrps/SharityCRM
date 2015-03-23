<?php

if(isset($_POST['logout'])){
    session_destroy();
    session_unset();
    header("Location: ../index.php");
}
?>



<div class="col-lg-11 col-md-11 col-xs-12 header">
        <div class="row">
            <div class="col-lg-4 col-md-4 col-xs-4 text-left" >
                <ul class="nav navbar-nav" id="menunav">
                    <li>
                        <a class="page-scroll" name ="showOrganizationMenu" id="menu" style="cursor:pointer;">Min organisasjon</a>
                    </li>
                    <li>
                        <a class="page-scroll" name ="showProjectMenu" id="menu" style="cursor:pointer;">Prosjekter</a>
                    </li>
                    <li>
                        <a class="page-scroll" name ="showNewsMenu" id="menu" style="cursor:pointer;">Nyheter</a>
                    </li>
                    <li>
                        <a class="page-scroll" name ="showStatsMenu" id="menu" style="cursor:pointer;">Statistikk</a>
                    </li>

                </ul>
            </div>
            <div class="col-lg-4 col-md-4 col-xs-4 text-center">
                <h1>Sharity</h1>
            </div>
            <div class="col-lg-4 col-md-4 col-xs-4 text-right">
                <ul class="nav navbar-nav navbar-right" id="menunav">
                    <li>
                    <form method="post">
                        <input type="submit" name="logout" id="menu" value="Logg ut"/>
                         </form>
                    </li>
                    

                </ul>
                   
            </div>
        </div>
    </div>

<script type="text/javascript" src="../js/menuBar.js"></script>




