<?php
session_start();

include '../phpBackend/checkSession.php';
include '../phpBackend/connect.php';

$organizationNr = $_SESSION['organizationNr'];

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

        <div class="col-md-3"></div>
        <div class="col-md-6">
            <div class="col-md-12 text-center" id="reg_pt2_head">
                <?php

                $sql = "SELECT * FROM Organization WHERE organizationNr = $organizationNr";
                $result = mysqli_query($connection, $sql);

                if($result){
                    if(mysqli_num_rows($result) == 1){
                        $row = mysqli_fetch_assoc($result);
                        echo "<h1>" . $row['name'] . "</h1>";
                    }
                }
                ?>

            </div>
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8 text-center">

                </div>
                <div class="col-md-2"></div>
            </div>
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8">



                    <?php

                    $sql = "SELECT * FROM Organization WHERE organizationNr = $organizationNr";
                    $result = mysqli_query($connection, $sql);

                    if($result){
                        if(mysqli_num_rows($result) == 1){
                            $row = mysqli_fetch_assoc($result);



                            $category = $row['category'];
                            $phone = $row['phone'];
                            $address = $row['address'];
                            $zipcode = $row['zipcode'];
                            $logoURL = $row['logoURL'];
                            $backgroundimgURL = $row['backgroundimgURL'];
                            $website = $row['website'];
                            $accountnumber = $row['accountnumber'];
                            $email = $row['email'];
                            $about = $row['about'];


                            echo '<div class="col-md-10" id="registration_pt2_margin">';
                            echo '<input type="text" class="form-control" name="address" id="reg_pt2_input" placeholder="Adresse" value="' . $address . '"/>';
                            echo '</div>';
                            echo '<div class="col-md-2" id="registration_pt2_margin2">';
                            echo '<input type="tel" class="form-control" name="zipcode" id="reg_pt2_inputZipcode" placeholder="Postnr" value="' . $zipcode . '"/>';
                            echo '</div>';
                            echo '<input type="tel" class="form-control" name="phone" id="reg_pt2_input" placeholder="Telefonnummer" value = "' . $phone . '"/>';
                            echo '<input type="email" class="form-control" name="email" id="reg_pt2_input" placeholder="Email" value="'. $email . '"/>';
                            echo '<input type="text" class="form-control" name="website" id="reg_pt2_input" placeholder="Nettside" value="' . $website . '"/>';
                            echo '<input type="tel" class="form-control" name="accountnumber" id="reg_pt2_input" placeholder="Kontonummer" value="' . $accountnumber . '"/>';



                            echo '<div class="regOrgDropdown">
                            <select class="orgbtn1" name="category">
                            <option value="NULL">Velg kategori</option>
                            <option value="Humanitært" >Humanitært</option>
                            <option value="Dyrevern" >Dyrevern</option>
                            <option value="Forskning" >Forskning</option>
                            <option value="Fundraising" >Fundraising</option>
                            </select>
                            </div>';
                            echo '<textarea class="form-control" id="aboutOrg_pt2" rows="5" name="about" id="aboutOrg" placeholder="Om organisasjonen">' . $about . '</textarea>';
                            echo '
                            <button class="btn bluebtn" name="backgroundimgURLbutton">
                            Last opp bakgrunnsbilde
                            </button>
                            <form enctype="multipart/form-data">
                            <input type="file" name="backgroundimgURL" style="display:none">
                            </form> 
                            ';
                            echo '
                            <button  class="btn bluebtn" name="logoURLbutton">
                            Last opp logo
                            </button>
                            <form enctype="multipart/form-data">
                            <input type="file" name="logoURL" style="display:none">
                            </form> 
                            ';
                            echo '
                            <button  class="btn btn-success" name="update_info">
                            Oppdater informasjon
                            </button>
                            ';
                        }
                    }
                    ?>
                </div>
                <div class="col-md-2"></div>
            </div>
        </div>
        <div class="col-md-3"></div>
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
            var phone = $('input[name=phone]').val();
            var address = $('input[name=address]').val();
            var zipcode = $('input[name=zipcode]').val();
            var website = $('input[name=website]').val();
            var accountnumber = $('input[name=accountnumber]').val();
            var email = $('input[name=email]').val();
            var about = $('textarea[name=about]').val();



            var category = $('select[name=category]').val();

          


            var json = {
                'phone' : phone,
                'address' : address,
                'zipcode' : zipcode,
                'website' : website,
                'accountnumber' : accountnumber,
                'email' : email,
                'about' : about,
                'category' : category
            };

            json = JSON.stringify(json);

            $.ajax({
                type: "POST",
                dataType : "text",
                url : "../phpBackend/updateOrganization.php",
                data : {"organization" : json},
                success : function(response){
                    alert("Successful ajax request from change_orginfo.js calling to updateOrganization.php" + response);
                },
                error : function(response){
                    alert("changeorginfor.js error feil fra update organization.php feil i ajax request");
                }

            });

        });

        </script>


    </body>

    </html>

