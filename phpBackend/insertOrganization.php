<?php
include '../phpBackend/connect.php';

if (isset($_POST['organization'])) {
	$json = $_POST['organization'];
	$organization = json_decode($json, true);
	$organizationNr = $organization['organizationNr'];
	$name = $organization['name'];
	$password = $organization['password'];
	
	function better_crypt($input, $rounds = 7)
  	{
    	$salt = "";
    	$salt_chars = array_merge(range('A','Z'), range('a','z'), range(0,9));
    	for($i=0; $i < 22; $i++) {
      	$salt .= $salt_chars[array_rand($salt_chars)];
    	}
    	return crypt($input, sprintf('$2a$%02d$', $rounds) . $salt);
  	}

	$hash = better_crypt($password);
	
	
	$sql = "INSERT INTO Organization (organizationNr, name, password)VALUES($organizationNr,'$name','$hash')";
	$mysql_status = insertInto($connection, $sql);
	echo $mysql_status;
}
?>