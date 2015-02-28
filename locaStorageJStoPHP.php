<?php

if(isset($_POST['projectIDtoShow'])){
	$S_SESSION['projectIDtoShow'] = $_POST['projectIDtoShow'];
	echo "ProjectID som skal vises er satt";
}

?>