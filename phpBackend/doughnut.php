<?php 
session_start();

include '../phpBackend/checkSession.php';
include '../phpBackend/connect.php';


$num = $_REQUEST["num"];
$date = $_REQUEST["date"];
$organizationNr = $_SESSION['organizationNr'];

if ($num == 1) {
	$sql = "SELECT COUNT(*) FROM Subscription INNER JOIN Project ON Subscription.projectID = Project.projectID WHERE DATE(Subscription.date_added) = '" . $date . "' AND  Project.organizationNr = '".$organizationNr."'";
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