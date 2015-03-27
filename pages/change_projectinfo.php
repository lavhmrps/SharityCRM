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

    <!-- Custom CSS -->
    <link href="../css/main.css" rel="stylesheet"/>
    <link href="../css/fonts.css" rel="stylesheet"/>
    <link href="../css/main-theme.css" rel="stylesheet" type="text/css" title="default" />
    <link href="../css/alternate-theme-1.css" rel="stylesheet" type="text/css" title="alternate" />
    <link href="../css/alternate-theme-2.css" rel="stylesheet" type="text/css" title="alternate2" />
    <link href="../css/alternate-theme-3.css" rel="stylesheet" type="text/css" title="alternate3" />

    <script src="../js/styleswitcher.js" type="text/javascript" ></script>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

    </head>

    <!-- The #page-top ID is part of the scrolling feature - the data-spy and data-target are part of the built-in Bootstrap scrollspy function -->

    <body>

        <?php
        include 'header_nav.php';
        ?>
        
        <div class="col-md-4"></div>
        <div class="col-md-4" id="changenewscontainer">
            <div class="col-md-12 text-center" id="reg_pt2_head">
                <?php

                $projectID = $_SESSION['projectIDtoShow'];
                $sql = "SELECT * FROM Project WHERE projectID = $projectID";
                $result = mysqli_query($connection, $sql);

                if($result){
                    if(mysqli_num_rows($result) == 1){
                        $row = mysqli_fetch_assoc($result);
                        echo "<h1>" . $row['name'] . "</h1>";
                    }
                }
                ?>

            </div>



            <?php

            $sql = "SELECT * FROM Project WHERE projectID = $projectID";
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



                    echo "<label>Tittel</label>";
                    echo '<input type="text" class="form-control" name="name" id="reg_pt2_input" placeholder="" value="' . $name . '"/>';

                    echo "<label>Brødtekst</label>";
                    echo '<input type="tel" class="form-control" name="title" id="reg_pt2_input" placeholder="" value="' . $title . '"/>';



                    echo "<label>Land</label>";
                    echo '<input type="email" class="form-control" name="country" id="reg_pt2_input" placeholder="" value="'. $country . '"/>';

                    echo "<label>By</label>";
                    echo '<input type="text" class="form-control" name="city" id="reg_pt2_input" placeholder="" value="' . $city . '"/>'; 

                    echo "<label>Om prosjektet</label>";
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

        </div>
        <div class="col-md-4"></div>
        <div class="col-md-12" id="somespace"></div>

        <!-- Bootstrap Core JavaScript -->
        <script src="../js/bootstrap.min.js"></script>

        <script type="text/javascript">

            $(document).ready(function(){
                $.ajax({
                    url : "../phpBackend/getCategoryOrganization.php",
                    success : function(response){
                        $('select[name=category]').val(response);
                    }
                });
            });

            $('button[name=update_info]').click(function(){
                var name = $('input[name=name]').val();
                var title = $('input[name=title]').val();
                var country = $('input[name=country]').val();
                var city = $('input[name=city]').val();
                var about = $('textarea[name=about]').val();


                $('input[name=name]').removeClass('empty_input');
                $('input[name=title]').removeClass('empty_input');
                $('input[name=country]').removeClass('empty_input');
                $('input[name=city]').removeClass('empty_input');
                $('textarea[name=about]').removeClass('empty_input');




                var ok = 1;

                if(name == ""){
                    $('input[name=name]').addClass('empty_input');
                    ok = 0;
                }
                if(title == ""){
                    $('input[name=title]').addClass('empty_input');
                    ok = 0;
                }
                if(country == ""){
                    $('input[name=country]').addClass('empty_input');
                    ok= 0;
                }
                if(city == ""){
                    $('input[name=city]').addClass('empty_input');
                    ok = 0;
                }
                if(about == ""){
                    $('textarea[name=about]').addClass('empty_input');
                    ok = 0; 
                }

                if(ok == 0){
                    alert("Fyll inn alle felter, informasjon kan gå tapt, trykk ok for å samtykke");
                }



                var json = {
                    'name' : name,
                    'title' : title,
                    'country' : country,
                    'city' : city,
                    'about' : about
                };

                json = JSON.stringify(json);

                $.ajax({
                    type: "POST",
                    dataType : "text",
                    url : "../phpBackend/updateProject.php",
                    data : {"project" : json},
                    success : function(response){
                        if(response == "OK"){
                            alert("Successful ajax request from change_projectinfo.js calling to updateProject.php " + response);
                            window.location.replace("../pages/showProjects.php");

                        }


                    },
                    error : function(response){
                        alert("changeorginfor.js error feil fra update organization.php feil i ajax request");
                    }

                });

            });

$("#uploadimg").click(function() {
    $("#file1").trigger('click');
});


</script>


</body>

</html>

