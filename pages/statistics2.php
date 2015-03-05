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

	<script type="text/javascript">


	$(document).ready(function(){
		
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
			url : "../phpBackend/getStatistics.php",
			dataType : "json",
			success : function(response){

				var sum = 0;
				var output = "";
				var content = "";

				for(var i = 0; i < response.length; i++){
					output += "\n\nProjectID: " + response[i]['projectID'] + "\n";
					output +="Prosjektnavn: " + response[i]['name'] + "\n";
					output += "Sum: " + response[i]['sum'] + "\n";
					output += "Donasjonstype: " + response[i]['type'] + "\n";

					var sum_donation = parseInt(response[i]['sum']);

					var d = new Date(response[i]['date']);
					
					var dag = d.getDate();
					var mnd = parseInt(d.getMonth());
					mnd += 1;
					if(d.getFullYear() == new Date().getFullYear()){
						switch(mnd) {
							case 1:
							sumJan += sum_donation;
							break;
							case 2:
							sumFeb += sum_donation;
							break;
							case 3:
							sumMar += sum_donation;
							break;
							case 4:
							sumApr += sum_donation;
							break;
							case 5:
							sumMay += sum_donation;
							break;
							case 6:
							sumJun += sum_donation;
							break;
							case 7:
							sumJul += sum_donation;
							break;
							case 8:
							sumAug += sum_donation;
							break;
							case 9:
							sumSep += sum_donation;
							break;
							case 10:
							sumOkt += sum_donation;
							break;
							case 11:
							sumNov += sum_donation;
							break;
							case 12:
							sumDec += sum_donation;
							break;
							default:
							alert("nan");
						}
					}
					if(parseInt(dag) <= 9){
						dag = "0" + dag;
					}
					if(parseInt(mnd) <= 9){
						mnd = "0" + mnd;
					}
					var date_string =  dag + "." + mnd + "." + d.getFullYear();
					output += "Dato: " + date_string + "\n";
					sum += parseInt(response[i]['sum']);
					content += "<tr><td>" + response[i]['projectID'] + " </td><td>" + response[i]['name'] + "</td><td>" + response[i]['sum'] + "</td><td>" + response[i]['type'] + "</td><td>" + date_string + "</td></tr>";

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

				$("#sum").text("SUM: Kr " + sum + ",-");
				$('#tabell').append(content);

			},
			error : function(){
				alert("Something went worng");
			}
		});


function setLocalStorage(index , value){
	alert(index + " , " + value);
}


});


</script>

<script>
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
	var ctx = document.getElementById("canvas").getContext("2d");
	window.myLine = new Chart(ctx).Line(lineChartData, {
		responsive: true
	});
}


</script>


</head>
<body>

	<?php include '../pages/header_nav.php'; ?>
	<canvas id="canvas" width="1200" height="500"></canvas>
	<br/>




	<!--
	<table border="5" margin="2" style="width:100%; border: 1px soild black;" id="tabell">
		<tr>
			<td style="font-weight:bold;"><u>ProsjektID</u></td>
			<td style="font-weight:bold;"><u>Prosjektnavn</u></td>		
			<td style="font-weight:bold;"><u>Sum</u></td>
			<td style="font-weight:bold;"><u>Donasjonstype</u></td>
			<td style="font-weight:bold;"><u>Dato</u></td>		
		</tr>
	</table>


	-->
	<p id="sum"></p>		
	<!--
	<p id="sumJan" onclick="alert(localStorage['januar'])">Sum jan</p>
	<p id="sumFeb"></p>
	<p id="sumMar"></p>
	<p id="sumApr"></p>
	<p id="sumMay"></p>
	<p id="sumJun"></p>
	<p id="sumJul"></p>
	<p id="sumAug"></p>
	<p id="sumSep"></p>
	<p id="sumOkt"></p>
	<p id="sumNov"></p>
	<p id="sumDec"></p>-->
	

</body>
</html>

