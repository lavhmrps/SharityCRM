<?php
session_start();
include "../phpBackend/connect.php";
include "../phpBackend/checkSession.php";
if (isset($_SESSION['organizationNr'])) {
$organizationNr = $_SESSION['organizationNr'];
$projectID = $_SESSION['projectIDtoRegisterNews'];
$newsID = $_SESSION['IDofLastNewsInsert'];
if ( $_FILES['file_background']['error'] > 0) {
echo 'Error: ' . $_FILES['file_background']['error'] . '<br>';
}
else {
$path = "Bilder/" . $organizationNr . "/". $projectID . "/News/" . $newsID . "/Bakgrunnsbilde/";
if (!file_exists($path)) {
mkdir($path, 0777, true);
}
chmod($path, 0777);
$target_dir = $path;
$target_file = $target_dir . basename($_FILES["file_background"]["name"]);
move_uploaded_file($_FILES["file_background"]["tmp_name"], $target_file);
chmod($target_file, 0777);
$backgroundimgURL = "http://localhost/sharityCRM/" . $target_file;
$sql = "UPDATE News SET backgroundimgURL = '$target_file' WHERE newsID = $newsID";
if (mysqli_query($connection, $sql)) {
echo "Successful MySQL query INSERT News Background";
} else {
die('Error: ' . mysqli_error($connection));
db_close($connection);
}
}
}
?>