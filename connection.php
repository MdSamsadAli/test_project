<?php
$servername = "localhost";
$username = "root";
$password = "";
$db = "test_project";

$conn = mysqli_connect($servername, $username, $password, $db);
if (!$conn) {
	die("connection failed".mysqli_error($conn));
}
?>