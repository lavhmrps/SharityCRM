<?php
header('Access-Control-Allow-Origin: *'); 

session_start();

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
            mysqli_close($connection);
            return;
        } 
    }else {
        // Sjekker om det en organisasjon som logger inn
        $sql = "SELECT password FROM organization WHERE name = '$username'";
        $result = mysqli_query($connection, $sql);
        if (mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_assoc($result);
            $dbpassword = $row['password'];
            if ($dbpassword == $password) {
                echo "ORG";
                mysqli_close($connection);
                return;
            }
        }else{
            $sql = "SELECT password FROM organization WHERE organizationNr = '$username'";
            $result = mysqli_query($connection, $sql);
            if (mysqli_num_rows($result) == 1) {
                $row = mysqli_fetch_assoc($result);
                $dbpassword = $row['password'];
                if ($dbpassword == $password) {
                    echo "ORG2";
                    mysqli_close($connection);
                    return;
                }
            }
        }
        

        mysqli_close($connection);
        echo "Feil brukernavn/passord kombinasjon";
        return ;
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
    mysqli_close($connection);
    echo json_encode($json);
}

if(isset($_POST['setSQL'])){
	$sql = $_POST['setSQL'];
	$result = mysqli_query($connection, $sql);
	if($result){
		echo "OK";
        mysqli_close($connection);
    }else{
      echo "SQL ERROR";
      mysqli_close($connection);
  }
}

if(isset($_POST['organizationSQL']))
{
 $sql = $_POST['organizationSQL'];
 $result = mysqli_query($connection, $sql);

    if(mysqli_num_rows($result) > 0)
    {
    $json = array();
    $index = 0;
    while($row = mysqli_fetch_assoc($result)){
        $orgnr = $row['organizationNr'];
        $projects = getProjectCount($orgnr, $connection);
        $json[] = $row;
        $json[$index]['projectCount'] = $projects;
        $index++;

    }
    mysqli_close($connection);
    echo json_encode($json);    
    }
}

function getProjectCount($orgnr, $con){
    $sql = "SELECT * FROM Project WHERE organizationNr = '$orgnr'";
    $result = mysqli_query($con, $sql);
    return mysqli_num_rows($result);
}
?>