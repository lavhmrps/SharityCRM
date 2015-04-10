<?php

if(!isset($_SESSION['organizationNr'])){

	include '../../phpBackend/CheckAdminSession.php';
}


?>

<!DOCTYPE html>
<html>
<head>
	<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
	<meta charset="utf-8"/>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>Admin</title>

	<!-- Bootstrap Core CSS -->
	<link href="../../css/bootstrap.min.css" rel="stylesheet">
	<link href="../../css/Admin.css" rel="stylesheet">
</head>
<body>
	<?php
	include "adminHeader_nav.php";
	?>
	<div class="col-md-12 text-center">
		<h1>Endre organisasjon</h1>
	</div>

	<div class="col-md-5 text-center"></div>
	<div class="col-md-4 text-center" style="margin-top:50px;">
		<form action="" method="post">
			<?php

			include "../../phpBackend/connect.php";

			$orgNr = $_SESSION['organizationNr'];
			$sql = "SELECT * FROM organization WHERE organizationNr = '$orgNr'";
			$result = mysqli_query($connection, $sql);
			$organization = mysqli_fetch_assoc($result);


			echo '<table>';
			echo '<tr>';
			echo '<td>OrgNr</td><td><input type="text" name="organizationNr" value="'. $organization['organizationNr'] .'"/></td>';
			echo '</tr>';
			echo '<tr>';
			echo '<td>Navn</td><td><input type="text" name="name" value="'. $organization['name'] .'" /></td>';
			echo '</tr>';
			echo '<tr>';
			echo '<td>Kategori</td><td><input type="text" name="category" value="'. $organization['category'] .'" /></td>';
			echo '</tr>';
			echo '<tr>';
			echo '<td>Telefon</td><td><input type="text" name="phone" value="'. $organization['phone'] .'" /></td>';
			echo '</tr>';
			echo '<tr>';
			echo '<td>Adresse</td><td><input type="text" name="address" value="'. $organization['address'] .'" /></td>';
			echo '</tr>';
			echo '<tr>';
			echo '<td>PostNr</td><td><input type="text" name="zipcode" value="'. $organization['zipcode'] .'" /></td>';
			echo '</tr>';
			echo '<tr>';
			echo '<td>Nettside</td><td><input type="text" name="website" value="'. $organization['website'] .'" /></td>';
			echo '</tr>';
			echo '<tr>';
			echo '<td>Kontonummer</td><td><input type="text" name="accountnumber" value="'. $organization['accountnumber'] .'" /></td>';
			echo '</tr>';
			echo '<tr>';
			echo '<td>Email</td><td><input type="text" name="email" value="'. $organization['email'] .'" /></td>';
			echo '</tr>';
			echo '<tr>';
			echo '<td>Om org</td><td><input type="text" name="about" value="'. $organization['about'] .'" /></td>';
			echo '</tr>';
			
			echo '</table>';

			
			?>
			<input type="submit" name="changeOrg" value="Endre" />
		</form>
	</div>
	<div class="col-md-3 text-center"></div>


	<?php
	if(isset($_POST["changeOrg"])){

		

		$organizationNr = $_POST["organizationNr"];
		$name = $_POST["name"];
		$category = $_POST["category"];
		$phone = $_POST["phone"];
		$address = $_POST["address"];
		$zipcode = $_POST["zipcode"];
		$website = $_POST["website"];
		$accountnumber = $_POST["accountnumber"];
		$email = $_POST["email"];
		$about = $_POST["about"];




		$sql = "UPDATE organization SET organizationNr = '$organizationNr', name = '$name', category = '$category', phone = '$phone', address = '$address', zipcode = '$zipcode', website = '$website', accountnumber = '$accountnumber', email = '$email', about = '$about' WHERE organizationNr = '$organizationNr'";


		$result = mysqli_query($connection, $sql);

		if(!$result){
			echo "feil i oppdatering!";
		}
		elseif(mysqli_affected_rows($connection)==0){
			echo "Feil i registrering2!";
		}else{
			header('Location: adminHome.php');
		}

		mysqli_close($connection);


	}

	?>

	<!-- jQuery -->
	<script src="../../js/jquery.js"></script>
	<script src="../../js/stickyheader.js"></script>

	<!-- Bootstrap Core JavaScript -->
	<script src="../../js/bootstrap.min.js"></script>
</body>
</html>

