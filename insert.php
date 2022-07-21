<?php 
    session_start();
  
    if(!$_SESSION['username']){
        header('location:login.php');
    }
?>


<?php
include 'connection.php';
if (isset($_POST['submit'])) {
	$username = $_POST['username'];
	$email = $_POST['email'];
	$address = $_POST['address'];

    $allow = array('pdf');
    $temp = explode(".", $_FILES['pdf_file']['name']);
    $extension = end($temp);
	$upload_file = $_FILES['pdf_file']['name'];
    move_uploaded_file($_FILES['pdf_file']['tmp_name'], "uploads/pdf/".$_FILES['pdf_file']['name']);


	$sql = "INSERT into contact_list(`username`, `email`, `address`, `file`) VALUES('$username', '$email','$address', '$upload_file')";
	$result = mysqli_query($conn, $sql);
	if ($result) {
		$_SESSION['status'] = "profile added successful";
		header("location: index.php");
        exit();
	}
	else{
		echo "not inserted record".mysqli_error($conn);
        exit();
	}
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="UTF-8">
        <title>Dashboard</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="style.css">
    </head>
<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light justify-content-between">
        <div>
            <a class="navbar-brand" href="index.php">Admin Panel</a>
        </div>
        <?php if(isset($_SESSION['username'])) : ?>
        <div class="collapse navbar-collapse d-flex justify-content-end" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-item nav-link active" href="index.php">Home</span></a>
                <a class="nav-item nav-link active" href="insert.php">Contact</span></a>
                <a class="nav-item nav-link active" href="index.php">Contact_List</span></a>
            </div>
            <?php else : ?>
            <div>
                <a class="nav-item nav-link active pull-right" href="login.php">Login</span></a>
                <a class="nav-item nav-link active pull-right" href="register.php">Register</span></a>
                <?php endif; ?>
                <a class="nav-item nav-link active pull-right" href="logout.php">Logout</span></a>
            </div>
        </div>
    </nav>

    <div id="mySidenav" class="sidenav">
            <a href="insert.php">Add New Employee</a>
            <a href="index.php">Employee List</a>
            <a href="userdetail.php">User Profile</a>
    </div>

    <div class="wrapper mt-4">
        <h2>Add Details Here</h2>
        <div class="container mt-4">
            <form method="post" enctype="multipart/form-data">
                <div class="form-group row mb-4">
                    <label for="username" class="col-sm-2 col-form-label">UserName</label>
                    <div class="col-sm-8">
                    <input type="text" class="form-control" id="username" placeholder="UserName..." name="username" required>
                    </div>
                </div>

                <div class="form-group row mb-4">
                    <label for="email" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-8">
                    <input type="text" class="form-control" id="email" placeholder="Enter your Email..." name="email" required>
                    </div>
                </div>

                <div class="form-group row mb-4">
                    <label for="address" class="col-sm-2 col-form-label">Address</label>
                    <div class="col-sm-8">
                    <input type="text" class="form-control" id="address" placeholder=" Enter Your Address..." name="address" required>
                    </div>
                </div>

                <div class="form-group row mb-4">
                    <label for="file" class="col-sm-2 col-form-label">File</label>
                    <div class="col-sm-8">
                    <input type="file" class="form-control" id="username" name="pdf_file" accept="application/pdf" required>
                    </div>
                </div>
            
                <div class="form-group row">
                    <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary form-control" name = "submit">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>
</html>