<?php
include "../../phpBackend/connect.php";
?>
<!DOCTYPE html>
<html>
<head>


	<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
	<meta charset="utf-8"/>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>Admin</title>

	<!-- Bootstrap Core CSS -->
	<link href="../../css/bootstrap.min.css" rel="stylesheet">
	<link href="../../css/Admin.css" rel="stylesheet">
	
	
</head>
<body>

	<?php
	include "adminHeader_nav.php";
	?>


	<div class="col-md-12 text-center">
		<h1>Endre brukere</h1>
	</div>



	<style type="text/css">
		table, th, tr, td{
			border: 1px solid black;
			padding-left: 15px;
			padding-right: 15px;
		}
	</style>

	<script type="text/javascript">




		function setEmail(email){

			$.ajax({
				type: "POST",
				data : {"email" : email},
				url: "../../phpBackend/AdminSetSession.php",
				success : function(response){
					if(response == "OK"){
						window.location.replace("changeGivenUser.php");
					}
				},
				error : function(error){
					console.log(JSON.stringify(error));
					alert(error.message);
				}
			});
		}

	</script>
	<div class="container">
		


		<div class="col-md-4"></div>
		<div class="col-md-4">
			<div class="col-md-12 text-center">
				<input type="text" name="search" placeholder="Søk.." />
			</div>
			<?php

			echo '<table>
			<tr>
				<th>email</th>
				<th>Navn</th>
				<th>Adresse</th>
			</tr>
			';



			
			$sql = "SELECT * FROM user";
			$result = mysqli_query($connection, $sql);

			if($result){
				if(mysqli_num_rows($result) > 0){
					while($row = mysqli_fetch_assoc($result)){
						echo '</tr>';
						echo '<td>'. $row['email']. '</td>';
						echo '<td>'. $row['name']. '</td>';
						echo '<td><a onclick="setEmail('. $row['email'] .')" style="cursor:pointer;">Endre</a> - <a onclick="setEmail('. $row['email'] .')" style="cursor:pointer;">Slett</a></td>';
						echo '</tr>';
					}
				}
			}

			echo '</table>';

			?>
		</div>
		<div class="col-md-4"></div>
	</div>
	<div class="col-md-2 text-center"></div>





<!-- jQuery -->
<script src="../../js/jquery.js"></script>
<script src="../../js/stickyheader.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="../../js/bootstrap.min.js"></script>

</body>
</html>