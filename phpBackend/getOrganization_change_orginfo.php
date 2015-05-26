<?php
$sql = "SELECT * FROM organization WHERE organizationNr = $organizationNr";
$result = mysqli_query($connection, $sql);
if($result){
	if(mysqli_num_rows($result) == 1){
		$row = mysqli_fetch_assoc($result);
		echo "<h1>" . $row['name'] . "</h1>";
	}
}
?>