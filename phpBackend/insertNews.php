<?php


session_start();
include "../phpBackend/connect.php";
include "../phpBackend/checkSession.php";
if (isset($_SESSION['organizationNr'])) {
	
	if(isset($_POST['news'])){
		$json = $_POST['news'];
		$news = json_decode($json, true);

		$organizationNr = $_SESSION['organizationNr'];
		$title = $news['title'];
		$txt = $news['txt'];
		$projectID = $news['projectID'];



		if($projectID !='NULL'){
			$sql = "INSERT INTO News (title, txt, projectID) VALUES('$title', '$txt', '$projectID')";
			$mysql_status = insertInto($connection, $sql);
			
			$_SESSION['IDofLastNewsInsert'] = mysqli_insert_id($connection);
			
			$_SESSION['projectIDtoRegisterNews'] = $projectID;
			echo $mysql_status;
		}else{
			echo "<script>alert('Du valgte ikke prosjekt (Sjekkes med ajax uten refresh ..... -vegard)');</script>";
		}
	}
	

}else{
	echo "sign_in";
}
?>