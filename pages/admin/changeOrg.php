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
		<h1>Endre organisasjoner</h1>
	</div>



	<style type="text/css">
	table, th, tr, td{
		border: 1px solid black;
		padding-left: 15px;
		padding-right: 15px;
	}
	</style>

	<script type="text/javascript">




	function setOrgNr(organizationNr){
		
		$.ajax({
			type: "POST",
			data : {"organizationNr" : organizationNr},
			url: "../../phpBackend/AdminSetSession.php",
			success : function(response){
				if(response == "OK"){
					window.location.replace("changeOrganization.php");
				}
			},
			error : function(error){
				console.log(JSON.stringify(error));
				alert(error.message);
			}
		});
	}

	</script>
		
		<div class="col-md-4"></div>
		<div class="col-md-4">
		<?php
		
			echo '<table>
				<tr>
					<th>OrgNr</th>
					<th>Navn</th>
					<th>Funksjoner</th>
				</tr>
				';



				$db = mysqli_connect("localhost", "root", "", "database");
				$sql = "SELECT * FROM organization";
				$resultat = mysqli_query($db, $sql);

				if($resultat){
					if(mysqli_num_rows($resultat) > 0){
						while($rad = mysqli_fetch_assoc($resultat)){
							echo '</tr>';
							echo '<td>'. $rad['organizationNr']. '</td>';
							echo '<td>'. $rad['name']. '</td>';
							echo '<td><a onclick="setOrgNr('. $rad['organizationNr'] .')" style="cursor:pointer;">Endre</a> - <a onclick="setOrgNr('. $rad['organizationNr'] .')" style="cursor:pointer;">Slett</a></td>';
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