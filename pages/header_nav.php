<script type="text/javascript">
$(document).ready(function(){
    $('a[name=loggUt]').click(function(){
        var url = "../phpBackend/localStorageJStoPHP.php";
        $.ajax({
            type : "POST",
            data : {"logoutFromJS" : "NULL"},
            url : url,
            success : function(response){
                if(response == "OK"){
                    location.reload();
                }
            },
            error : function(){
                alert("Logg ut error from header_nav");
            }
        });
    });
});
</script>



<nav class="navbar navbar-inverse navbar-static-top header">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
    </button>
    <a class="navbar-brand" href="../pages/home.php">Sharity</a>
</div>

<!-- Collect the nav links, forms, and other content for toggling -->
<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
    <ul class="nav navbar-nav navbar-right">

        <li>
            <a href="../pages/home.php">Hjem</a>
        </li>
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Prosjekt<span class="caret"></span></a>
            <ul class="dropdown-menu" id="maindropdown" role="menu">
                <li>
                    <a href="../pages/registerProject.php">Registrer prosjekt</a>
                </li>

                <li>
                    <a href="../pages/showProjects.php">Vis alle prosjekter</a>
                </li>
            </ul>
        </li>
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Nyhet<span class="caret"></span></a>
            <ul class="dropdown-menu" id="maindropdown" role="menu">
                <li>
                    <a href="../pages/registerNews.php">Registrer nyhet</a>
                </li>
                <li>
                    <a href="../pages/showNews.php">Vis alle nyheter</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="../pages/newStatistics.php">Statistikk</a>
        </li>
        <li>
            <a href="../pages/settings.php">Innstillinger</a>
        </li>
        <li>
            <a href="#" name="loggUt">Logg ut</a>
        </li>
    </ul>
</div><!-- /.navbar-collapse -->
</div><!-- /.container-fluid -->
</nav>

<script type="text/javascript" src="../js/menuBar.js"></script>




