<?php
session_start();

include '../phpBackend/checkSession.php';
include '../phpBackend/connect.php';

$organizationNr = $_SESSION['organizationNr'];

?>

<!DOCTYPE html>
<html>
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

    <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
	<script src="http://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.min.js"></script>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

</head>

<body>

<?php
    include 'header_nav.php';
?>

<div class="container">
	<div>
		<div class="col-md-3"></div>

		<div class="col-md-6 text-center" id="">
			<form action="" method="post">
			 <div class="input-append date" id="datepicker" data-date-format="yyyy-mm-dd">
    		<input class="span2" size="16" name="date" type="text" readonly="readonly" />
    		<span class="add-on"><i class="icon-calendar"></i></span>
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
			</form>

			


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

				$organizationNr = $_SESSION['organizationNr'];

				$connection = mysqli_connect("localhost", "root", "", "database") or die("Kunne ikke koble til database");

				$date = $_POST['date'];
				
				//FEIL SPØRRING
				$sql = "SELECT COUNT(*) FROM Subsription WHERE DATE(date_added) = '" . $date . "' AND projectID = '".$organizationNr."'";
				$result = mysqli_query($connection, $sql);

				if($result){
					if(mysqli_num_rows($result) == 1){
						$row = mysqli_fetch_assoc($result);

						$res = $row['COUNT(*)'];

						echo 'Følgere: ' . $res . '<br>';
					}
				}

				//FEIL SPØRRING
				$sql = "SELECT COUNT(*) FROM Donation WHERE DATE(date) = '" . $date . "' AND projectID = '".$organizationNr."'";
				$result = mysqli_query($connection, $sql);

				if($result){
					if(mysqli_num_rows($result) == 1){
						$row = mysqli_fetch_assoc($result);

						$res = $row['COUNT(*)'];

						echo 'Donasjoner: ' . $res . '<br>';
					}
				}

				//FEIL SPØRRING
				$sql = "SELECT SUM(sum) FROM Donation WHERE DATE(date) = '" . $date . "' AND projectID = '".$organizationNr."'";
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

				//FEIL SPØRRING
				$sql = "SELECT COUNT(*) FROM News WHERE DATE(date_added) = '" . $date . "' AND projectID = '".$organizationNr."'";
				$result = mysqli_query($connection, $sql);

				if($result){
					if(mysqli_num_rows($result) == 1){
						$row = mysqli_fetch_assoc($result);

						$res = $row['COUNT(*)'];

						echo 'Nyheter: ' . $res . '<br>';
					}
				}


				$sql = "SELECT COUNT(*) FROM Project WHERE DATE(date_added) = '" . $date . "' AND organizationNr = '".$organizationNr."'";
				$result = mysqli_query($connection, $sql);

				if($result){
					if(mysqli_num_rows($result) == 1){
						$row = mysqli_fetch_assoc($result);

						$res = $row['COUNT(*)'];

						echo 'Prosjekter: ' . $res . '<br>';
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

				$date = $_POST['date'];

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

						$res = number_format($res,0,"",",");

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
				$totalt = number_format($totalt,2);

				echo 'Hver bruker har donert '.$totalt.',- i snitt.';

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
	<script type="text/javascript">
            // When the document is ready
            $(document).ready(function () {
                
                $('#datepicker').datepicker({
                    format: "yyyy-mm-dd"
                });  
            
            });
        </script>

</body>


</html>