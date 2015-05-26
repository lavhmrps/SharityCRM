<?php
session_start();

include '../phpBackend/checkSession.php';
include '../phpBackend/connect.php';



?>


<!DOCTYPE html>
<html lang="en">

<head>
    <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Sharity</title>

    <!-- Bootstrap Core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet"/>
    <!--  /Bootstrap Core CSS -->

    <!-- Custom CSS -->
    <link href="../css/main.css" rel="stylesheet"/>
    <link href="../css/fonts.css" rel="stylesheet"/>

    <!--  Default CSS -->
    <link href="../css/main-theme.css" rel="stylesheet" type="text/css" title="default" />
    <!--  /Degault CSS -->

    <!--  Alternate CSS -->
    <link href="../css/alternate-theme-1.css" rel="stylesheet" type="text/css" title="alternate" />
    <link href="../css/alternate-theme-2.css" rel="stylesheet" type="text/css" title="alternate2" />
    <link href="../css/alternate-theme-3.css" rel="stylesheet" type="text/css" title="alternate3" />
    <!--  /Alternate CSS -->
    <!--  /Custom CSS -->

    <!--  Script to change CSS -->
    <script src="../js/styleswitcher.js" type="text/javascript" ></script>
    <!--  End of script -->

</head>
<body>
    <!--  Includes header -->
    <?php
    include 'header_nav.php';
    ?>
    <!--  End of header -->

    <div class="container">
        <div class="col-md-2"></div>
        <div class="col-md-8" id="changenewscontainer">
            <div class="col-md-12 text-center" id="reg_pt2_head">
                <!--  Connects to database and gets the name of the project-->
                <?php

                $projectID = $_SESSION['projectIDtoShow'];
                $sql = "SELECT * FROM project WHERE projectID = $projectID";
                $result = mysqli_query($connection, $sql);

                if($result){
                    if(mysqli_num_rows($result) == 1){
                        $row = mysqli_fetch_assoc($result);
                        echo "<h1>" . $row['name'] . "</h1>";
                    }
                }
                ?>
                <!--  End of databaseconnection -->

            </div>


            <!-- Connects to database and gets the remaining info about the project -->
            <?php

            $sql = "SELECT * FROM project WHERE projectID = $projectID";
            $result = mysqli_query($connection, $sql);

            if($result){
                if(mysqli_num_rows($result) == 1){
                    $row = mysqli_fetch_assoc($result);



                    $name = $row['name'];
                    $title = $row['title'];
                    $about = $row['about'];
                    $country = $row['country'];
                    $city = $row['city'];
                    $backgroundimgURL = $row['backgroundimgURL'];


                    echo "<div class='row'>";
                    echo "<div class='col-md-4'>";
                    echo "<label>Prosjektnavn</label>";
                    echo "</div>";
                    echo "<div class='col-md-8 text-right spanpadding'>";
                    echo "<span hidden name='title' class='errorspan'>Kun bokstaver, tall og mellomrom</span>";
                    echo "</div>";
                    echo "</div>";
                    echo '<input type="text" class="form-control" name="name" id="reg_pt2_input" placeholder="" value="' . $name . '"/>';
                    
                    echo "<div class='row'>";
                    echo "<div class='col-md-4'>";
                    echo "<label>Tittel</label>";
                    echo "</div>";
                    echo "<div class='col-md-8 text-right spanpadding'>";
                    echo "<span hidden name='title' class='errorspan'>Kun bokstaver, tall og mellomrom</span>";
                    echo "</div>";
                    echo "</div>";
                    echo '<input type="tel" class="form-control" name="title" id="reg_pt2_input" placeholder="" value="' . $title . '"/>';

                    echo "<div class='row'>";
                    echo "<div class='col-md-4'>";
                    echo "<label>Land</label>";
                    echo "</div>";
                    echo "<div class='col-md-8 text-right spanpadding'>";
                    echo "<span hidden name='title' class='errorspan'>Kun bokstaver, tall og mellomrom</span>";
                    echo "</div>";
                    echo "</div>";
                    echo '<input type="email" class="form-control" name="country" id="reg_pt2_input" placeholder="" value="'. $country . '"/>';

                    echo "<div class='row'>";
                    echo "<div class='col-md-4'>";
                    echo "<label>By</label>";
                    echo "</div>";
                    echo "<div class='col-md-8 text-right spanpadding'>";
                    echo "<span hidden name='title' class='errorspan'>Kun bokstaver, tall og mellomrom</span>";
                    echo "</div>";
                    echo "</div>";
                    echo '<input type="text" class="form-control" name="city" id="reg_pt2_input" placeholder="" value="' . $city . '"/>'; 

                    echo "<div class='row'>";
                    echo "<div class='col-md-4'>";
                    echo "<label>Om prosjektet</label>";
                    echo "</div>";
                    echo "<div class='col-md-8 text-right spanpadding'>";
                    echo "<span hidden name='title' class='errorspan'>Minimum 20 tegn og maks 300 tegn</span>";
                    echo "</div>";
                    echo "</div>";
                    echo '<textarea class="form-control" id="aboutOrg_pt2" rows="5" name="about" id="aboutOrg" placeholder="Om prosjektet">' . $about . '</textarea>';


                    echo '
                    <button class="btn bluebtn" name="backgroundimgURLbutton">
                    Last opp bakgrunnsbilde
                    </button>
                    <form enctype="multipart/form-data">
                    <input type="file" name="backgroundimgURL" style="display:none">
                    </form> 
                    ';

                    echo '
                    <button  class="btn btn-success" id="main-themebtn3" name="update_info">
                    Oppdater informasjon
                    </button>
                    ';
                }
            }
            ?>
            <!--  End of databaseconnection -->

        </div>
        <div class="col-md-2"></div>
    </div>

    <!-- Bootstrap Core JavaScript -->
    <script src="../js/bootstrap.min.js"></script>

    <!--  Script to update the projectinformation -->
    <script type="text/javascript" src="../js/change_projectinfo.js">


    </script>
    <!--  End of script -->


</body>

</html>

