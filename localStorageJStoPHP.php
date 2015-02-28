<?php
ob_start();
if (isset($_POST['projectID'])) {
	session_start();
	$_SESSION['projectIDtoShow'] = $_POST['projectID'];
	echo "ProjectIDtoShow er satt i localStorageJStoPHP";
}
ob_end_flush();
?>