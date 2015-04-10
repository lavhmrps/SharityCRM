

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php
		include "adminHeader_nav.php";
	?>
	<h1>Alle brukere</h1>

	<?php

		$sql = "SELECT * FROM User";
		$result = mysqli_query($connection, $sql);

		if(mysqli_num_rows($result) >= 1){
			while($row = mysqli_fetch_assoc($result)){
				echo $row['email'];
			}
		}


	?>

</body>
</html>