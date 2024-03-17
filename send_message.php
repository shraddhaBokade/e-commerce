<?php
include 'db.php';

$name=$_POST['name'];
$email=$_POST['email'];
$comment=$_POST['message'];
$added_on=date('Y-m-d h:i:s');
mysqli_query($conn,"insert into contact(name,email,comment,add_on) values('$name','$email','$comment','$added_on')");
mysqli_error($conn);
?>