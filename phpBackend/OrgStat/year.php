<?php
session_start();
include '../../phpBackend/connect.php';
include '../../phpBackend/checkSession.php';

$organizationNr = $_SESSION['organizationNr'];

$date = $_REQUEST["date"];

$out = "";
				
$sql = "SELECT COUNT(*) FROM Subscription INNER JOIN Project ON Subscription.projectID = Project.projectID WHERE YEAR(date(Subscription.date_added)) = YEAR('" . $date . "') AND  Project.organizationNr = '".$organizationNr."'";
$result = mysqli_query($connection, $sql);

if($result){
	if(mysqli_num_rows($result) == 1){
		$row = mysqli_fetch_assoc($result);

		$res = $row['COUNT(*)'];

		echo '<b>Nye</b> følgere: ' . $res . '<br>';
		
	}
}


$sql2 = "SELECT COUNT(*) FROM Donation INNER JOIN Project ON Donation.projectID = Project.projectID WHERE YEAR(date(Donation.date)) = YEAR('" . $date . "') AND  Project.organizationNr = '".$organizationNr."'";
$result2 = mysqli_query($connection, $sql2);

if($result2){
	if(mysqli_num_rows($result2) == 1){
		$row = mysqli_fetch_assoc($result2);

		$res = $row['COUNT(*)'];

		$donate = $res;

		echo 'Donasjoner: ' . $res . '<br>';
	}	
}

$sql3 = "SELECT SUM(sum) FROM Donation INNER JOIN Project ON Donation.projectID = Project.projectID WHERE YEAR(date(Donation.date)) = YEAR('" . $date . "') AND  Project.organizationNr = '".$organizationNr."'";
$result3 = mysqli_query($connection, $sql3);

if($result3){
	if(mysqli_num_rows($result) == 1){
		$row = mysqli_fetch_assoc($result3);

		$res = $row['SUM(sum)'];

		$sum = $res;

		$res = number_format($res,0,"."," ");

		if ($res == "") {
			echo 'Kroner donert: 0,-<br>';
		}
		else{
			echo 'Kroner donert: ' . $res . ',-<br>';
		}
	}
}

if($donate != 0){
	$totalt = $sum/$donate;
	$totalt = number_format($totalt,2,"."," ");
}
else{
	$totalt = 0;
}

echo 'Hver donasjon har vært på '.$totalt.',- i gjennomsnitt.<br>';

$sql4 = "SELECT COUNT(*) FROM News INNER JOIN Project ON News.projectID = Project.projectID WHERE YEAR(date(News.date_added)) = YEAR('" . $date . "') AND  Project.organizationNr = '".$organizationNr."'";
$result4 = mysqli_query($connection, $sql4);

if($result4){
	if(mysqli_num_rows($result4) == 1){
		$row = mysqli_fetch_assoc($result4);

		$res = $row['COUNT(*)'];

		echo 'Nye nyheter: ' . $res . '<br>';
	}
}


$sql5 = "SELECT COUNT(*) FROM Project WHERE YEAR(date(Project.date_added)) = YEAR('" . $date . "') AND  organizationNr = '".$organizationNr."'";
$result5 = mysqli_query($connection, $sql5);

if($result5){
	if(mysqli_num_rows($result5) == 1){
		$row = mysqli_fetch_assoc($result5);

		$res = $row['COUNT(*)'];

		echo 'Nye prosjekter: ' . $res . '<br>';
	}
}
?>