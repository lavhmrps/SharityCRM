
<?php


session_start();
include "connect.php";
if (isset($_SESSION['email'])) {
	
	if(isset($_POST['donation'])){
		$json = $_POST['donation'];
		$donation = json_decode($json, true);

		
		$projectID = $donation['projectID'];
		$email = $donation['email'];
		$type = $donation['type'];
		$sum = $donation['sum'];


		
		$sql = "INSERT INTO Donation (projectID, email, type, sum) VALUES('$projectID', '$email', '$type', '$sum')";

		//sjekk om brukeren med email = $email har card registret, dersom dette ikke er tilfelle, returner 002 som betyr manglende kort, ugyldig

		$mysql_status = insertInto($connection, $sql);
		echo $mysql_status;





	}
}else{
	echo "sign_in";
}
?>