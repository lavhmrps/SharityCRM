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
    <!--  /Bootstrap Core CSS -->

    <!-- Custom CSS -->
    <link href="../css/scrolling-nav.css" rel="stylesheet">
    <link href="../css/main.css" rel="stylesheet"/>
    <link href="../css/fonts.css" rel="stylesheet"/>

    <!--  Default CSS -->
    <link href="../css/main-theme.css" rel="stylesheet" type="text/css" title="default" />
    <!--  /Default CSS -->

    <!--  Alternate CSS -->
    <link href="../css/alternate-theme-1.css" rel="stylesheet" type="text/css" title="alternate" />
    <link href="../css/alternate-theme-2.css" rel="stylesheet" type="text/css" title="alternate2" />
    <link href="../css/alternate-theme-3.css" rel="stylesheet" type="text/css" title="alternate3" />
    <!--  /alternate CSS -->

    <link href="../css/datepicker.css" rel="stylesheet"/>
    <!--  /CUstom CSS -->

    <!-- Scripts -->
    <script src="../js/styleswitcher.js" type="text/javascript" ></script>
    <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="../js/Chart.min.js"></script>
    <script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.min.js"></script>
    <script src="../js/comparison.js">

    </script>
    <!--  /Scripts -->

</head>
<body>
    <!--  includes header-->
    <?php
    include 'header_nav.php';
    ?>
    <!--  End of header -->

    <div class="container">

      <!--  Inputbox for dates -->
      <div class="col-md-12" id="statschooser">
         <div class="col-md-2">

         </div>
         <div class="col-md-8">
            <div class="input-append date">
               <div class="col-md-6">
                   <select id="choosecriteria">
                      <option value="NULL">Hva vil du sammenligne? </option>
                      <option value="0">Dager</option>
                      <option value="1">Måneder</option>
                      <option value="2">År</option>
                  </select>
              </div>
              <div class="col-md-3" id="inputdatepadding">
               <input class="span2" name="date" size="16" type="text" id="datepickerDay1" readonly="readonly" placeholder="Dag 1" />
               <input class="span2" name="date3" size="16" type="text" id="datepickerMnd1" readonly="readonly" placeholder="Måned 1" />
               <input class="span2" name="date5" size="16" type="text" id="datepickerYear1" readonly="readonly" placeholder="År 1" />
           </div>
           <div class="col-md-3" id="inputdatepadding">
               <input class="span2" name="date2" size="16" type="text" id="datepickerDay2" readonly="readonly" placeholder="Dag 2" />
               <input class="span2" name="date4" size="16" type="text" id="datepickerMnd2" readonly="readonly" placeholder="Måned 2" />
               <input class="span2" name="date6" size="16" type="text" id="datepickerYear2" readonly="readonly" placeholder="År 2"/>
           </div>
       </div>
   </div>
   <div class="col-md-2"></div>
</div>
<!--  End of inputbox for dates -->

<!--  3 first boxes which contains compared statistics -->
<div class="col-md-12">
 <div class="row">

    <div class="col-md-4" id="statbox3">
       <h2>Nye følgere</h2>
       <div class="row">
          <div class="col-md-2">
             <span id="followersFirstDate"></span> 
         </div>
         <div class="col-md-8">
             <canvas id="statistikk1">
             </canvas>
         </div>
         <div class="col-md-2">
             <span id="followersLastDate"></span> 
         </div>
     </div>
 </div>

 <div class="col-md-4" id="statbox3">
   <h2>Donasjoner</h2>
   <div class="col-md-2">
      <span id="donationsFirstDate"></span> 
  </div>
  <div class="col-md-8">
      <canvas class="" id="statistikk2">
      </canvas>
  </div>
  <div class="col-md-2">
      <span id="donationsLastDate"></span> 
  </div>
</div>

<div class="col-md-4" id="statbox3">
   <h2>Kroner donert</h2>
   <div class="col-md-2">
      <span id="moneyDonatedFirstDate"></span> 
  </div>
  <div class="col-md-8">
      <canvas id="statistikk3">
      </canvas>
  </div>
  <div class="col-md-2">
      <span id="moneyDonatedLastDate"></span> 
  </div>
</div>


</div>

</div>
<!--  End of 3 first statistics boxes -->

<!--  Last 3  boxes which contains compared statistics-->
<div class="col-md-12">
 <div class="row">

    <div class="col-md-4" id="statbox3">
       <h2>Gjennomsnittdonasjon</h2>
       <div class="col-md-2">
          <span id="averageDonationFirstDate"></span> 
      </div>
      <div class="col-md-8">
          <canvas id="statistikk4">
          </canvas>
      </div>
      <div class="col-md-2">
          <span id="averageDonationLastDate"></span> 
      </div>
  </div>

  <div class="col-md-4" id="statbox3">
   <h2>Nye nyheter</h2>
   <div class="col-md-2">
      <span id="newsFirstDate"></span> 
  </div>
  <div class="col-md-8">
      <canvas id="statistikk5">
      </canvas>
  </div>
  <div class="col-md-2">
      <span id="newsLastDate"></span> 
  </div>
</div>

<div class="col-md-4" id="statbox3">
   <h2>Nye prosjekter</h2>
   <div class="col-md-2">
      <span id="prosjectsFirstDate"></span> 
  </div>
  <div class="col-md-8">
      <canvas id="statistikk6">
      </canvas>
  </div>
  <div class="col-md-2">
      <span id="prosjectsLastDate"></span> 
  </div>
</div>
</div>
</div>
<!--  End of 3 last statistics boxes -->

<!-- Written stats-->
<div class="col-md-12 text-center" id="statstext">

 <h2>Skriftlig statistikk</h2>
 <div class="col-md-6 text-left" id="statbox2">
    <div class="col-md-5"></div>
    <div class="col-md-7">
        <span id="firstDate"></span> 
    </div>
</div>

<div class="col-md-6 text-left" id="statbox2">
    <div class="col-md-4"></div>
    <div class="col-md-8">
        <span id="lastDate"></span> 
    </div>
</div>

</div>
<!-- End of written stats -->

</div>


<!-- Bootstrap Core JavaScript -->
<script src="../js/bootstrap.min.js"></script>
</body>
</html>