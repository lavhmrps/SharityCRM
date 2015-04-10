
<?php
	//include '../phpBackend/connect.php';
	//include '../phpBackend/hash.php';
	$connection = mysqli_connect("localhost", "root", "", "database") or die("Kunne ikke koble til database");

	function insertInto($connection, $sql) {
		if (mysqli_query($connection, $sql) === TRUE) {
			return "OK";
		}else{
			return mysqli_error($connection);
		//sjekk om det er duplicate entry !
		}
	}

	function better_crypt($input, $rounds = 7)
  	{
    	$salt = "";
    	$salt_chars = array_merge(range('A','Z'), range('a','z'), range(0,9));
    	for($i=0; $i < 22; $i++) {
      	$salt .= $salt_chars[array_rand($salt_chars)];
    	}
    	return crypt($input, sprintf('$2a$%02d$', $rounds) . $salt);
  	}

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
				<div class="col-md-10"> 
					<input type="text" name="username" class="form-control" id="username" placeholder="Søk.."/>
				</div>
				<div class="col-md-2">
					<button type="submit" class="btn" name="submit" id="searchbtn">
						Søk
					</button>
				</div>
			</form>
			</div>

			


			<!-- Bare putt infoen som ble funnet ved søket i databasen inn her inntil videre.. så fikser jeg utseende senere. B :)-->
				<?php		
					if(isset($_POST['submit'])){
						$email = $_POST['username'];


						$sql = "SELECT * FROM User WHERE email = '$email'";
						$result = mysqli_query($connection, $sql);

						if($result){

							if(mysqli_num_rows($result) == 1){

								$row = mysqli_fetch_assoc($result);
								
								$name = $row['name'];
								$phone = $row['phone'];
								$address = $row['address'];
								$zip = $row['zip'];
								$picURL = $row['picURL'];
								$password = $row['password'];
								$_SESSION['name'] = $row['name'];
								$_SESSION['phone'] = $row['phone'];
								$_SESSION['address'] = $row['address'];
								$_SESSION['zip'] = $row['zip'];
								$_SESSION['picURL'] = $row['picURL'];
								$_SESSION['password'] = $row['password'];

								echo '<form action="" method="post">';
								echo "<label>E-post</label>";
								echo '<input type="email" class="form-control" name="email" id="changeUser" placeholder="" value="' . $email . '"/>';
								echo '<input type="hidden" name="emailOld" value="' . $email .'">';
								
								echo "<label>Navn</label>";
								echo '<input type="text" class="form-control" name="name" id="changeUser" placeholder="" value="' . $name . '"/>';

								echo "<label>Telefonnummer</label>";
								echo '<input type="tel" class="form-control" name="phone" id="changeUser" placeholder="" value="' . $phone . '"/>';

								echo "<label>Adresse</label>";
								echo '<input type="text" class="form-control" name="address" id="changeUser" placeholder="" value="' . $address . '"/>';

								echo "<label>Postkode</label>";
								echo '<input type="tel" class="form-control" name="zip" id="changeUser" placeholder="" value="' . $zip . '"/>';

								echo "<label>Bilde URL</label>";
								echo '<input type="text" class="form-control" name="picURL" id="changeUser" placeholder="" value="' . $picURL . '"/>';

								echo "<label>Passord</label>";
								echo '<input type="password" class="form-control" name="password" id="changeUser" placeholder="" value="' . $password . '"/>';

								echo "<label>Gjenta passord</label>";
								echo '<input type="password" class="form-control" name="repeat_password" id="changeUser" placeholder="" value="' . $password . '"/>';

								echo '
				                	<button  class="btn btn-success" name="update_info">
				                		Oppdater bruker
				                		</button>
				                	';
				                echo '</form>';
							}
						}
					}
					if(isset($_POST['update_info'])){
						$statusEmail = TRUE;
						$statusName = TRUE;
						$statusPhone = TRUE;
						$statusAddress = TRUE;
						$statusZip = TRUE;
						$statusPicURL = TRUE;
						$statusPassword = TRUE;

						$email = $_POST['emailOld'];
						$newemail = $_POST['email'];
						$newname = $_POST['name'];
						$newphone = $_POST['phone'];
						$newaddress = $_POST['address'];
						$newzip = $_POST['zip'];
						$newpicURL = $_POST['picURL'];		
						$newpassword = $_POST['password'];
						$newrepeat_password = $_POST['repeat_password'];


						if ($email != $newemail) {
							if(isset($_POST['email'])){
								$sql = "UPDATE User SET email = '$newemail' WHERE email = '$email'";
								$mysql_status = insertInto($connection, $sql);
								if($mysql_status != "OK"){
									$statusEmail = FALSE;
								}
								else{
									$email = $newemail;
									echo "E-post er oppdatert til'" . $email . "'<br>";
								}
							}
						}
						if(isset($_POST['name']) && $newname != $_SESSION['name']){
							$sql = "UPDATE User SET name = '$newname' WHERE email = '$email'";
							$mysql_status = insertInto($connection, $sql);
							if($mysql_status != "OK"){
								$statusName = FALSE;
							}
							else{
								echo "Navn er oppdatert til '" . $newname . "'<br>";
							}
						}
						if(isset($_POST['phone']) && $newphone != $_SESSION['phone']){
							$sql = "UPDATE User SET phone = '$newphone' WHERE email = '$email'";
							$mysql_status = insertInto($connection, $sql);
							if($mysql_status != "OK"){
								$statusPhone = FALSE;
							}
							else{
								echo "Telefonnummer er oppdatert til '" . $newphone . "'<br>";
							}
						}
						if(isset($_POST['address']) && $newaddress != $_SESSION['address']){
							$sql = "UPDATE User SET address = '$newaddress' WHERE email = '$email'";
							$mysql_status = insertInto($connection, $sql);
							if($mysql_status != "OK"){
								$statusAddress = FALSE;
							}
							else{
								echo "Addressen er endret til '" . $newaddress . "'<br>";
							}
						}
						if(isset($_POST['zip']) && $newzip != $_SESSION['zip']){

							if (strlen($newzip)==4) {
								$sql = "UPDATE User SET zip = '$newzip' WHERE email = '$email'";
								$mysql_status = insertInto($connection, $sql);
								if($mysql_status != "OK"){
									$statusZip = FALSE;
								}
								else{
									echo "Postkoden er endret til '" . $newzip . "'<br>";
								}
							}
							else{
								echo "Postkoden må være 4 siffer!<br>";
							}
						}
						if(isset($_POST['picURL']) && $newpicURL != $_SESSION['picURL']){
							$sql = "UPDATE User SET picURL = '$newpicURL' WHERE email = '$email'";
							$mysql_status = insertInto($connection, $sql);
							if($mysql_status != "OK"){
								$statusPicURL = FALSE;
							}
							else{
								echo "Bilde er oppdatert!<br>";
							}
						}
						if(isset($_POST['password']) && crypt($newpassword, $_SESSION['password']) != $_SESSION['password'] && $newpassword != $_SESSION['password']){
							if($newpassword == $newrepeat_password){
								//Hashing av passord
								$hash = better_crypt($newpassword);

								$sql = "UPDATE User SET password = '$hash' WHERE email = '$email'";
								$mysql_status = insertInto($connection, $sql);
								if($mysql_status != "OK"){
									$statusPassword = FALSE;
								}
								else{
									echo "Passord er endret!<br>";
								}
							}
							else{
								echo "Passordene er ikke like!<br>";
							}
						}


						unset($_SESSION['password']);

						$statusEmail = TRUE;
						$statusName = TRUE;
						$statusPhone = TRUE;
						$statusAddress = TRUE;
						$statusZip = TRUE;
						$statusPicURL = TRUE;
						$statusPassword = TRUE;

						if($statusEmail && $statusName && $statusPhone && $statusAddress && $statusZip && $statusPicURL && $statusPassword){
							echo "Suksessfull oppdatering.";
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