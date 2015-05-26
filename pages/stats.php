<?php
session_start();

include '../phpBackend/checkSession.php';
include '../phpBackend/connect.php';

?>

<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Sharity</title>

    <!-- Bootstrap Core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet"/>
    <!-- /Bootstrap Core CSS -->

    <!-- Custom CSS -->
    <link href="../css/scrolling-nav.css" rel="stylesheet">
    <link href="../css/main.css" rel="stylesheet"/>
    <link href="../css/fonts.css" rel="stylesheet"/>

    <!-- Default CSS -->
    <link href="../css/main-theme.css" rel="stylesheet" type="text/css" title="default" />
    <!-- /Default CSS -->

    <!-- Alternate CSS -->
    <link href="../css/alternate-theme-1.css" rel="stylesheet" type="text/css" title="alternate" />
    <link href="../css/alternate-theme-2.css" rel="stylesheet" type="text/css" title="alternate2" />
    <link href="../css/alternate-theme-3.css" rel="stylesheet" type="text/css" title="alternate3" />
    <!-- /Alternate CSS -->

    <link href="../css/datepicker.css" rel="stylesheet"/>
    <!-- /Custom CSS -->

    <!-- Scripts -->
    <script src="../js/styleswitcher.js" type="text/javascript" ></script>
    <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="../js/Chart.min.js"></script>
    <script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.min.js"></script>
    <script src="../js/stats.js"></script>
    <!-- End of scripts -->

</head>
<body>
    <!-- Includes header -->
    <?php
    include 'header_nav.php';
    ?>
    <!-- End of header -->

    <div class="container">

        <!-- Box to pick dates -->
        <div class="col-md-12" id="statschooser">
            <div class="col-md-2">

            </div>
            <div class="col-md-8">
               <div class="input-append date">
                <div class="col-md-6">


                    <select id="choosecriteria">
                        <option value="NULL">Velg statistikktype</option>
                        <option value="0">Dag</option>
                        <option value="1">Mnd</option>
                        <option value="2">År</option>
                        <option value="3">Sammenlign</option>
                    </select>
                </div>
                <div class="col-md-3" id="inputdatepadding">
                    <input class="span2" name="date" size="16" type="text" id="datepickerYear" readonly="readonly" />
                    <input class="span2" name="date2" size="16" type="text" id="datepickerMnd" readonly="readonly" />
                    <input class="span2" name="date3" size="16" type="text" id="datepickerDay" readonly="readonly" />
                </div>
                <div class="col-md-3" id="inputdatepadding">
                </div>
            </div>
        </div>
        <div class="col-md-2"></div>
    </div>
    <!-- End of box to pick dates -->

    <!-- Buttons to choose which stats to get a graph of -->
    <div class="row" id="statschooser">
        <div class="col-md-3"></div>
        <div class="col-md-2">
            <input id="incomeYear" type="button" value="Kroner donert" class="form-control">
            <input id="incomeMnd" type="button" value="Kroner donert" class="form-control">
        </div>
        <div class="col-md-2">
            <input id="donationsYear" type="button" value="Antall donasjoner" class="form-control">
            <input id="donationsMnd" type="button" value="Antall donasjoner" class="form-control">
        </div>
        <div class="col-md-2">
            <input id="followersYear" type="button" value="Følgere" class="form-control">
            <input id="followersMnd" type="button" value="Følgere" class="form-control">
        </div>
        <div class="col-md-3"></div>
    </div>
    <!-- End of buttons to choose graph -->

    <!-- Box to append graph -->
    <div class="col-md-8" id="statbox-1">
       <canvas id="statistikk">
       </canvas>
   </div>
   <!-- End of graphbox -->

   <!-- Box to append text stats -->
   <div class="col-md-4" id="statbox-2">

       <span id="out"></span> 

   </div>
   <!-- End of textstats -->

</div>

<!-- Bootstrap Core JavaScript -->
<script src="../js/bootstrap.min.js"></script>
</body>
</html>