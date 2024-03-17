<?php

// getting the gategory
function getcats()
{
	global $conn;
	$get_cats= "select * from category order by cat_name asc";
	$run_cats= mysqli_query($conn,$get_cats);
	while($row_cats=mysqli_fetch_array($run_cats))
	{
		$cat_id=$row_cats['cat_id'];
		$cat_name=$row_cats['cat_name'];

		// echo "<li><a href='?category=".$cat_id."'>$cat_name</a></li>";
	}
}

function getsubcats()
{
	global $conn;
	$get_subcats= "select * from subcategory";
	$run_subcats= mysqli_query($conn,$get_subcats);
	while($row_subcats=mysqli_fetch_array($run_subcats))
	{
		$sub_id=$row_subcats['sub_id'];
		$sub_name=$row_subcats['sub_name'];

		echo "<li><a href='#'>$sub_name</a></li>";
	}
}


function get_product()
{
	global $conn;
	$get_pro= "select * from product order by name asc";
	$run_pro=  mysqli_query($conn,$get_pro);
	while($row=mysqli_fetch_array($run_pro))
	{   
		$image=$row["image"];
		$id=$row["id"];
		$name=$row["name"];
		$price=$row["price"];
		$description=$row["description"];
		
	}	
		
	}

    
   function getuser()
{
   global $conn;
   $uid=$_SESSION["id"];
   $res=mysqli_query($conn,"select * from users where id ='$uid'");
   $row=mysqli_fetch_array($res);

   $uname=$row["username"];
   echo "<pre>";
   print_r($row);
}


	function usercart()
	{
		global $conn;
		$arr=array();
		$uid=$_SESSION['user'];
		$res=mysqli_query($conn,"select * from cart where user_email='$uid'");
		while($row=mysqli_fetch_assoc($res))
		{
			$arr[]=$row;
		}
		return $arr;
	}

function removecart()
{
if(isset($_SESSION["user"]))
{
 	$uid=$_SESSION["user"];
 	$del=mysqli_query($conn,"delete from cart where user_email='$uid'");
}
else
 {
 	unset($_SESSION["mycart"]);
 }
 header("location:index.php");
	}

	
    function manageUserCart($uemail,$id,$cart_name,$price,$qty)
	{
   global $conn;
   $uemail=$_SESSION["user"];
   mysqli_query($conn,"insert into cart (user_email,pid,pname,price,qty) values ('$uemail','$id','$cart_name','$price','$qty')");
   echo mysqli_error($conn);

	}



function cart()
{
if(isset($_SESSION['user']))
{

	$getuser=usercart();
	print_r($getuser);
  
}
else
{   

	print_r($_SESSION["mycart"]);
}
}




 ?>

