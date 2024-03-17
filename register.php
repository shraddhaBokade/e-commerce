<?php
include 'db.php'; 
 ?>

 <?php
$name=$_POST['username'];
$email=$_POST['useremail'];
$password=$_POST['userpass'];
$mobile=$_POST['usermobile'];
$address=$_POST['useradd'];
$city=$_POST['city'];
$code=$_POST['code'];
// $added_on=date('Y-m-d h:i:s');
$check_user=mysqli_num_rows(mysqli_query($conn,"select * from users where email='$email'"));
 if($check_user>0)
 {
 	echo "email_present";
 }
 else
 {
 	mysqli_query($conn,"insert into users(username,email,password,mobile,address,city,pincode) values('$name','$email','$password','$mobile','$address','$city','$code')");
 	echo "insert";
 }
echo mysqli_error($conn);




  ?>