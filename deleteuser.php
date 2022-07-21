<?php
include 'connection.php';
$id = $_REQUEST['id'];
$sql = "DELETE from `users` where id = '$id'";
$result = mysqli_query($conn, $sql);
if ($result) {
	header("location: userdetail.php");
}
else{
	echo "Record not deleted".mysqli_error($conn);
}
?>