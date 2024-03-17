<?php
session_start();
include 'db.php'; 
include_once 'function.php';
?>
 <?php
// echo '<pre>';
// print_r($_POST);
// echo '</pre>';

if(isset($_POST['qty']) && isset($_POST['name']) && isset($_POST['price']) && isset($_POST['image']))
{
echo  $qty= $_POST['qty'];
echo  $id=$_POST['id'];
echo  $cart_name=$_POST['name'];
echo  $price=$_POST['price'];
echo  $image= $_POST['image'];
$product=array('item_qty'=>$_POST['qty'],'item_id'=>$_POST['id'],'item_name'=>$_POST['name'],'item_price'=>$_POST['price'],'item_image'=>$_POST['image']);


if(isset($_SESSION["user"]))
{
$uemail=$_SESSION["user"];
$add=mysqli_query($conn,"insert into cart (user_email,pid,pname,price,qty) values ('$uemail','$id','$cart_name','$price','$qty')");
echo mysqli_error($conn);

print_r($add);
print_r($_SESSION["user"]);


// manageUserCart($uemail,$cart_name,$price,$qty);


}
else
{
if(isset($_SESSION["mycart"]))
{
$item_array_id = array_column($_SESSION["mycart"],'item_id');
if(in_array($_POST['id'], $item_array_id))
{
	echo '<script>alert("Item Already Added")</script>';

}
else
{

$count = count($_SESSION["mycart"]);
$_SESSION["mycart"][$count] = $product;
print_r($_SESSION["mycart"]);
}
}
else
{
$_SESSION["mycart"][0]=$product;
}	

}
   

 









    

}

 
 






  	 
  	
 
   ?>


