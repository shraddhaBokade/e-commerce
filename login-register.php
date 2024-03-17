<?php
include 'db.php'; 
 ?>

 <?php
if(isset($_POST['email']) && isset($_POST['password']))
{
	

$email=$_POST['email'];
$password=$_POST['password'];


$check_user=mysqli_num_rows(mysqli_query($conn,"select * from users where email='$email' AND password='$password'"));
 if($check_user>0)
 {
 	echo "wrong";
 }
 else
 {
 	
 	echo "right";
 }
echo mysqli_error($conn);

}


  ?>