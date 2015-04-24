<?php
session_start();
include '../phpBackend/connect.php';
include '../phpBackend/checkSession.php';


?>

<html>
<head>
	<title></title>
	<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
	<script src="../js/Chart.min.js"></script>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>Sharity</title>

	<!-- Bootstrap Core CSS -->
	<link href="../css/bootstrap.min.css" rel="stylesheet"/>

	<!-- Custom CSS -->
	<link href="../css/scrolling-nav.css" rel="stylesheet"/>
	<link rel="stylesheet" type="text/css" href="../css/index.css" />
	<link rel="stylesheet" type="text/css" href="../css/list_project.css">
	<link href="../css/main.css" rel="stylesheet"/>
	<link href="../css/fonts.css" rel="stylesheet"/>
	<link href="../css/main-theme.css" rel="stylesheet" type="text/css" title="default" />
	<link href="../css/alternate-theme-1.css" rel="stylesheet" type="text/css" title="alternate" />
	<link href="../css/alternate-theme-2.css" rel="stylesheet" type="text/css" title="alternate2" />
	<link href="../css/alternate-theme-3.css" rel="stylesheet" type="text/css" title="alternate3" />

    <script src="../js/styleswitcher.js" type="text/javascript" ></script>

    <script type="text/javascript">


    $(document).ready(function(){


        var ctx = document.getElementById("canvas").getContext("2d");
        window.myLine = new Chart(ctx).Line(lineChartData, {
            responsive: true
        });
        
        var sumJan = 0;
        var sumFeb = 0;
        var sumMar = 0;
        var sumApr = 0;
        var sumMay = 0;
        var sumJun = 0;
        var sumJul = 0;
        var sumAug = 0;
        var sumSep = 0;
        var sumOkt = 0;
        var sumNov = 0;
        var sumDec = 0;




        $.ajax({
          url : "../phpBackend/getFollowers.php",
          dataType : "json",
          success : function(response){
            alert(response.length + " er responsen");
             var sum = 0;
             var content = "";

             for(var i = 0; i < response.length; i++){
                var y = parseInt(response[i]['date'].substring(0, 4));
                var m = parseInt(response[i]['date'].substring(5, 7));
                var d = parseInt(response[i]['date'].substring(8, 10));


                switch(m){
                   case 1:
                   sumJan += 1;
                   break;
                   case 2:
                   sumFeb += 1;
                   break;
                   case 3:
                   sumMar += 1;
                   break;
                   case 4:
                   sumApr += 1;
                   break;
                   case 5:
                   sumMay += 1;
                   break;
                   case 6:
                   sumJun += 1;
                   break;
                   case 7:
                   sumJul += 1;
                   break;
                   case 8:
                   sumAug += 1;
                   break;
                   case 9:
                   sumSep += 1;
                   break;
                   case 10:
                   sumOkt += 1;
                   break;
                   case 11:
                   sumNov += 1;
                   break;
                   case 12:
                   sumDec += 1;
                   break;
               }




               
           
           }



           localStorage.setItem("january", sumJan);
           localStorage.setItem("february", sumFeb);
           localStorage.setItem("march", sumMar);
           localStorage.setItem("april", sumApr);
           localStorage.setItem("may", sumMay);
           localStorage.setItem("june", sumJun);
           localStorage.setItem("july", sumJul);
           localStorage.setItem("august", sumAug);
           localStorage.setItem("september", sumSep);
           localStorage.setItem("october", sumOkt);
           localStorage.setItem("november", sumNov);
           localStorage.setItem("december", sumDec);


       },
       error : function(error){
       
         alert("Something went worng statistics2.php");
     }
 });



});

var lineChartData = {
	labels : ["January","February","March","April","May","June","July", "August", "September", "October", "November", "December"],
	datasets : [
	{
		label: "12 mnd",
		fillColor : "rgba(360,720,100,0.2)", //farge under grafen
		strokeColor : "red", //farge på linja
		pointColor : "blue", //farge på prikkene
		pointStrokeColor : "blue", // fage på border til prikkene
		pointHighlightFill : "blue", //farge på prikk on hover
		pointHighlightStroke : "blue", // farge på border til prikk on hover
		data : [
		localStorage['january'],
		localStorage['february'],
		localStorage['march'],
		localStorage['april'],
		localStorage['may'],
		localStorage['june'],
		localStorage['july'],
		localStorage['august'],
		localStorage['september'],
		localStorage['october'],
		localStorage['november'],
		localStorage['december']]
	}
	]

}

window.onload = function(){
	
}


</script>


</head>
<body>

	<?php include '../pages/header_nav.php'; ?>
	<canvas id="canvas" width="1200" height="500"></canvas>
	<br/>



	

</body>
</html>

