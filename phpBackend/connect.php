<?php

$connection = mysqli_connect("localhost", "root", "", "database") or die("Kunne ikke koble til database");

function insertInto($connection, $sql) {
	if (mysqli_query($connection, $sql) === TRUE) {
		return "OK";
	}else{
		return mysqli_error($connection);
		//sjekk om det er duplicate entry !
	}
}
function updateDatabase($connection, $sql){
	if (mysqli_query($connection, $sql) === TRUE) {
		return "OK";
	}else{
		return mysqli_error($connection);
		//sjekk om det er duplicate entry !
	}
}

// / // Vi trenger en slett funksjon også? // / // 
?>