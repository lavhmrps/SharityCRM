<?php
session_start();
include '../phpBackend/connect.php';
include '../phpBackend/checkSession.php';


?>

<html>
<head>
	<title></title>
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

});


var graph;
	var xPadding = 60
	0;
	var yPadding = 30;

	var data = { values:[
		{ X: "Jan", Y: parseInt(localStorage['january']) },
		{ X: "Feb", Y: parseInt(localStorage['february']) },
		{ X: "Mar", Y: parseInt(localStorage['march']) },
		{ X: "Apr", Y: parseInt(localStorage['april']) },
		{ X: "Mai", Y: localStorage['may'] },
		{ X: "Jun", Y: localStorage['june']  },
		{ X: "Jul", Y: localStorage['july']  },
		{ X: "Aug", Y: localStorage['august']  },
		{ X: "Sep", Y: localStorage['september']  },
		{ X: "Okt", Y: localStorage['october']  },
		{ X: "Nov", Y: localStorage['november']  },
		{ X: "Des", Y: localStorage['december']  },
		]};





		function getMaxY() {
			var max = 0;

			for(var i = 0; i < data.values.length; i ++) {
				if(data.values[i].Y > max) {
					max = data.values[i].Y;
				}
			}

			max += 10 - max % 10;
			return max;
		}


		function getXPixel(val) {
			return ((graph.width() - xPadding) / data.values.length) * val + (xPadding * 1.5);
		}

		function getYPixel(val) {
			return graph.height() - (((graph.height() - yPadding) / getMaxY()) * val) - yPadding;
		}

		$(document).ready(function() {
			graph = $('#graph');
			var c = graph[0].getContext('2d');            

			c.lineWidth = 2;
			c.strokeStyle = '#007ec5';
			c.font = 'italic 15pt sans-serif';
			c.textAlign = "center";


			c.beginPath();
			c.moveTo(xPadding, 0);
			c.lineTo(xPadding, graph.height() - yPadding);
			c.lineTo(graph.width(), graph.height() - yPadding);
			c.stroke();


			for(var i = 0; i < data.values.length; i ++) {
				c.fillText(data.values[i].X, getXPixel(i), graph.height() - yPadding + 20);
			}


			c.textAlign = "right"
			c.textBaseline = "middle";

			for(var i = 0; i < getMaxY(); i += 30) {
				c.fillText(i, xPadding - 12, getYPixel(i));
			}

			c.strokeStyle = '#ff6961';


			c.beginPath();
			c.moveTo(getXPixel(0), getYPixel(data.values[0].Y));
			for(var i = 1; i < data.values.length; i ++) {
				c.lineTo(getXPixel(i), getYPixel(data.values[i].Y));
			}
			c.stroke();


			c.fillStyle = '#007ec5';

			for(var i = 0; i < data.values.length; i ++) {  
				c.beginPath();
				c.arc(getXPixel(i), getYPixel(data.values[i].Y), 4, 0, Math.PI * 2, true);

				c.fill();
			}
		});





</script>
</head>
<body>

	<?php include '../pages/header_nav.php'; ?>
	<canvas id="graph" width="1200" height="800"></canvas>
	<br/>
	<table border="5" margin="2" style="width:100%; border: 1px soild black;" id="tabell">
		<tr>
			<td style="font-weight:bold;"><u>ProsjektID</u></td>
			<td style="font-weight:bold;"><u>Prosjektnavn</u></td>		
			<td style="font-weight:bold;"><u>Sum</u></td>
			<td style="font-weight:bold;"><u>Donasjonstype</u></td>
			<td style="font-weight:bold;"><u>Dato</u></td>		
		</tr>
	</table>


	<p id="sum"></p>
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
	<p id="sumDec"></p>
	

</body>
</html>

