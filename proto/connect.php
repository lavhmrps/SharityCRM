<?php
$connection = mysqli_connect("localhost", "root", "", "database");

function insertInto($connection, $sql) {

	if (mysqli_query($connection, $sql) === TRUE) {
		return "OK";
	}else{
		return mysqli_error($connection);
		//sjekk om det er duplicate entry !
	}

}

?>