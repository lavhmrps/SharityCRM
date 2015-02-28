<?php
ob_start();
if (isset($_POST['projectIDtoShow'])) {
	session_start();
	$_SESSION['projectIDtoShow'] = $_POST['projectIDtoShow'];
	echo "ProjectIDtoShow er satt i localStorageJStoPHP";
}
if (isset($_POST['newsIDtoShow'])) {
	session_start();
	$_SESSION['newsIDtoShow'] = $_POST['newsIDtoShow'];
	echo "NewsIDtoShow er satt i localStorageJStoPHP";
}
ob_end_flush();
?>