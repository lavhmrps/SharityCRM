<?php
session_start();

include '../phpBackend/checkSession.php';
include '../phpBackend/connect.php';
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Sharity</title>

    <!-- Bootstrap Core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet"/>
    <!-- End of Bootstrap Core CSS-->

    <!-- Custom CSS -->
    <link href="../css/main.css" rel="stylesheet"/>
    <link href="../css/fonts.css" rel="stylesheet"/>
    <link href="../css/main-theme.css" rel="stylesheet" type="text/css" title="default" />
    <link href="../css/alternate-theme-1.css" rel="stylesheet" type="text/css" title="alternate" />
    <link href="../css/alternate-theme-2.css" rel="stylesheet" type="text/css" title="alternate2" />
    <link href="../css/alternate-theme-3.css" rel="stylesheet" type="text/css" title="alternate3" />

    <script src="../js/styleswitcher.js" type="text/javascript" ></script>
    <!-- End of Custom CSS-->

    <!-- Inkluderer JQuerybiblioteket-->
    <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>

</head>
<body>
 <!-- header -->
 <?php
 include 'header_nav.php';
 ?>
 <!--  End of header-->


 <div class="col-md-4"></div>
 <div class="col-md-4" id="changenewscontainer">
    <div class="col-md-12 text-center" id="reg_pt2_head">

     <!--  Går inn i databasen og skriver ut tittelen til nyheten-->
     <?php

     $newsID = $_SESSION['newsIDtoShow'];
     $sql = "SELECT * FROM news WHERE newsID = $newsID";
     $result = mysqli_query($connection, $sql);

     if($result){
        if(mysqli_num_rows($result) == 1){
            $row = mysqli_fetch_assoc($result);
            echo "<h1>" . $row['title'] . "</h1>";
        }
    }else{

    }
    ?>
    <!-- End -->

</div>




<!--  Går inn i databasen og skriver ut resten av feltene til nyheten som er hentet-->
<?php

$sql = "SELECT * FROM news WHERE newsID = $newsID";
$result = mysqli_query($connection, $sql);

if($result){
    if(mysqli_num_rows($result) == 1){
        $row = mysqli_fetch_assoc($result);



        $title = $row['title'];
        $txt = $row['txt'];
        $backgroundimgURL = $row['backgroundimgURL'];


        echo "<div class='row'>";
        echo "<div class='col-md-4'>";
        echo "<label>Tittel</label>";
        echo "</div>";
        echo "<div class='col-md-8 text-right spanpadding'>";
        echo "<span hidden name='title' class='errorspan'>Kun bokstaver, tall og mellomrom</span>";
        echo "</div>";
        echo "</div>";
        echo '<input type="text" class="form-control" name="title" id="reg_pt2_input" placeholder="" value="' . $title . '"/>'; 

        echo "<div class='row'>";
        echo "<div class='col-md-4'>";
        echo "<label>Om nyheten</label>";
        echo "</div>";
        echo "<div class='col-md-8 text-right spanpadding'>";
        echo "<span hidden name='title' class='errorspan'>Minimum 20 tegn og maks 300 tegn</span>";
        echo "</div>";
        echo "</div>";
        echo '<textarea class="form-control" id="aboutOrg_pt2" rows="5" name="txt" id="aboutOrg" placeholder="Om nyheten">' . $txt . '</textarea>';


        echo '
        <button class="btn bluebtn" id="changenewsbackgroundpic" name="backgroundimgURLbutton">
        Last opp bakgrunnsbilde
        </button>
        <form enctype="multipart/form-data">
        <input type="file" name="backgroundimgURL" style="display:none">
        </form> 
        ';

        echo '
        <button  class="btn" id="main-themebtn3" name="update_info" onclick="SET newsIDtoShow(newsID);">
        Oppdater informasjon
        </button>
        ';
    }
}
?>
<!--  End of databasekobling-->

</div>
<div class="col-md-4"></div>
<div class="col-md-12" id="somespace"></div>

<!-- Bootstrap Core JavaScript -->
<script src="../js/bootstrap.min.js"></script>

<script type="text/javascript" src="../js/change_newsinfo.js">




</script>


</body>

</html>

