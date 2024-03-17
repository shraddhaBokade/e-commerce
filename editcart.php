<?php
session_start();
include 'db.php';



 

if(isset($_SESSION["user"]))

{ 
	$uid=$_SESSION["user"];
	$del=mysqli_query($conn,"delete from cart where user_email='$uid'");
	echo mysqli_error($conn);
}
else
{
	unset($_SESSION['mycart']);
}
echo '<script>window.location.href="cart.php";</script>';

?>



