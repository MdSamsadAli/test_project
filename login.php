<?php
    session_start();

    include 'connection.php';

if(isset($_POST['submit'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "SELECT * FROM users WHERE username = '$username' AND password = '$password' ";
    $result = mysqli_query($conn, $query);
	$usertypes = mysqli_fetch_array($result);

    if($usertypes['usertype'] == "admin")
	{
        $_SESSION['username'] = $username;
		$_SESSION['message'] = "Welcome to Admin Panel";
        header('Location: index.php');
        exit();

    }
	else if($usertypes['usertype'] == "user")
	{
		$_SESSION['username'] = $username;
		$_SESSION['message'] = "Welcome to Dashboard";
        header('Location: dashboard.php');
        exit();
	}
	else
	{
        $_SESSION['message'] = " Sorry ! Email / Password is Invalid";
        header('Location: login.php');
        exit();

    }
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Registration system PHP and MySQL</title>
	<link rel="stylesheet" type="text/css" href="register.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">

</head>
<body>
	<div class="header">
		<h2>Login</h2>
        <?php
        if(isset($_SESSION['message']))
        {
            ?>
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                 <?= $_SESSION['message']; ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <?php
                unset($_SESSION['message']);
        }
        ?>
		

		<?php 
            if(isset($errors) && count($errors) > 0)
            {
                foreach($errors as $error_msg)
                {
                    echo '<div class="alert alert-danger">'.$error_msg.'</div>';
                }
            }
        ?>

	</div>
	<form method="post" action="login.php">
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Username</label>
            <input type="text" class="form-control" id="exampleInputPassword1" name="username" required>
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input type="password" class="form-control" id="exampleInputPassword1" name="password" required>
        </div>
		<button type="submit" class="btn btn-primary" name="submit">Login</button>
		<p>
			Not yet a member? <a href="register.php">Sign up</a>
		</p>
	</form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>

</body>
</html>