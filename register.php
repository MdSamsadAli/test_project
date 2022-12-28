<?php 
    session_start();

include 'connection.php';


// $array3 = array();

// $array1= array('appl','ball');
// $array2= array('ghiraula','bhini');
// $arrayz= array('asfsaf','bhini');


// $all_arrays = [$array1, $array2,$arrayz];
// $merged = [];
// for ($i = 0; $i < 3; $i++) {
//     $arr = $all_arrays[$i];
//     $x = count($arr);
//     for ($j=0; $j < $x; $j++) { 
//        $merged[$arr[$j]] = 1;
//     }
// }

// $array3 = [];
// $x = count($merged);
// for ($i=0; $i < $x; $i++) { 
//   $array3[] = key($merged);
//   next($merged);
// }
// foreach($array3 as $val){
// 	echo $val.'<br>';
// }
// var_dump($array3);


// $array1= array('1','2');
// $array2= array('4','5');

// $i =0;

// $array3 = array();

// foreach($array1 as $ky=>$val){
	
// 	array_push($array3,$val);

// }

// foreach($array2 as $ky=>$val){
	
// 	array_push($array3,$val);

// }

// foreach($array3 as $ky=>$val){
	
//  var_dump($val).'<br>';
// }




if (isset($_POST['submit'])) {
	// code...

	$username = $_POST['valUsername'];
	$email = $_POST['valEmail'];
	$password = $_POST['valPassword'];
	$confirmpassword = $_POST['ConfirmPassword'];
	$usertype = $_POST['usertype'];


	if($password === $confirmpassword){
		$query = "INSERT INTO users (username, email, password, usertype) VALUES ('$username', '$email', '$password', '$usertype')";
		$result = mysqli_query($conn, $query);

		if($result){
			$_SESSION['status'] = " Thanks ! Registration Successul";
			header('Location: register.php');
			exit();

		}else{
			$_SESSION['status'] = " Sorry ! Admin profile Not added";
			header('Location: register.php');
			exit();

		}
	}else{
		$_SESSION['status'] = " Sorry ! password and confirmpassword not match";
		header('Location: register.php');
		exit();

	}
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Registration system PHP and MySQL</title>
	<link rel="stylesheet" type="text/css" href="register.css">
	<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
</head>
<body>
<div class="header">
	<h2>Register</h2>

	<?php 
	
    if(isset($_SESSION['status']))
    {
        ?>
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <?= $_SESSION['status']; ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php 
        unset($_SESSION['status']);
    }

?>
</div>

<?php 
	if(isset($errors) && count($errors) > 0)
	{
		foreach($errors as $error_msg)
		{
			echo '<div class="alert alert-danger">'.$error_msg.'</div>';
		}
    }
    
    if(isset($success))
    {
        
        echo '<div class="alert alert-success">'.$success.'</div>';
    }
?>

<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">

	<div class="mb-3">
		<label for="username" class="form-label">Username</label>
		<input type="text" class="form-control" id="exampleInputPassword1" name="valUsername" required>
	</div>
	<div class="mb-3">
		<label for="exampleInputPassword1" class="form-label">Email</label>
		<input type="text" class="form-control" id="exampleInputPassword1" name="valEmail" required>
	</div>
	<div class="mb-3">
		<label for="exampleInputPassword1" class="form-label">Password</label>
		<input type="password" class="form-control" id="exampleInputPassword1" name="valPassword" required>
	</div>

	<div class="mb-3">
		<label for="exampleInputPassword1" class="form-label"> Confirm Password</label>
		<input type="password" class="form-control" id="exampleInputPassword1" name="ConfirmPassword" required>
	</div>
	
	<input type="hidden" name="usertype" value="user">
	
	<button type="submit" class="btn btn-primary" name="submit">Register</button>


	<p>
		Already a member? <a href="login.php">Sign in</a>
	</p>
</form>
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</body>
</html>