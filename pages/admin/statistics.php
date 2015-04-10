<?php
	include '../../phpBackend/connect.php';
	include '../../phpBackend/CheckAdminSession.php';
?>

<!DOCTYPE html>
<html>
<head>

	<title>Admin</title>
	

	<link href="../../css/bootstrap.min.css" rel="stylesheet">
	<link href="../../css/Admin.css" rel="stylesheet">

	<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>

	<script src="../../js/Chart.min.js"></script>

	<script>
	$(document).ready(function(){
		$('button[name=day]').click(function(){
			alert("DayCliick");
		});
		$('button[name=week]').click(function(){
			alert("WeekClick");
		});
		$('button[name=month]').click(function(){
			alert("MonthClick");
		});
		$('button[name=year]').click(function(){
			alert("YearClick");
		});
		$('button[name=allTime]').click(function(){
			alert("AllTimeClick");
		});
	});
	</script>

	<script type="text/javascript">
	$(document).ready(function(){
		alert("Hello");
		$("button[name=day]").click(function(e){

			if(localStorage.getItem('showGraph') == 0){
				$('#canvas').hide();
			}else{
				$("#canvas").show();
			}

			$('#yearlabel').text("Statistikk for: " + localStorage.getItem("CurrentYearStatisticsIncome"));

			localStorage.setItem("CurrentYearStatisticsIncome", "[YEAR]");


			$('button[name=year]').click(function(event){

				alert("button");
				localStorage.setItem('showGraph', 1);
				$('#canvas').show();
				event.preventDefault();
				var year = $('input[name=date]').val();
				showStatisticsYear(year);
			});
			$('button[name=allTime]').click(function(event){
				localStorage.setItem('showGraph', 1);
				$('#canvas').show();
				event.preventDefault();
				var year = $('input[name=date]').val();
				showStatisticsAllTime();
			});
			$('button[name=day]').click(function(event){
				localStorage.setItem("showGraph", 0);
				$('#canvas').hide();
			});
			$('button[name=week]').click(function(event){
				alert("button");
				localStorage.setItem('showGraph', 1);
				$('#canvas').show();
				event.preventDefault();
				var date = $('input[name=date]').val();
				showStatisticsWeek(date);
			});
		});


function showStatisticsYear(year){
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



	$.ajax({
		type:"POST",
		data: {"getSQL" :  "SELECT * FROM Donation"},
		url : "http://localhost/SharityCRM/appBackend/appBackend.php",
		dataType : "json",
		success : function(response){
			var sum = 0;
			var content = "";

			for(var i = 0; i < response.length; i++){
				var y = parseInt(response[i]['date'].substring(0, 4));
				var m = parseInt(response[i]['date'].substring(5, 7));
				var d = parseInt(response[i]['date'].substring(8, 10));

				if(year == y){
					switch(m){
						case 1:
						sumJan += parseInt(response[i]['sum']);
						break;
						case 2:
						sumFeb += parseInt(response[i]['sum']);
						break;
						case 3:
						sumMar += parseInt(response[i]['sum']);
						break;
						case 4:
						sumApr += parseInt(response[i]['sum']);
						break;
						case 5:
						sumMay += parseInt(response[i]['sum']);
						break;
						case 6:
						sumJun += parseInt(response[i]['sum']);
						break;
						case 7:
						sumJul += parseInt(response[i]['sum']);
						break;
						case 8:
						sumAug += parseInt(response[i]['sum']);
						break;
						case 9:
						sumSep += parseInt(response[i]['sum']);
						break;
						case 10:
						sumOkt += parseInt(response[i]['sum']);
						break;
						case 11:
						sumNov += parseInt(response[i]['sum']);
						break;
						case 12:
						sumDec += parseInt(response[i]['sum']);
						break;
					}
				}





				sum += parseInt(response[i]['sum']);
				content += "<tr><td>" + response[i]['projectID'] + " </td><td>" + response[i]['name'] + "</td><td>" + response[i]['sum'] + "</td><td>" + response[i]['type'] + "</td><td>" + d + "." + m + "." + y + "</td></tr>";

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


			location.reload();
			localStorage.setItem("CurrentYearStatisticsIncome", year);


		},
		error : function(){
			alert("Something went worng");
		}
	});
}

function showStatisticsMonth(date){
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



	$.ajax({
		type:"POST",
		data: {"getSQL" :  "SELECT * FROM Donation WHERE YEAR(date(date))=YEAR("year")"},
		url : "http://localhost/SharityCRM/appBackend/appBackend.php",
		dataType : "json",
		success : function(response){
			var sum = 0;
			var content = "";

			for(var i = 0; i < response.length; i++){
				var y = parseInt(response[i]['date'].substring(0, 4));
				var m = parseInt(response[i]['date'].substring(5, 7));
				var d = parseInt(response[i]['date'].substring(8, 10));



				if(year == y){
					switch(m){
						case 1:
						sumJan += parseInt(response[i]['sum']);
						break;
						case 2:
						sumFeb += parseInt(response[i]['sum']);
						break;
						case 3:
						sumMar += parseInt(response[i]['sum']);
						break;
						case 4:
						sumApr += parseInt(response[i]['sum']);
						break;
						case 5:
						sumMay += parseInt(response[i]['sum']);
						break;
						case 6:
						sumJun += parseInt(response[i]['sum']);
						break;
						case 7:
						sumJul += parseInt(response[i]['sum']);
						break;
						case 8:
						sumAug += parseInt(response[i]['sum']);
						break;
						case 9:
						sumSep += parseInt(response[i]['sum']);
						break;
						case 10:
						sumOkt += parseInt(response[i]['sum']);
						break;
						case 11:
						sumNov += parseInt(response[i]['sum']);
						break;
						case 12:
						sumDec += parseInt(response[i]['sum']);
						break;
					}
				}
				sum += parseInt(response[i]['sum']);
				content += "<tr><td>" + response[i]['projectID'] + " </td><td>" + response[i]['name'] + "</td><td>" + response[i]['sum'] + "</td><td>" + response[i]['type'] + "</td><td>" + d + "." + m + "." + y + "</td></tr>";

$.ajax({
	type:"POST",
	data: {"getSQL" :  "SELECT * FROM Donation"},
	url : "http://localhost/SharityCRM/appBackend/appBackend.php",
	dataType : "json",
	success : function(response){
		var sum = 0;
		var content = "";

		for(var i = 0; i < response.length; i++){
			var y = parseInt(response[i]['date'].substring(0, 4));
			var m = parseInt(response[i]['date'].substring(5, 7));
			var d = parseInt(response[i]['date'].substring(8, 10));







			switch(m){
				case 1:
				sumJan += parseInt(response[i]['sum']);
				break;
				case 2:
				sumFeb += parseInt(response[i]['sum']);
				break;
				case 3:
				sumMar += parseInt(response[i]['sum']);
				break;
				case 4:
				sumApr += parseInt(response[i]['sum']);
				break;
				case 5:
				sumMay += parseInt(response[i]['sum']);
				break;
				case 6:
				sumJun += parseInt(response[i]['sum']);
				break;
				case 7:
				sumJul += parseInt(response[i]['sum']);
				break;
				case 8:
				sumAug += parseInt(response[i]['sum']);
				break;
				case 9:
				sumSep += parseInt(response[i]['sum']);
				break;
				case 10:
				sumOkt += parseInt(response[i]['sum']);
				break;
				case 11:
				sumNov += parseInt(response[i]['sum']);
				break;
				case 12:
				sumDec += parseInt(response[i]['sum']);
				break;

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

			location.reload();
			localStorage.setItem("CurrentYearStatisticsIncome", year);
		},
		error : function(){
			alert("Something went worng");
		}
	});
	}
}

function showStatisticsWeek(date){
	var sumMon = 0;
	var sumTue = 0;
	var sumWed = 0;
	var sumThu = 0;
	var sumFri = 0;
	var sumSat = 0;
	var sumSun = 0;

	localStorage.setItem("monday", sumMon);
	localStorage.setItem("tuesday", sumTue);
	localStorage.setItem("wedensday", sumWed);
	localStorage.setItem("thursday", sumThu);
	localStorage.setItem("friday", sumFri);
	localStorage.setItem("saturday", sumSat);
	localStorage.setItem("sunday", sumSun);



	$.ajax({
		type:"POST",
		data: {"getSQL" :  "SELECT * FROM Donation WHERE WEEKOFYEAR(date(date))=WEEKOFYEAR('"date"')"},
		url : "http://localhost/SharityCRM/appBackend/appBackend.php",
		dataType : "json",
		success : function(response){
			var sum = 0;
			var content = "";

			for(var i = 0; i < response.length; i++){
				var y = parseInt(response[i]['date'].substring(0, 4));
				var m = parseInt(response[i]['date'].substring(5, 7));
				var d = parseInt(response[i]['date'].substring(8, 10));



				if(year == y){
					switch(m){
						case 1:
						sumMon += parseInt(response[i]['sum']);
						break;
						case 2:
						sumTue += parseInt(response[i]['sum']);
						break;
						case 3:
						sumWed += parseInt(response[i]['sum']);
						break;
						case 4:
						sumThu += parseInt(response[i]['sum']);
						break;
						case 5:
						sumFri += parseInt(response[i]['sum']);
						break;
						case 6:
						sumSat += parseInt(response[i]['sum']);
						break;
						case 7:
						sumSun += parseInt(response[i]['sum']);
						break;
					}
				}





				sum += parseInt(response[i]['sum']);
				content += "<tr><td>" + response[i]['projectID'] + " </td><td>" + response[i]['name'] + "</td><td>" + response[i]['sum'] + "</td><td>" + response[i]['type'] + "</td><td>" + d + "." + m + "." + y + "</td></tr>";

			}



			localStorage.setItem("monday", sumMon);
			localStorage.setItem("tuesday", sumTue);
			localStorage.setItem("wedensday", sumWed);
			localStorage.setItem("thursday", sumThu);
			localStorage.setItem("friday", sumFri);
			localStorage.setItem("saturday", sumSat);
			localStorage.setItem("sunday", sumSun);


			location.reload();
			localStorage.setItem("CurrentYearStatisticsIncome", date);


		},
		error : function(){
			alert("Something went worng");
		}
	});
}


</script>

<script>

var lineChartData = {
	labels : ["January","February","March","April","May","June","July", "August", "September", "October", "November", "December"],
	datasets : [
	{
		label: "12 mnd",
		fillColor : "#1A324C", //farge under grafen
		strokeColor : "#1A324C", //farge på linja
		pointColor : "#1A324C", //farge på prikkene
		pointStrokeColor : "#1A324C", // fage på border til prikkene
		pointHighlightFill : "#1A324C", //farge på prikk on hover
		pointHighlightStroke : "#1A324C", // farge på border til prikk on hover
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
		localStorage['december']


		]

	},
	{
		label: "123 mnd",
		fillColor : "rgba(255,107,107,0.08)", //farge under grafen
		strokeColor : "#FF6B6B", //farge på linja
		pointColor : "#FF6B6B", //farge på prikkene
		pointStrokeColor : "#FF6B6B", // fage på border til prikkene
		pointHighlightFill : "#FF6B6B", //farge på prikk on hover
		pointHighlightStroke : "#FF6B6B", // farge på border til prikk on hover
		data : [

		//Math.floor((Math.random() * 10000) + 1000)
		]
	},
	{
		label: "123 mnd",
		fillColor : "rgba(106,26,210,0.08)", //farge under grafen
		strokeColor : "#6A1AD2", //farge på linja
		pointColor : "#6A1AD2", //farge på prikkene
		pointStrokeColor : "#6A1AD2", // fage på border til prikkene
		pointHighlightFill : "#6A1AD2", //farge på prikk on hover
		pointHighlightStroke : "#6A1AD2", // farge på border til prikk on hover
		data : [
		//Math.floor((Math.random() * 10000) + 1000)


		]
	}
	]

}


var lineChartDataWeek = {
	labels : ["Monday","Tuesday","Wedensday","Thursday","Friday","Saturday","Sunday"],
	datasets : [
	{
		label: "12 mnd",
		fillColor : "rgba(240,63,253,0.08)", //farge under grafen
		strokeColor : "#F03FFD", //farge på linja
		pointColor : "#F03FFD", //farge på prikkene
		pointStrokeColor : "#F03FFD", // fage på border til prikkene
		pointHighlightFill : "#F03FFD", //farge på prikk on hover
		pointHighlightStroke : "#F03FFD", // farge på border til prikk on hover
		data : [
		localStorage['monday'],
		localStorage['tuesday'],
		localStorage['wedensday'],
		localStorage['thursday'],
		localStorage['friday'],
		localStorage['saturday'],
		localStorage['sunday']
		]

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

	<?php
	include 'adminHeader_nav.php';
	?>




	<div class="container">
		<div>
			<div class="col-md-3"></div>

			<div class="col-md-6 text-center" id="">
				<!--<form action="" method="post">-->
					<div class="row">
						<input type="text" name="date" placeholder="yyyy-mm-dd eller yyyy"  id="datepicker">
					</div>


					<div class="row">
						<button type="submit" class="btn" name="day" id="searchbtn">
							Dag
						</button>
						<button type="submit" class="btn" name="week" id="searchbtn">
							Uke
						</button>
						<button type="submit" class="btn" name="month" id="searchbtn">
							Måned
						</button>
						<button type="submit" class="btn" name="year" id="searchbtn">
							År
						</button>
						<button type="submit" class="btn" name="allTime" id="searchbtn">
							Hele tiden
						</button>
					</div>
				<!--</form>-->




				<!-- Bare putt infoen som ble funnet ved søket i databasen inn her inntil videre.. så fikser jeg utseende senere. B :)-->
<?php
if(isset($_POST['day'])){
	day();
}
if(isset($_POST['week'])){
	week();
}
if(isset($_POST['month'])){
	month();
}
if(isset($_POST['year'])){
	//year();
}
if(isset($_POST['allTime'])){
	allTime();
}




function day(){

	$connection = mysqli_connect("localhost", "root", "", "database") or die("Kunne ikke koble til database");

	$date = $_POST['date'];


	$sql = "SELECT COUNT(*) FROM Organization WHERE DATE(date_added) = '" . $date . "'";
	$result = mysqli_query($connection, $sql);

	if($result){
		if(mysqli_num_rows($result) == 1){
			$row = mysqli_fetch_assoc($result);

			$res = $row['COUNT(*)'];

			echo 'Organisasjoner: ' . $res . '<br>';
		}
	}

	$sql = "SELECT COUNT(*) FROM Donation WHERE DATE(date) = '" . $date . "'";
	$result = mysqli_query($connection, $sql);

	if($result){
		if(mysqli_num_rows($result) == 1){
			$row = mysqli_fetch_assoc($result);

			$res = $row['COUNT(*)'];

			echo 'Donasjoner: ' . $res . '<br>';
		}
	}

	$sql = "SELECT SUM(sum) FROM Donation WHERE DATE(date) = '" . $date . "'";
	$result = mysqli_query($connection, $sql);

	if($result){
		if(mysqli_num_rows($result) == 1){
			$row = mysqli_fetch_assoc($result);

			$res = $row['SUM(sum)'];

			if ($res == "") {
				echo 'Kroner donert: 0,-<br>';
			}
			else{
				echo 'Kroner donert: ' . $res . ',-<br>';
			}
		}
	}

	$sql = "SELECT COUNT(*) FROM News WHERE DATE(date_added) = '" . $date . "'";
	$result = mysqli_query($connection, $sql);

	if($result){
		if(mysqli_num_rows($result) == 1){
			$row = mysqli_fetch_assoc($result);

			$res = $row['COUNT(*)'];

			echo 'Nyheter: ' . $res . '<br>';
		}
	}

	$sql = "SELECT COUNT(*) FROM Project WHERE DATE(date_added) = '" . $date . "'";
	$result = mysqli_query($connection, $sql);

	if($result){
		if(mysqli_num_rows($result) == 1){
			$row = mysqli_fetch_assoc($result);

			$res = $row['COUNT(*)'];

			echo 'Prosjekter: ' . $res . '<br>';
		}
	}

	$sql = "SELECT COUNT(*) FROM User WHERE DATE(date_added) = '" . $date . "'";
	$result = mysqli_query($connection, $sql);

	if($result){
		if(mysqli_num_rows($result) == 1){
			$row = mysqli_fetch_assoc($result);

			$res = $row['COUNT(*)'];

			echo 'Brukere: ' . $res . '<br>';
		}
	}

}

function week(){
	$connection = mysqli_connect("localhost", "root", "", "database") or die("Kunne ikke koble til database");

	$date = $_POST['date'];

	$sql = "SELECT COUNT(*) FROM Organization WHERE WEEKOFYEAR(date(date_added))=WEEKOFYEAR('" . $date . "')";
	$result = mysqli_query($connection, $sql);

	if($result){
		if(mysqli_num_rows($result) == 1){
			$row = mysqli_fetch_assoc($result);

			$res = $row['COUNT(*)'];

			echo 'Organisasjoner: ' . $res . '<br>';
		}
	}

	$sql = "SELECT COUNT(*) FROM Donation WHERE WEEKOFYEAR(date(date))=WEEKOFYEAR('" . $date . "')";
	$result = mysqli_query($connection, $sql);

	if($result){
		if(mysqli_num_rows($result) == 1){
			$row = mysqli_fetch_assoc($result);

			$res = $row['COUNT(*)'];

			echo 'Donasjoner: ' . $res . '<br>';
		}
	}

	$sql = "SELECT SUM(sum) FROM Donation WHERE WEEKOFYEAR(date(date))=WEEKOFYEAR('" . $date . "')";
	$result = mysqli_query($connection, $sql);

	if($result){
		if(mysqli_num_rows($result) == 1){
			$row = mysqli_fetch_assoc($result);

			$res = $row['SUM(sum)'];

			if ($res == "") {
				echo 'Kroner donert: 0,-<br>';
			}
			else{
				echo 'Kroner donert: ' . $res . ',-<br>';
			}
		}
	}

	$sql = "SELECT COUNT(*) FROM News WHERE WEEKOFYEAR(date(date_added))=WEEKOFYEAR('" . $date . "')";
	$result = mysqli_query($connection, $sql);

	if($result){
		if(mysqli_num_rows($result) == 1){
			$row = mysqli_fetch_assoc($result);

			$res = $row['COUNT(*)'];

			echo 'Nyheter: ' . $res . '<br>';
		}
	}

	$sql = "SELECT COUNT(*) FROM Project WHERE WEEKOFYEAR(date(date_added))=WEEKOFYEAR('" . $date . "')";
	$result = mysqli_query($connection, $sql);

	if($result){
		if(mysqli_num_rows($result) == 1){
			$row = mysqli_fetch_assoc($result);

			$res = $row['COUNT(*)'];

			echo 'Prosjekter: ' . $res . '<br>';
		}
	}

	$sql = "SELECT COUNT(*) FROM User WHERE WEEKOFYEAR(date(date_added))=WEEKOFYEAR('" . $date . "')";
	$result = mysqli_query($connection, $sql);

	if($result){
		if(mysqli_num_rows($result) == 1){
			$row = mysqli_fetch_assoc($result);

			$res = $row['COUNT(*)'];

			echo 'Brukere: ' . $res . '<br>';
		}
	}
}

function month(){
	$connection = mysqli_connect("localhost", "root", "", "database") or die("Kunne ikke koble til database");

	$date = $_POST['date'];

	$sql = "SELECT COUNT(*) FROM Organization WHERE MONTH(date(date_added)) = MONTH('" . $date . "') AND YEAR(date(date_added)) = YEAR('" . $date . "')";
	$result = mysqli_query($connection, $sql);

	if($result){
		if(mysqli_num_rows($result) == 1){
			$row = mysqli_fetch_assoc($result);

			$res = $row['COUNT(*)'];

			echo 'Organisasjoner: ' . $res . '<br>';
		}
	}

	$sql = "SELECT COUNT(*) FROM Donation WHERE MONTH(date(date)) = MONTH('" . $date . "') AND YEAR(date(date)) = YEAR('" . $date . "')";
	$result = mysqli_query($connection, $sql);

	if($result){
		if(mysqli_num_rows($result) == 1){
			$row = mysqli_fetch_assoc($result);

			$res = $row['COUNT(*)'];

			echo 'Donasjoner: ' . $res . '<br>';
		}
	}

	$sql = "SELECT SUM(sum) FROM Donation WHERE MONTH(date(date)) = MONTH('" . $date . "') AND YEAR(date(date)) = YEAR('" . $date . "')";
	$result = mysqli_query($connection, $sql);

	if($result){
		if(mysqli_num_rows($result) == 1){
			$row = mysqli_fetch_assoc($result);

			$res = $row['SUM(sum)'];

			if ($res == "") {
				echo 'Kroner donert: 0,-<br>';
			}
			else{
				echo 'Kroner donert: ' . $res . ',-<br>';
			}
		}
	}

	$sql = "SELECT COUNT(*) FROM News WHERE MONTH(date(date_added)) = MONTH('" . $date . "') AND YEAR(date(date_added)) = YEAR('" . $date . "')";
	$result = mysqli_query($connection, $sql);

	if($result){
		if(mysqli_num_rows($result) == 1){
			$row = mysqli_fetch_assoc($result);

			$res = $row['COUNT(*)'];

			echo 'Nyheter: ' . $res . '<br>';
		}
	}

	$sql = "SELECT COUNT(*) FROM Project WHERE MONTH(date(date_added)) = MONTH('" . $date . "') AND YEAR(date(date_added)) = YEAR('" . $date . "')";
	$result = mysqli_query($connection, $sql);

	if($result){
		if(mysqli_num_rows($result) == 1){
			$row = mysqli_fetch_assoc($result);

			$res = $row['COUNT(*)'];

			echo 'Prosjekter: ' . $res . '<br>';
		}
	}

	$sql = "SELECT COUNT(*) FROM User WHERE MONTH(date(date_added)) = MONTH('" . $date . "') AND YEAR(date(date_added)) = YEAR('" . $date . "')";
	$result = mysqli_query($connection, $sql);

	if($result){
		if(mysqli_num_rows($result) == 1){
			$row = mysqli_fetch_assoc($result);

			$res = $row['COUNT(*)'];

			echo 'Brukere: ' . $res . '<br>';
		}
	}
}

function year(){
	$connection = mysqli_connect("localhost", "root", "", "database") or die("Kunne ikke koble til database");

	$date = $_POST['date'] . "-01-01";

	$sql = "SELECT COUNT(*) FROM Organization WHERE YEAR(date(date_added))=YEAR('" . $date . "')";
	$result = mysqli_query($connection, $sql);

	if($result){
		if(mysqli_num_rows($result) == 1){
			$row = mysqli_fetch_assoc($result);

			$res = $row['COUNT(*)'];

			echo 'Organisasjoner: ' . $res . '<br>';
		}
	}

	$sql = "SELECT COUNT(*) FROM Donation WHERE YEAR(date(date))=YEAR('" . $date . "')";
	$result = mysqli_query($connection, $sql);

	if($result){
		if(mysqli_num_rows($result) == 1){
			$row = mysqli_fetch_assoc($result);

			$res = $row['COUNT(*)'];

			echo 'Donasjoner: ' . $res . '<br>';
		}
	}

	$sql = "SELECT SUM(sum) FROM Donation WHERE YEAR(date(date))=YEAR('" . $date . "')";
	$result = mysqli_query($connection, $sql);

	if($result){
		if(mysqli_num_rows($result) == 1){
			$row = mysqli_fetch_assoc($result);

			$res = $row['SUM(sum)'];

			if ($res == "") {
				echo 'Kroner donert: 0,-<br>';
			}
			else{
				echo 'Kroner donert: ' . $res . ',-<br>';
			}
		}
	}

	$sql = "SELECT COUNT(*) FROM News WHERE YEAR(date(date_added))=YEAR('" . $date . "')";
	$result = mysqli_query($connection, $sql);

	if($result){
		if(mysqli_num_rows($result) == 1){
			$row = mysqli_fetch_assoc($result);

			$res = $row['COUNT(*)'];

			echo 'Nyheter: ' . $res . '<br>';
		}
	}

	$sql = "SELECT COUNT(*) FROM Project WHERE YEAR(date(date_added))=YEAR('" . $date . "')";
	$result = mysqli_query($connection, $sql);

	if($result){
		if(mysqli_num_rows($result) == 1){
			$row = mysqli_fetch_assoc($result);

			$res = $row['COUNT(*)'];

			echo 'Prosjekter: ' . $res . '<br>';
		}
	}

	$sql = "SELECT COUNT(*) FROM User WHERE YEAR(date(date_added))=YEAR('" . $date . "')";
	$result = mysqli_query($connection, $sql);

	if($result){
		if(mysqli_num_rows($result) == 1){
			$row = mysqli_fetch_assoc($result);

			$res = $row['COUNT(*)'];

			echo 'Brukere: ' . $res . '<br>';
		}
	}
}

function allTime(){
	$connection = mysqli_connect("localhost", "root", "", "database") or die("Kunne ikke koble til database");
	$sql = "SELECT COUNT(*) FROM Organization";
	$result = mysqli_query($connection, $sql);

	if($result){
		if(mysqli_num_rows($result) == 1){
			$row = mysqli_fetch_assoc($result);

			$res = $row['COUNT(*)'];

			echo 'Organisasjoner: ' . $res . '<br>';
		}
	}

	$sql = "SELECT COUNT(*) FROM Donation";
	$result = mysqli_query($connection, $sql);

	if($result){
		if(mysqli_num_rows($result) == 1){
			$row = mysqli_fetch_assoc($result);

			$res = $row['COUNT(*)'];

			echo 'Donasjoner: ' . $res . '<br>';
		}
	}

	$sql = "SELECT SUM(sum) FROM Donation";
	$result = mysqli_query($connection, $sql);

	if($result){
		if(mysqli_num_rows($result) == 1){
			$row = mysqli_fetch_assoc($result);

			$res = $row['SUM(sum)'];

			$donert = $res;

			if ($res == "") {
				echo 'Kroner donert: 0,-<br>';
			}
			else{
				echo 'Kroner donert: ' . $res . ',-<br>';
			}
		}
	}

	$sql = "SELECT COUNT(*) FROM News";
	$result = mysqli_query($connection, $sql);

	if($result){
		if(mysqli_num_rows($result) == 1){
			$row = mysqli_fetch_assoc($result);

			$res = $row['COUNT(*)'];

			echo 'Nyheter: ' . $res . '<br>';
		}
	}

	$sql = "SELECT COUNT(*) FROM Project";
	$result = mysqli_query($connection, $sql);

	if($result){
		if(mysqli_num_rows($result) == 1){
			$row = mysqli_fetch_assoc($result);

			$res = $row['COUNT(*)'];

			echo 'Prosjekter: ' . $res . '<br>';
		}
	}

	$sql = "SELECT COUNT(*) FROM User";
	$result = mysqli_query($connection, $sql);

	if($result){
		if(mysqli_num_rows($result) == 1){
			$row = mysqli_fetch_assoc($result);

			$res = $row['COUNT(*)'];

			echo 'Brukere: ' . $res . '<br>';
		}
	}

	$totalt = $donert/$res;

	echo 'Hver bruker har donert "'.$totalt.'",- i snitt.';

}
?>


</div>

<div class="col-md-3"></div>

</div>
<label id="yearlabel" for="canvas">[Statistikk for år]</label>
<canvas id="canvas" width="1200" height="500"></canvas>





<!-- jQuery -->

<!--Check login information-->
<script src="checkLogin.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="../js/bootstrap.min.js"></script>







</body>


</html>