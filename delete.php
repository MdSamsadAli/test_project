<?php
include 'connection.php';
$id = $_REQUEST['id'];
$sql = "DELETE from `contact_list` where id = '$id'";
$result = mysqli_query($conn, $sql);
if ($result) {
	header("location: index.php");
}
else{
	echo "Record not deleted".mysqli_error($conn);
}
?>