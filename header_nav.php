<?php

if(isset($_POST['logout'])){
    session_destroy();
    session_unset();
    header("Location:index.php");
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
        <nav class="navbar navbar-default top-nav-collapse scroller" role="navigation">
            <div class="container">
                <div class="navbar-header page-scroll col-md-4">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand page-scroll" href="#page-top">Sharity</a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse navbar-ex1-collapse col-md-6">
                    <ul class="nav navbar-nav">
                        <!-- Hidden li included to remove active class from about link when scrolled up past about section -->
                        <li class="hidden">
                            <a class="page-scroll" href="#page-top"></a>
                        </li>
                        <li>
                            <a class="page-scroll" href="showProjects.php">Prosjekter</a>
                        </li>
                        <li>
                            <a class="page-scroll" href="showNews.php">Nyheter</a>
                        </li>
                        <li>
                            <a class="page-scroll" href="statistics.php">Statistikk</a>
                        </li>
                        <li>
                            <a class="page-scroll" href="home.php">Min organisasjon</a>
                        </li>

                        <li>
                            <form method="post">
                                <input type="submit" name="logout" value="logg ut"/>
                            </form>
                        </li>
                    </ul>
                </div>
                <div class="col-md-2"></div>
                <!-- /.navbar-collapse -->
            </div>
            <!-- /.container -->
        </nav>




