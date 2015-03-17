<?php
	//include '../phpBackend/connect.php';
	$connection = mysqli_connect("localhost", "root", "", "database") or die("Kunne ikke koble til database");
?>

<!DOCTYPE html>
<html>
<head>

	<title>Admin</title>
	

	<link href="../../css/bootstrap.min.css" rel="stylesheet">
	<link href="../../css/Admin.css" rel="stylesheet">
</head>

<body>

<?php
	include 'adminHeader_nav.php';
?>




<div class="container">
	<div>
		<div class="col-md-3"></div>

		<div class="col-md-6 text-center" id="">
			<div class="row">
			<form action="" method="post">
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
			</form>
			</div>

			


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
				year();
			}
			if(isset($_POST['allTime'])){
				allTime();
			}


			function day(){
				$connection = mysqli_connect("localhost", "root", "", "database") or die("Kunne ikke koble til database");

				$sql = "SELECT COUNT(*) FROM Organization WHERE DATE(date_added) = CURDATE()";
				$result = mysqli_query($connection, $sql);

				if($result){
					if(mysqli_num_rows($result) == 1){
						$row = mysqli_fetch_assoc($result);

						$res = $row['COUNT(*)'];

						echo 'Organisasjoner: ' . $res . '<br>';
					}
				}

				$sql = "SELECT COUNT(*) FROM Donation WHERE DATE(date) = CURDATE()";
				$result = mysqli_query($connection, $sql);

				if($result){
					if(mysqli_num_rows($result) == 1){
						$row = mysqli_fetch_assoc($result);

						$res = $row['COUNT(*)'];

						echo 'Donasjoner: ' . $res . '<br>';
					}
				}

				$sql = "SELECT SUM(sum) FROM Donation WHERE DATE(date) = CURDATE()";
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

				$sql = "SELECT COUNT(*) FROM News WHERE DATE(date_added) = CURDATE()";
				$result = mysqli_query($connection, $sql);

				if($result){
					if(mysqli_num_rows($result) == 1){
						$row = mysqli_fetch_assoc($result);

						$res = $row['COUNT(*)'];

						echo 'Nyheter: ' . $res . '<br>';
					}
				}

				$sql = "SELECT COUNT(*) FROM Project WHERE DATE(date_added) = CURDATE()";
				$result = mysqli_query($connection, $sql);

				if($result){
					if(mysqli_num_rows($result) == 1){
						$row = mysqli_fetch_assoc($result);

						$res = $row['COUNT(*)'];

						echo 'Prosjekter: ' . $res . '<br>';
					}
				}

				$sql = "SELECT COUNT(*) FROM User WHERE DATE(date_added) = CURDATE()";
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

				//$sql = "SELECT COUNT(*) FROM Organization WHERE DATE(date_added) = CURDATE()";
				$sql = "SELECT COUNT(*) FROM Organization WHERE WEEKOFYEAR(date(date_added))=WEEKOFYEAR(NOW())";
				$result = mysqli_query($connection, $sql);

				if($result){
					if(mysqli_num_rows($result) == 1){
						$row = mysqli_fetch_assoc($result);

						$res = $row['COUNT(*)'];

						echo 'Organisasjoner: ' . $res . '<br>';
					}
				}

				$sql = "SELECT COUNT(*) FROM Donation WHERE WEEKOFYEAR(date(date))=WEEKOFYEAR(NOW())";
				$result = mysqli_query($connection, $sql);

				if($result){
					if(mysqli_num_rows($result) == 1){
						$row = mysqli_fetch_assoc($result);

						$res = $row['COUNT(*)'];

						echo 'Donasjoner: ' . $res . '<br>';
					}
				}

				$sql = "SELECT SUM(sum) FROM Donation WHERE WEEKOFYEAR(date(date))=WEEKOFYEAR(NOW())";
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

				$sql = "SELECT COUNT(*) FROM News WHERE WEEKOFYEAR(date(date_added))=WEEKOFYEAR(NOW())";
				$result = mysqli_query($connection, $sql);

				if($result){
					if(mysqli_num_rows($result) == 1){
						$row = mysqli_fetch_assoc($result);

						$res = $row['COUNT(*)'];

						echo 'Nyheter: ' . $res . '<br>';
					}
				}

				$sql = "SELECT COUNT(*) FROM Project WHERE WEEKOFYEAR(date(date_added))=WEEKOFYEAR(NOW())";
				$result = mysqli_query($connection, $sql);

				if($result){
					if(mysqli_num_rows($result) == 1){
						$row = mysqli_fetch_assoc($result);

						$res = $row['COUNT(*)'];

						echo 'Prosjekter: ' . $res . '<br>';
					}
				}

				$sql = "SELECT COUNT(*) FROM User WHERE WEEKOFYEAR(date(date_added))=WEEKOFYEAR(NOW())";
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

				$sql = "SELECT COUNT(*) FROM Organization WHERE MONTH(date(date_added)) = MONTH(NOW()) AND YEAR(date(date_added)) = YEAR(NOW())";
				$result = mysqli_query($connection, $sql);

				if($result){
					if(mysqli_num_rows($result) == 1){
						$row = mysqli_fetch_assoc($result);

						$res = $row['COUNT(*)'];

						echo 'Organisasjoner: ' . $res . '<br>';
					}
				}

				$sql = "SELECT COUNT(*) FROM Donation WHERE MONTH(date(date)) = MONTH(NOW()) AND YEAR(date(date)) = YEAR(NOW())";
				$result = mysqli_query($connection, $sql);

				if($result){
					if(mysqli_num_rows($result) == 1){
						$row = mysqli_fetch_assoc($result);

						$res = $row['COUNT(*)'];

						echo 'Donasjoner: ' . $res . '<br>';
					}
				}

				$sql = "SELECT SUM(sum) FROM Donation WHERE MONTH(date(date)) = MONTH(NOW()) AND YEAR(date(date)) = YEAR(NOW())";
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

				$sql = "SELECT COUNT(*) FROM News WHERE MONTH(date(date_added)) = MONTH(NOW()) AND YEAR(date(date_added)) = YEAR(NOW())";
				$result = mysqli_query($connection, $sql);

				if($result){
					if(mysqli_num_rows($result) == 1){
						$row = mysqli_fetch_assoc($result);

						$res = $row['COUNT(*)'];

						echo 'Nyheter: ' . $res . '<br>';
					}
				}

				$sql = "SELECT COUNT(*) FROM Project WHERE MONTH(date(date_added)) = MONTH(NOW()) AND YEAR(date(date_added)) = YEAR(NOW())";
				$result = mysqli_query($connection, $sql);

				if($result){
					if(mysqli_num_rows($result) == 1){
						$row = mysqli_fetch_assoc($result);

						$res = $row['COUNT(*)'];

						echo 'Prosjekter: ' . $res . '<br>';
					}
				}

				$sql = "SELECT COUNT(*) FROM User WHERE MONTH(date(date_added)) = MONTH(NOW()) AND YEAR(date(date_added)) = YEAR(NOW())";
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

				$sql = "SELECT COUNT(*) FROM Organization WHERE YEAR(date(date_added))=YEAR(NOW())";
				$result = mysqli_query($connection, $sql);

				if($result){
					if(mysqli_num_rows($result) == 1){
						$row = mysqli_fetch_assoc($result);

						$res = $row['COUNT(*)'];

						echo 'Organisasjoner: ' . $res . '<br>';
					}
				}

				$sql = "SELECT COUNT(*) FROM Donation WHERE YEAR(date(date))=YEAR(NOW())";
				$result = mysqli_query($connection, $sql);

				if($result){
					if(mysqli_num_rows($result) == 1){
						$row = mysqli_fetch_assoc($result);

						$res = $row['COUNT(*)'];

						echo 'Donasjoner: ' . $res . '<br>';
					}
				}

				$sql = "SELECT SUM(sum) FROM Donation WHERE YEAR(date(date))=YEAR(NOW())";
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

				$sql = "SELECT COUNT(*) FROM News WHERE YEAR(date(date_added))=YEAR(NOW())";
				$result = mysqli_query($connection, $sql);

				if($result){
					if(mysqli_num_rows($result) == 1){
						$row = mysqli_fetch_assoc($result);

						$res = $row['COUNT(*)'];

						echo 'Nyheter: ' . $res . '<br>';
					}
				}

				$sql = "SELECT COUNT(*) FROM Project WHERE YEAR(date(date_added))=YEAR(NOW())";
				$result = mysqli_query($connection, $sql);

				if($result){
					if(mysqli_num_rows($result) == 1){
						$row = mysqli_fetch_assoc($result);

						$res = $row['COUNT(*)'];

						echo 'Prosjekter: ' . $res . '<br>';
					}
				}

				$sql = "SELECT COUNT(*) FROM User WHERE YEAR(date(date_added))=YEAR(NOW())";
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
			}
			?>


		</div>

		<div class="col-md-3"></div>

	</div>


	<!-- jQuery -->
	<script src="js/jquery.js"></script>
	<!--Check login information-->
	<script src="checkLogin.js"></script>
	<!-- Change user information 
	<script src="../js/change_user.js"></script>-->
	<!-- Bootstrap Core JavaScript -->
	<script src="../js/bootstrap.min.js"></script>

</body>


</html>