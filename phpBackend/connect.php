<?php

$connection = mysqli_connect("student.cs.hioa.no", "s188081", "", "s188081") or die("Kunne ikke koble til database");

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