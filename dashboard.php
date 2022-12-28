<?php 
    session_start();
    if(!$_SESSION['username']){
        header('location:login.php');
        exit;
    }
  
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
        <style>
            .wrapper{
                width: 900px;
                margin: auto;
            }
            table tr td:last-child{
                width: 120px;
            }
        </style>
    </head>
    <body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div>
            <a class="navbar-brand" href="dashboard.php">Dashboard</a>
        </div>
        <?php if(isset($_SESSION['username'])) : ?>
        <div class="collapse navbar-collapse d-flex justify-content-end" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-item nav-link active" href="dashboard.php">Home</span></a>
                <a class="nav-item nav-link active" href="contact_form.php">Contact</span></a>
                <a class="nav-item nav-link active" href="dashboard.php">Contact_List</span></a>
            </div>
            <?php else: ?>
            <div class = "pull-right">
                <a class="nav-item nav-link active pull-right" href="login.php">
                    <?php echo ucfirst($_SESSION['username']); ?>
                </span></a>
                <a class="nav-item nav-link active pull-right" href="register.php">Register</span></a>
                <?php endif; ?>
                <a class="nav-item nav-link active pull-right" href="logout.php">Logout</span></a>
            </div>
        </div>
    </nav>
        
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-bordered table-striped text-center">
                        <h2 class="pull-left">User Details</h2>
                        <thead>
                            <tr>
                                <th>SNo.</th>
                                <th>Username</th>
                                <th>Email</th>
                                <th>Address</th>
                                <th>File</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            include 'connection.php';
                            $id = 1;
                            $sql = "SELECT * from contact_list";
                            $result = mysqli_query($conn, $sql);
                            if($result){
                            while($row = mysqli_fetch_assoc($result)){
                            ?>
                            <tr>

                                <td><?php echo $id; ?></td>
                                <td><?php echo $row['username']; ?></td>
                                <td><?php echo $row['email']; ?></td>
                                <td><?php echo $row['address']; ?></td>
                                <td>
                                    <?php echo $row['file']; ?></td>
                                
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