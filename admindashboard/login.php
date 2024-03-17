<?php
session_start(); 
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Login form</title>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<link rel="stylesheet" href="assets/css/style.css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<body>
<?php
include 'db.php'; 
 ?>

 <?php
 
 if(isset($_POST['submit']))
 {
 	$uname = $_POST["username"];
 	$upass = $_POST["password"];
   
    $query= mysqli_query($conn,"select * from admin where name ='$uname' AND password = '$upass'");
    echo mysqli_error($conn);
    $row=mysqli_num_rows($query);
   if($row==1)
   {
   	  $_SESSION["admin_login"]="yes";
      $_SESSION["admin"]=$uname;
      header("location:index.php");
      die();
   }
   else
   {
     echo "<script>alert('please enter correct detail')</script>";
   }

 } 
  ?>
 <div id="login">
        <h3 class="text-center text-white pt-5">Login form</h3>
        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12">
                        <form id="login-form" class="form" action="" method="post">
                            <h2 class="text-center text-info">Admin-Login</h2>
                            <div class="form-group">
                                <label for="username" class="text-info">Username:</label><br>
                                <input type="text" name="username" id="username" class="form-control" placeholder="Enter your name" required="">
                            </div>
                            <div class="form-group">
                                <label for="password" class="text-info">Password:</label><br>
                                <input type="text" name="password" id="password" class="form-control" placeholder="Enter your password" required="">
                            </div>
                           
                            <br>
                            <br>
                            <div class="form-group">
                                <label for="remember-me" class="text-info"><span>Remember me</span> <span><input id="remember-me" name="remember-me" type="checkbox"></span></label><br>
                                <input type="submit" name="submit" class="btn btn-info btn-md mt-4" value="submit">
                            </div>
                            <div id="register-link" class="text-right">
                                <a href="#" class="text-info btn btn-danger">Forgot Password</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>