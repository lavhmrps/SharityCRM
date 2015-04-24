<?php 
session_start();

include '../phpBackend/checkSession.php';
include '../phpBackend/connect.php';


$num = $_REQUEST["num"];
$date = $_REQUEST["date"];
$organizationNr = $_SESSION['organizationNr'];

if ($num == 1) {
	$sql = "SELECT COUNT(*) FROM subscription INNER JOIN project ON subscription.projectID = project.projectID WHERE DATE(subscription.date_added) = '" . $date . "' AND  project.organizationNr = '".$organizationNr."'";
    $result = mysqli_query($connection, $sql);

    if($result){
        if(mysqli_num_rows($result) == 1){
            $row = mysqli_fetch_assoc($result);

            $res = $row['COUNT(*)'];
            echo $res;
        }
    }
}
else if ($num == 2) {
	$sql = "SELECT COUNT(*) FROM subscription INNER JOIN project ON subscription.projectID = project.projectID  WHERE MONTH(date(subscription.date_added)) = MONTH('" . $date . "') AND YEAR(date(subscription.date_added)) = YEAR('" . $date . "') AND  project.organizationNr = '".$organizationNr."'";
	$result = mysqli_query($connection, $sql);

    if($result){
        if(mysqli_num_rows($result) == 1){
            $row = mysqli_fetch_assoc($result);

            $res = $row['COUNT(*)'];
            echo $res;
        }
    }
}
else if ($num == 3) {
	$sql = "SELECT COUNT(*) FROM subscription INNER JOIN project ON subscription.projectID = project.projectID WHERE YEAR(date(subscription.date_added)) = '" . $date . "' AND  project.organizationNr = '".$organizationNr."'";
	$result = mysqli_query($connection, $sql);

    if($result){
        if(mysqli_num_rows($result) == 1){
            $row = mysqli_fetch_assoc($result);

            $res = $row['COUNT(*)'];
            echo $res;
        }
    }
}
else if ($num == 4) {
	$sql = "SELECT COUNT(*) FROM donation INNER JOIN project ON donation.projectID = project.projectID WHERE DATE(donation.date) = '" . $date . "' AND  project.organizationNr = '".$organizationNr."'";
	$result = mysqli_query($connection, $sql);

	if($result){
		if(mysqli_num_rows($result) == 1){
			$row = mysqli_fetch_assoc($result);

			$res = $row['COUNT(*)'];

			$donate = $res;

			echo $res;
		}	
	}	
}
else if ($num == 5) {
	$sql = "SELECT COUNT(*) FROM donation INNER JOIN project ON donation.projectID = project.projectID  WHERE MONTH(date(donation.date)) = MONTH('" . $date . "') AND YEAR(date(donation.date)) = YEAR('" . $date . "') AND  project.organizationNr = '".$organizationNr."'";
	$result = mysqli_query($connection, $sql);

	if($result){
		if(mysqli_num_rows($result) == 1){
			$row = mysqli_fetch_assoc($result);

			$res = $row['COUNT(*)'];

			$donate = $res;

			echo $res;
		}	
	}	
}
else if ($num == 6) {
	$sql = "SELECT COUNT(*) FROM donation INNER JOIN project ON donation.projectID = project.projectID WHERE YEAR(date(donation.date)) = '" . $date . "' AND  project.organizationNr = '".$organizationNr."'";
	$result = mysqli_query($connection, $sql);

	if($result){
		if(mysqli_num_rows($result) == 1){
			$row = mysqli_fetch_assoc($result);

			$res = $row['COUNT(*)'];

			$donate = $res;

			echo $res;
		}	
	}	
}
else if ($num == 7) {
	$sql = "SELECT SUM(sum) FROM donation INNER JOIN project ON donation.projectID = project.projectID WHERE DATE(donation.date) = '" . $date . "' AND  project.organizationNr = '".$organizationNr."'";
	$result = mysqli_query($connection, $sql);

	if($result){
		if(mysqli_num_rows($result) == 1){
			$row = mysqli_fetch_assoc($result);

			$res = $row['SUM(sum)'];

			$sum = $res;

			//$res = number_format($res,0,"."," ");

			if ($res == "") {
				echo 0;
			}
			else{
				echo $res;
			}
		}
	}
}
else if ($num == 8) {
	$sql = "SELECT SUM(sum) FROM donation INNER JOIN project ON donation.projectID = project.projectID  WHERE MONTH(date(donation.date)) = MONTH('" . $date . "') AND YEAR(date(donation.date)) = YEAR('" . $date . "') AND  project.organizationNr = '".$organizationNr."'";
	$result = mysqli_query($connection, $sql);

	if($result){
		if(mysqli_num_rows($result) == 1){
			$row = mysqli_fetch_assoc($result);

			$res = $row['SUM(sum)'];

			$sum = $res;

			$res = number_format($res,0,"."," ");

			if ($res == "") {
				echo 0;
			}
			else{
				echo $res;
			}
		}
	}	
}
else if ($num == 9) {
	$sql = "SELECT SUM(sum) FROM donation INNER JOIN project ON donation.projectID = project.projectID WHERE YEAR(date(donation.date)) = '" . $date . "' AND  project.organizationNr = '".$organizationNr."'";
	$result = mysqli_query($connection, $sql);

	if($result){
		if(mysqli_num_rows($result) == 1){
			$row = mysqli_fetch_assoc($result);

			$res = $row['SUM(sum)'];

			$sum = $res;

			$res = number_format($res,0,"."," ");

			if ($res == "") {
				echo 0;
			}
			else{
				echo $res;
			}
		}
	}
}
else if ($num == 10) {

	$sql = "SELECT COUNT(*) FROM donation INNER JOIN project ON donation.projectID = project.projectID WHERE DATE(donation.date) = '" . $date . "' AND  project.organizationNr = '".$organizationNr."'";
	$result = mysqli_query($connection, $sql);

	if($result){
		if(mysqli_num_rows($result) == 1){
			$row = mysqli_fetch_assoc($result);

			$res = $row['COUNT(*)'];

			$donate = $res;
		}	
	}

	$sql2 = "SELECT SUM(sum) FROM donation INNER JOIN project ON donation.projectID = project.projectID WHERE DATE(donation.date) = '" . $date . "' AND  project.organizationNr = '".$organizationNr."'";
	$result2 = mysqli_query($connection, $sql2);

	if($result2){
		if(mysqli_num_rows($result2) == 1){
			$row = mysqli_fetch_assoc($result2);

			$res = $row['SUM(sum)'];

			if ($res == "") {
				$sum = 0;
			}
			else{
				$sum = $res;
			}
		}
	}

	if($donate != 0){
		$totalt = $sum/$donate;
	}
	else{
		$totalt = 0;
	}

	echo $totalt;
}
else if ($num == 11) {
	$sql = "SELECT COUNT(*) FROM donation INNER JOIN project ON donation.projectID = project.projectID  WHERE MONTH(date(donation.date)) = MONTH('" . $date . "') AND YEAR(date(donation.date)) = YEAR('" . $date . "') AND  project.organizationNr = '".$organizationNr."'";
	$result = mysqli_query($connection, $sql);

	if($result){
		if(mysqli_num_rows($result) == 1){
			$row = mysqli_fetch_assoc($result);

			$res = $row['COUNT(*)'];

			$donate = $res;
		}	
	}

	$sql2 = "SELECT SUM(sum) FROM donation INNER JOIN project ON donation.projectID = project.projectID  WHERE MONTH(date(donation.date)) = MONTH('" . $date . "') AND YEAR(date(donation.date)) = YEAR('" . $date . "') AND  project.organizationNr = '".$organizationNr."'";
	$result2 = mysqli_query($connection, $sql2);

	if($result2){
		if(mysqli_num_rows($result2) == 1){
			$row = mysqli_fetch_assoc($result2);

			$res = $row['SUM(sum)'];

			if ($res == "") {
				$sum = 0;
			}
			else{
				$sum = $res;
			}
		}
	}	


	if($donate != 0){
		$totalt = $sum/$donate;
	}
	else{
		$totalt = 0;
	}

	echo $totalt;
}
else if ($num == 12) {
	$sql = "SELECT COUNT(*) FROM donation INNER JOIN project ON donation.projectID = project.projectID WHERE YEAR(date(donation.date)) = '" . $date . "' AND  project.organizationNr = '".$organizationNr."'";
	$result = mysqli_query($connection, $sql);

	if($result){
		if(mysqli_num_rows($result) == 1){
			$row = mysqli_fetch_assoc($result);

			$res = $row['COUNT(*)'];

			$donate = $res;
		}	
	}


	$sql2 = "SELECT SUM(sum) FROM donation INNER JOIN project ON donation.projectID = project.projectID WHERE YEAR(date(donation.date)) = '" . $date . "' AND  project.organizationNr = '".$organizationNr."'";
	$result2 = mysqli_query($connection, $sql2);

	if($result2){
		if(mysqli_num_rows($result2) == 1){
			$row = mysqli_fetch_assoc($result2);

			$res = $row['SUM(sum)'];

			if ($res == "") {
				$sum = 0;
			}
			else{
				$sum = $res;
			}
		}
	}

	if($donate != 0){
		$totalt = $sum/$donate;
	}
	else{
		$totalt = 0;
	}
	echo $totalt;
}
else if ($num == 13) {
	$sql = "SELECT COUNT(*) FROM news INNER JOIN project ON news.projectID = project.projectID WHERE DATE(news.date_added) = '" . $date . "' AND  project.organizationNr = '".$organizationNr."'";
	$result = mysqli_query($connection, $sql);

	if($result){
		if(mysqli_num_rows($result) == 1){
			$row = mysqli_fetch_assoc($result);

			$res = $row['COUNT(*)'];

			echo $res;
		}
	}
}
else if ($num == 14) {
	$sql = "SELECT COUNT(*) FROM news INNER JOIN project ON news.projectID = project.projectID  WHERE MONTH(date(news.date_added)) = MONTH('" . $date . "') AND YEAR(date(project.date_added)) = YEAR('" . $date . "') AND  project.organizationNr = '".$organizationNr."'";
	$result = mysqli_query($connection, $sql);

	if($result){
		if(mysqli_num_rows($result) == 1){
			$row = mysqli_fetch_assoc($result);

			$res = $row['COUNT(*)'];

			echo $res;
		}
	}
}
else if ($num == 15) {
	$sql = "SELECT COUNT(*) FROM news INNER JOIN project ON news.projectID = project.projectID WHERE YEAR(date(news.date_added)) = '" . $date . "' AND  project.organizationNr = '".$organizationNr."'";
	$result = mysqli_query($connection, $sql);

	if($result){
		if(mysqli_num_rows($result) == 1){
			$row = mysqli_fetch_assoc($result);

			$res = $row['COUNT(*)'];

			echo $res;
		}
	}
}
else if ($num == 16) {
	$sql = "SELECT COUNT(*) FROM project WHERE DATE(date_added) = '" . $date . "' AND organizationNr = '".$organizationNr."'";
	$result = mysqli_query($connection, $sql);

	if($result){
		if(mysqli_num_rows($result) == 1){
			$row = mysqli_fetch_assoc($result);

			$res = $row['COUNT(*)'];

			echo $res;
		}
	}
}
else if ($num == 17) {
	$sql = "SELECT COUNT(*) FROM project WHERE MONTH(date(project.date_added)) = MONTH('" . $date . "') AND YEAR(date(project.date_added)) = YEAR('" . $date . "') AND  organizationNr = '".$organizationNr."'";
	$result = mysqli_query($connection, $sql);

	if($result){
		if(mysqli_num_rows($result) == 1){
			$row = mysqli_fetch_assoc($result);

			$res = $row['COUNT(*)'];

			echo $res;
		}
	}
}
else if ($num == 18) {
	$sql = "SELECT COUNT(*) FROM project WHERE YEAR(date(project.date_added)) = '" . $date . "' AND  organizationNr = '".$organizationNr."'";
	$result = mysqli_query($connection, $sql);

	if($result){
		if(mysqli_num_rows($result) == 1){
			$row = mysqli_fetch_assoc($result);

			$res = $row['COUNT(*)'];

			echo $res;
		}
	}
}

?>