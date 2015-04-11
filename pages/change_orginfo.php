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
    <link href="../css/main-theme.css" rel="stylesheet" type="text/css" title="default" />
    <link href="../css/alternate-theme-1.css" rel="stylesheet" type="text/css" title="alternate" />
    <link href="../css/alternate-theme-2.css" rel="stylesheet" type="text/css" title="alternate2" />
	<link href="../css/alternate-theme-3.css" rel="stylesheet" type="text/css" title="alternate3" />

    <script src="../js/styleswitcher.js" type="text/javascript" ></script>

    </head>

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


                            echo "<label>Adresse</label>";
                            echo '<input type="text" class="form-control" name="address" id="reg_pt2_input" placeholder="" value="' . $address . '"/>';

                            echo "<label>Postnummer</label>";
                            echo '<input type="tel" class="form-control" name="zipcode" id="reg_pt2_input" placeholder="" value="' . $zipcode . '"/>';

                            echo "<label>Telefonnummer</label>";
                            echo '<input type="tel" class="form-control" name="phone" id="reg_pt2_input" placeholder="" value = "' . $phone . '"/>';
                            
                            echo "<label>E-postadresse</label>";
                            echo '<input type="email" class="form-control" name="email" id="reg_pt2_input" placeholder="" value="'. $email . '"/>';
                            
                            echo "<label>Link til hjemmeside</label>";
                            echo '<input type="text" class="form-control" name="website" id="reg_pt2_input" placeholder="" value="' . $website . '"/>';
                            
                            echo "<label>Kontonummer</label>";
                            echo '<input type="tel" class="form-control" name="accountnumber" id="reg_pt2_input" placeholder="" value="' . $accountnumber . '"/>';


                            echo "<label>Velg kategori</label>";
                            echo '<div class="regOrgDropdown">
                            <select class="orgbtn1" name="category">
                            <option value="NULL"></option>
                            <option value="Humanitært" >Humanitært</option>
                            <option value="Dyrevern" >Dyrevern</option>
                            <option value="Forskning" >Forskning</option>
                            <option value="Fundraising" >Fundraising</option>
                            </select>
                            </div>';

                            echo "<label>Beskrivelse av organisasjonen</label>";
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

            $('input[name=phone]').removeClass('empty_input');
            $('input[name=address]').removeClass('empty_input');
            $('input[name=zipcode]').removeClass('empty_input');
            $('input[name=website]').removeClass('empty_input');
            $('input[name=accountnumber]').removeClass('empty_input');
            $('input[name=email]').removeClass('empty_input');
            $('textarea[name=about]').removeClass('empty_input');
            $('select[name=category]').removeClass('empty_input');



            var ok = 1;

            if(phone == ""){
                $('input[name=phone]').addClass('empty_input');
                ok = 0;
            }
            if(address == ""){
                $('input[name=address]').addClass('empty_input');
                ok = 0;
            }
            if(zipcode == ""){
                $('input[name=zipcode]').addClass('empty_input');
                ok= 0;
            }
            if(website == ""){
                $('input[name=website]').addClass('empty_input');
                ok = 0;
            }
            if(accountnumber == "" || accountnumber.length != 11){
                $('input[name=accountnumber]').addClass('empty_input');
                ok = 0;
            }
            if(email == ""){
                $('input[name=email]').addClass('empty_input');
                ok = 0;
            }
            if(about == ""){
                $('textarea[name=about]').addClass('empty_input');
                ok = 0; 
            }
            if(category == "NULL"){
                $('select[name=category]').addClass('empty_input');
                ok = 0;
            }

            if(ok == 0){
                alert("Fyll inn alle felters, informasjon kan gå tapt, trykk ok for å samtykke");
            }

            


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

            alert();
            $.ajax({
                type: "POST",
                dataType : "text",
                url : "../phpBackend/updateOrganization.php",
                data : {"organization" : json},
                success : function(response){
                    if(response == "OK"){
                        alert("Successful ajax request from change_orginfo.js calling to updateOrganization.php " + response);
                        window.location.replace("../pages/home.php");

                    }
                    

                },
                error : function(response){
                    alert("changeorginfor.js error feil fra update organization.php feil i ajax request");
                }

            });

        });

</script>

<script src="../js/stickyheader.js"></script>
</body>

</html>

