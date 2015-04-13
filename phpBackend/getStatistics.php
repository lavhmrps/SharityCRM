<?php
session_start();
include '../phpBackend/connect.php';
include '../phpBackend/checkSession.php';

$date = $_REQUEST["date"];

$organizationNr = $_SESSION['organizationNr'];
$sql = "SELECT Donation.* , Project.name FROM Donation INNER JOIN Project ON Donation.projectID = Project.projectID WHERE YEAR(date(Donation.date)) = YEAR('" . $date . "') AND Project.organizationNr = $organizationNr ORDER BY date";
$result = mysqli_query($connection, $sql);
$json_response = array();
if ($result) {
	while($row = mysqli_fetch_assoc($result)){
		$row_array['projectID'] = $row['projectID'];
		$row_array['name'] = $row['name'];
		
		$row_array['sum'] = $row['sum'];
		$row_array['type'] = $row['type'];
		$row_array['date'] = $row['date'];

		array_push($json_response,$row_array);
	}
	echo json_encode($json_response);
} else {
	echo "FAIL";
}

?>

<?php
/*
    //Create Database connection
    $db = mysql_connect("localhost","root","root");
    if (!$db) {
        die('Could not connect to db: ' . mysql_error());
    }
 
    //Select the Database
    mysql_select_db("test_json",$db);
    
    //Replace * in the query with the column names.
    $result = mysql_query("select * from employee", $db);  
    
    //Create an array
    $json_response = array();
    
    while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
        $row_array['id_employee'] = $row['id_employee'];
        $row_array['emp_name'] = $row['emp_name'];
        $row_array['designation'] = $row['designation'];
        $row_array['date_joined'] = $row['date_joined'];
        $row_array['salary'] = $row['salary'];
        $row_array['id_dept'] = $row['id_dept'];
        
        //push the values in the array
        array_push($json_response,$row_array);
    }
    echo json_encode($json_response);
    
    //Close the database connection
    fclose($db);
 */
?>