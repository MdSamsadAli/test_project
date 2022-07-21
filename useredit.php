<?php
include 'connection.php';
$id = $_REQUEST['id'];
$sql = "SELECT * from users where id =" .$id;
$result = mysqli_query($conn, $sql);
if ($result) {
	$row = mysqli_fetch_assoc($result);
}
?>

<?php
include 'connection.php';
if (isset($_POST['submit'])) {
	$username = $_POST['username'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$usertype = $_POST['usertype'];


	$sql = "UPDATE users set `username` = '$username', `email` = '$email', `password` = '$password', `usertype` = '$usertype' where id = '$id'";
	$result = mysqli_query($conn, $sql);
	if ($result) {
		header("location: userdetail.php");
	}
	else{
		echo "not updated record".mysqli_error($conn);
	}
}

?>



<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
    <title>Update Record</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    
</head>
<body>
	<!-- <div class="container-fluid">
		
	</div> -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light justify-content-between">
        <div>
            <a class="navbar-brand" href="index.php">Dashboard</a>
        </div>
    <!-- <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button> -->
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-item nav-link active" href="index.php">Home</span></a>
                <a class="nav-item nav-link active" href="#">Contact</span></a>
                <a class="nav-item nav-link active" href="#">Contact_List</span></a>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        <form method="post" enctype="multipart/form-data">
            <div class="form-group row mb-4">
                <label for="username" class="col-sm-2 col-form-label">UserName</label>
                <div class="col-sm-8">
                <input type="text" class="form-control" id="username" placeholder="UserName..." name="username" value="<?php echo $row['username'];?>">
                </div>
            </div>

            <div class="form-group row mb-4">
                <label for="email" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-8">
                <input type="text" class="form-control" id="email" placeholder="Enter your Email..." name="email" value="<?php echo $row['email']; ?>">
                </div>
            </div>

            <div class="form-group row mb-4">
                <label for="password" class="col-sm-2 col-form-label">Password</label>
                <div class="col-sm-8">
                <input type="text" class="form-control" id="address" placeholder=" Enter Your Password..." name="password" value="<?php echo $row['password']; ?>">
                </div>
            </div>

            <div class="form-group row mb-4">
                <label for="usertype" class="col-sm-2 col-form-label">UserType</label>
                <div class="col-sm-8">
                    <select name="usertype">
                        <option value="user">Admin</option>
                        <option value="admin">User</option>
                    </select>
                </div>
            </div>
           
            <div class="form-group row">
                <div class="col-sm-10">
                <button type="submit" class="btn btn-primary form-control" name = "submit">Update</button>
                </div>
            </div>
        </form>
    </div>
</body>
</html>