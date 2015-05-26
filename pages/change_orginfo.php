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
    <link href="../css/scrolling-nav.css" rel="stylesheet">
    <link href="../css/main.css" rel="stylesheet"/>
    <link href="../css/fonts.css" rel="stylesheet"/>
    <link href="../css/main-theme.css" rel="stylesheet" type="text/css" title="default" />
    <link href="../css/alternate-theme-1.css" rel="stylesheet" type="text/css" title="alternate" />
    <link href="../css/alternate-theme-2.css" rel="stylesheet" type="text/css" title="alternate2" />
    <link href="../css/alternate-theme-3.css" rel="stylesheet" type="text/css" title="alternate3" />
    <script src="../js/styleswitcher.js" type="text/javascript" ></script>
    <script src="../js/updateOrganization.js"></script>
    <script type="text/javascript">
    function skip(){
        window.location.replace('../pages/home.php');
    }
    </script>
</head>
<body>
    <?php
    include 'header_nav.php';
    ?>
    <div class="container">
        <div class="col-md-2"></div>
        <div class="col-md-8" id="addprojectcontainer">
            <div class="col-md-12 text-center" id="reg_pt2_head">
                <?php
                include '../phpBackend/getOrganization_change_orginfo.php';
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
                    include '../phpBackend/getOrganizationinfo.php';
                    ?>
                    
                </div>
                <div class="col-md-2"></div>
            </div>
        </div>
        <div class="col-md-2"></div>
    </div>
    <!-- Bootstrap Core JavaScript -->
    <script src="../js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../js/change_orginfo.js"></script>
    <script src="../js/stickyheader.js"></script>
</body>
</html>