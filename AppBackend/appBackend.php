<?php
header('Access-Control-Allow-Origin: *'); 

include '../phpBackend/connect.php';

if(isset($_POST['userLoginApp'])){
    $json = $_POST['userLoginApp'];
    $userLoginApp = json_decode($json, true);

    $username = $userLoginApp['email'];
    $password = $userLoginApp['password'];

    $sql = "SELECT password FROM User WHERE email = '$username'";
    $result = mysqli_query($connection, $sql);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        $dbpassword = $row['password'];

        if ($dbpassword == $password) {
            echo "OK";
            return "OK";
        } 
    }else {
     echo "WRONG";
     return "WRONG";
 }
}
if(isset($_POST['getSQL'])){
	$sql = $_POST['getSQL'];
	$result = mysqli_query($connection, $sql);
	$json = Array();
	if($result){
		while($row = mysqli_fetch_assoc($result)){
			$json[] = $row;
		}
	}
	echo json_encode($json);
}

if(isset($_POST['setSQL'])){
	$sql = $_POST['setSQL'];
	$result = mysqli_query($connection, $sql);
	if($result){
		echo "OK";
	}else{
		echo "SQL ERROR";
	}
}

if(isset($_POST['organizationSQL'])){
 $sql = $_POST['organizationSQL'];
 $result = mysqli_query($connection, $sql);

 if(mysqli_num_rows($result) > 0){
    $json = array();
    $index = 0;
    while($row = mysqli_fetch_assoc($result)){
        $orgnr = $row['organizationNr'];
        $projects = getProjectCount($orgnr, $connection);
        $json[] = $row;
        $json[$index]['projectCount'] = $projects;
        $index++;

    }
    echo json_encode($json);    
}
}


function getProjectCount($orgnr, $con){
    $sql = "SELECT * FROM Project WHERE organizationNr = '$orgnr'";
    $result = mysqli_query($con, $sql);
    return mysqli_num_rows($result);
}


?>