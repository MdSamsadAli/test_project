<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Dashboard</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
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
            <div class = "pull-right">
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
        <div class="wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-bordered table-striped text-center">
                            <h2>User Details</h2>
                            <thead>
                                <tr>
                                    <th>SNo.</th>
                                    <th>Username</th>
                                    <th>Email</th>
                                    <th>Password</th>
                                    <th>UserType</th>
                                   <th colspan="3">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                include 'connection.php';
                                $id = 1;
                                $sql = "SELECT * from users ORDER BY id desc";
                                $result = mysqli_query($conn, $sql);
                                if($result){
                                while($row = mysqli_fetch_assoc($result)){
                                ?>
                                <tr>

                                    <td><?php echo $id; ?></td>
                                    <td><?php echo $row['username']; ?></td>
                                    <td><?php echo $row['email']; ?></td>
                                    <td><?php echo $row['password']; ?></td>
                                    <td><?php echo $row['usertype']; ?></td>

                                    <td>
                                        <a href="useredit.php?id=<?php echo $row['id']; ?>" class="mr-3" title="View Record" data-toggle = "tooltip"><span class="fa fa-pencil">edit</span></a>
                                    </td>
                                    <td>
                                        <a href="deleteuser.php?id=<?php echo $row['id'];?>" class="mr-3" title="Record Delete" data-toggle = "tooltip"><span class="fa fa-trash">delete</span></a>
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

    </body>
</html>