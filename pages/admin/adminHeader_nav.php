



<nav class="navbar navbar-inverse navbar-static-top header">
<br/>
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
    </button>
    <a class="navbar-brand" href="adminHome.php">Sharity</a>
</div>

<!-- Collect the nav links, forms, and other content for toggling -->
<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
    <ul class="nav navbar-nav navbar-right">

        <li>
            <a href="adminHome.php">Hjem</a>
        </li>
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Organisasjon<span class="caret"></span></a>
            <ul class="dropdown-menu" role="menu">
                <li>
                    <a href="changeOrg.php">Endre info</a>
                </li>

                <li>
                    <a href="changeProject.php">Endre prosjekt</a>
                </li>
                <li>
                    <a href="changeNews.php">Endre nyhet</a>
                </li>
            </ul>
        </li>
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Bruker<span class="caret"></span></a>
            <ul class="dropdown-menu" role="menu">
                <li>
                    <a href="changeUser.php">Endre info</a>
                </li>
                 <li>
                    <a href="changeFriends.php">Endre venner</a>
                </li>
                 <li>
                    <a href="changeSubs.php">Endre abonnementer</a>
                </li>
                <li>
                    <a href="removeDonation.php">Fjern donasjon</a>
                </li>
                 <li>
                    <a href="removeCard.php">Fjern kortinformasjon</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="statistics.php">Statistikk</a>
        </li>
        <li>
            <a href="settings.php">Innstillinger</a>
        </li>
        <li>
            <a href="../../phpBackend/logoutAdmin.php" name="loggUt">Logg ut</a>
        </li>
    </ul>
</div><!-- /.navbar-collapse -->
</div><!-- /.container-fluid -->
<br/>
</nav>

<script type="text/javascript" src="../js/menuBar.js"></script>

