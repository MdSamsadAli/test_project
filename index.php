<?php 
    session_start();
    if(!$_SESSION['username']){
        header('location:login.php');
        exit;
    }

    // if(!$_SESSION['ID']){
    //     header('Location: dashboard.php');
    //     exit;
    // }
  
    // if(!isset($_SESSION['ID']) &&( $_SESSION['usertype'] != 'user') )
    // {
    //     header("Location:dashboard.php"); //Do not allow him to access.
    //     exit;
    // }

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Dashboard</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
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
            <div class = "pull-right me-3">
                <a class="nav-item nav-link active pull-right" href="login.php">
                    <?php //echo ucfirst($_SESSION['username']); ?>Login
                </span></a>
                <a class=" me-3 nav-item nav-link active pull-right" href="register.php">Register</span></a>
            <?php endif; ?>

                <a class="nav-item nav-link active pull-right" href="logout.php">Logout</span></a>
                
            </div>
        </div>
    </nav>
        
        <div id="mySidenav" class="sidenav">
            <a href="insert.php">Add New Users</a>
            <a href="index.php">User List</a>
            <a href="userdetail.php">Admin/User Profile</a>
        </div>
        <div class="wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-bordered table-striped text-center">
                            <h2 class="pull-left">User Details</h2>
                            <?php 
	
                                if(isset($_SESSION['status']))
                                {
                                    ?>
                                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                            <strong>Thank you !</strong> <?= $_SESSION['status']; ?>
                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                        </div>
                                    <?php 
                                    unset($_SESSION['status']);
                                }

                            ?>
                            <thead>
                                <tr>
                                    <th>SNo.</th>
                                    <th>Username</th>
                                    <th>Email</th>
                                    <th>Address</th>
                                    <th>File</th>
                                   <th colspan="3">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                include 'connection.php';
                                $id = 1;
                                $sql = "SELECT * from contact_list ORDER BY id desc";
                                $result = mysqli_query($conn, $sql);
                                if($result){
                                while($row = mysqli_fetch_assoc($result)){
                                ?>
                                <tr>

                                    <td><?php echo $id; ?></td>
                                    <td><?php echo $row['username']; ?></td>
                                    <td><?php echo $row['email']; ?></td>
                                    <td><?php echo $row['address']; ?></td>
                                    <td><?php echo $row['file']; ?></td>


                                    <td>
                                        <a href="edit.php?id=<?php echo $row['id']; ?>" class="mr-3" title="View Record" data-toggle = "tooltip"><span class="fa fa-pencil">edit</span></a>
                                    </td>
                                    <td>
                                        <a href="delete.php?id=<?php echo $row['id'];?>" class="mr-3" title="Record Delete" data-toggle = "tooltip"><span class="fa fa-trash">delete</span></a>
                                    </td>
                                </tr>
                                <?php $id++; ?>
                                <?php }
                                }?>
                            </tbody>
                        </table>
                    </div>
                </div>        
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    </body>
</html>