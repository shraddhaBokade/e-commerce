
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Login | E-Shopper</title>
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/font-awesome.min.css" rel="stylesheet">
    <link href="assets/css/prettyPhoto.css" rel="stylesheet">
    <link href="assets/css/price-range.css" rel="stylesheet">
    <link href="assets/css/animate.css" rel="stylesheet">
	<link href="assets/css/main.css" rel="stylesheet">
	<link href="assets/css/responsive.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="assets/images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="assets/images/ico/apple-touch-icon-57-precomposed.png">
</head><!--/head-->

<body>
	<?php
	include 'inc/header.php'; 
  include_once 'function.php';
	 ?>
  <!-- <?php
  if(isset($_SESSION["user_login"]) && $_SESSION["user_login"]=="yes" ) 
  {
    ?>
  <script type="text/javascript">
    window.location.href="order.php";
  </script>
 <?php }  
   ?> -->
  


	<?php
 
 if(isset($_POST['login']))
 {
 	$uemail = $_POST["u_email"];
 	$upass = $_POST["u_password"];
   
    $query= mysqli_query($conn,"select * from users where email ='$uemail' AND password = '$upass'");
    echo mysqli_error($conn);
    $row=mysqli_num_rows($query);
   if($row==1)
   {  
   	  $res=mysqli_fetch_array($query);

   	  $_SESSION["user_login"]="yes";
   	  $_SESSION["id"]=$res["id"];
   	  $_SESSION['USER_NAME']=$res['username'];
      $_SESSION["user"]=$uemail;

      // cart
  
  if(isset($_SESSION["mycart"]) && count($_SESSION["mycart"])>0)
  {
    foreach ($_SESSION['mycart'] as $keys=>$values)
    {
      manageUserCart($_SESSION['user'],$values['item_id'],$values['item_name'],$values['item_price'],$values['item_qty'],$keys);
    }
  }
  

     echo "<script>window.location.href = 'http://127.0.0.1/project2/index.php';</script>";
      die();
   }
   else
   {
     echo "<script>alert('please enter correct detail')</script>";
   }

 } 
  ?>
	<section id="form" style="margin: 50px;"><!--form-->
		<div class="container">
			<div class="row">
				<div class="col-sm-4 col-sm-offset-1">
					<div class="login-form"><!--login form-->
						<h2>Login to your account</h2>
						<form action="#" method="post" id="login_form">
						<input type="email"  name="u_email" id="u_email" placeholder="Email Address" />
						<input type="password" name="u_password" id="u_password" placeholder="Password" />
						<span>
						<input type="checkbox" class="checkbox"> 
						Keep me signed in
						</span>
						<button type="submit" id="login_btn" name="login" class="btn btn-default">Login</button>
						</form>
						</div><!--/login form-->
				</div>
				<div class="col-sm-1">
					<h2 class="or">OR</h2>
				</div>
				<div class="col-sm-4">
					<div class="signup-form"><!--sign up form-->
						<h2>New User Signup!</h2>
						<form action="#" method="POST" id="contact_form">
							<input type="text" name="username" id="name" placeholder="Name"/>
							<span class="" id=""></span>
							<input type="email" name="useremail" id="email" placeholder="Email Address"/>
							<input type="password" name="userpass" id="password" placeholder="Password"/>
							<input type="text" name="usermobile" id="mobile" required pattern="[6-9]{1}[0-9]{9}" placeholder="Mobile No"/>
							<input type="text" name="useradd" id="address" placeholder="Address"/>
             <select name="city" placeholder="city">
                    <option >city</option>
                    <option value="indore">Indore</option>
                    <option value="jabalpur">Jabalpur</option>
                    <option value="bhopal">Bhopal</option>
                    <option value="gwalior">Gwalior</option>
              </select>
              <br>
            <br>
              <input type="text" name="code" id="code" placeholder="pincode*"/>
							<button type="submit" class="btn btn-default">Signup</button>

						</form>
						
					</div><!--/sign up form-->
				</div>
			</div>
		</div>
	</section><!--/form-->
	
	<?php 
include 'inc/footer.php';
 ?>
  
    <script src="assets/js/jquery.js"></script>
	<script src="assets/js/price-range.js"></script>
    <script src="assets/js/jquery.scrollUp.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/jquery.prettyPhoto.js"></script>
    <script src="assets/js/main.js"></script>

  <script type="text/javascript">
  



   $("#contact_form").on("submit",function(){
    // alert("add");
    $.ajax({
    url:'register.php',
    type:'POST',
    data:$("#contact_form").serialize(),
    success:function(result){
       alert(result);
    }
    });


  
   });



// login///////////////////







  </script>
</body>
</html>