<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Checkout | E-Shopper</title>
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
	include 'db.php'; 
	 ?>
	 <?php

	  ?>
	 <!-- <?php
	 if(!isset($_SESSION['mycart'][0]))
   {
         
	?>
	<script>window.location.href="index.php"</script>
  
  <?php  } 
	  ?>
 -->

	 
	<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="#">Home</a></li>
				  <li class="active">Check out</li>
				</ol>
			</div><!--/breadcrums-->

			

			<!-- ///////////////////////////////////////// -->
			<div class="review-payment">
				<h2>YOUR ORDER</h2>
			</div>

			<div class="table-responsive cart_info">
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="image">sn</td>
							<td class="image">Item</td>
							<td class="description">Name</td>
							<td class="price">Price</td>
							<td class="quantity">Quantity</td>
							<td class="total">Total</td>
							<td class="total">Edit</td>
							<td class="total">remove</td>
							<td></td>
						</tr>
					</thead>
					<tbody>
						<?php
						if(isset($_SESSION['user']))
						{
						$total=0;
						$sno="1";
                        $p='0';
                        $q='0';
						$uid=$_SESSION['user'];
		                $res=mysqli_query($conn,"select cart.sn,cart.user_email,cart.pname,cart.price,cart.qty,product.image FROM cart INNER JOIN product  ON cart.pname=product.name where user_email='$uid'");
		                 echo mysqli_error($conn);
		                while($row=mysqli_fetch_assoc($res))
		                {
		                ?>
		                <tr>
                        <td><?php echo $sno++?></td>
                        <td><img src="admindashboard/media/<?php echo $row["image"] ?>" height="30" width="50"></td>
                     
                        <td class="cart_description"><h4><a href=""><?php echo $row["pname"]; ?></a></h4></td>
                        <td><?php echo  $row["price"]; ?></td>
                        <td><input type="number" class="text-center" value="<?php  echo $row["qty"]; ?>" name="qty" min="1" max="10" /></td>
                        <?php
                        $bill= $row["price"]*$row["qty"];
                        $total=$total+$bill;
                        ?>
                        <td><?php echo $bill ?></td>
                        <td><a href="cart.php?type=delete&id=<?php echo $row['sn']?>"><i class='fa fa-times'></i></a></td>
                        <td><input type='submit' name='event' class='btn btn-warning' value='Edit'></td>
                        </tr>

		               <?php 
		               }
		
						}
 // session
						else
						{
                         $total=0; 
                        if(isset($_SESSION["mycart"]))
                        {
                         $sno="1";
                         $p='0';
                         $q='0';
                         foreach ($_SESSION['mycart'] as $keys => $values)
                        {
                        	// print_r($value);
                        echo "<tr>";
                        echo "<td>".$sno++."</td>";
                        echo "<td><img src='admindashboard/media/".$values["item_image"]."'' width='30' height='50'/></td>";
                        // echo "<td>".$values["item_id"]."</td>";
                        echo "<td class='cart_description'>".$values["item_name"]."</td>";
                        echo "<td>".$values["item_price"]."</td>";
                        $p=$values["item_price"];
                        echo "<td>".$values["item_qty"]."</td>";
                        $q=$values["item_qty"];
                        $bill=$p*$q;
                        $total=$total+$bill;
                        echo "<td>".$bill."</td>";
                                
                         echo "<td><input type='submit' name='event' class='btn btn-warning' value='Edit'></td>";
                         echo "<td><a href='cart.php?action=delete&id=".$values["item_id"]."'><i class='fa fa-times'></i></a></td>";
                         echo "</tr>";	
                        	   
                               
                         }
                       
                        }
                       
						}
						?>
						

						
						<!-- ///////////////////////////////////// -->
						<tr>
							<td colspan="4">&nbsp;</td>
							<td colspan="2">
								<table class="table table-condensed total-result">
									<tr>
										<td>Cart Sub Total</td>
										<td><?php echo $bill ?></td>
									</tr>
									<tr>
										<td>Exo Tax</td>
										<td>Free</td>
									</tr>
									<tr class="shipping-cost">
										<td>Shipping Cost</td>
										<td>Free</td>										
									</tr>
									<tr>
										<td>Total</td>
										<td><span><h1><?php echo $total ?>Rs</h1></span></td>
									</tr>
								</table>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
		
<?php
if(!isset($_SESSION['user']))
{
?>

	<div class="review-payment">
				<h2>Review & Payment</h2>
			</div>
			<div class="step-one">
				<h2 class="heading">Step1</h2>
			</div>
			
				
			<div class="checkout-options">
				<h3>New User</h3>
				<p>Checkout options</p>
				<ul class="nav">
					<li>
						<label><input type="checkbox" id='reg'> Register Account</label>
					</li>
					
				</ul>
			</div><!--/checkout-options-->

			<div class="register-req">
				<p>Please use Register And Checkout to easily get access to your order history, or use Checkout as Guest</p>
			</div><!--/register-req-->
            <div class="shopper-informations">
				<div class="row">
					
					<div class="col-lg-12 ">
						<div class="bill-to">
							<p>Bill To</p>
							 <?php
	                         if(isset($_POST["submit"]))
	                         {
	                     	echo $username=$_POST["username"];
	                     	echo $email=$_POST["email"];
	                     	echo $password=$_POST["password"];
	                     	echo $mobile=$_POST["mobile"];
	   	                    echo $address=$_POST["address"];
                            echo $city=$_POST["city"];
                            echo $code=$_POST["code"];
                            echo $payment=$_POST["pay"];
                            echo $total_price=$total;
                            echo $payment_status='success';	
                            echo $order_status='1';
                            $added_on=date('d-m-y h:i:s');


                           $int= mysqli_query($conn,"insert into myorder(username,user_email,address,city,pincode,payment_type,total_price,pay_status,order_status,addon) values ('$username','$email','$address','$city','$code','$payment','$total_price','$payment_status','$order_status','$added_on')");
                            echo mysqli_error($conn);
                            if($int)
                            {
                            mysqli_query($conn,"insert into users(username,email,password,mobile,address,city,pincode) values('$username','$email','$password','$mobile','$address','$city','$code')");
                            }
                            
                            $order_id=mysqli_insert_id($conn);
                            foreach ($_SESSION['mycart'] as $key => $val)
                            {
                            	echo $proid=$val["item_id"];
                            	echo $pname=$val["item_name"];
                            	
                            	echo $qty= $val["item_qty"];
                            	echo $price=$val["item_price"];
                            	 mysqli_query($conn,"insert into orderdetail (order_id,pid,pname,qty,price) values('$order_id','$proid','$pname','$qty','$price')");
                            }
                            unset($_SESSION["mycart"]);
                            echo "<script>window.location.href='index.php';</script>";
                            }
	                        ?>

                            

							<div class="form-two">
								<form method="POST">
									<input type="text" name="username" placeholder="username">
									<input type="email" name="email" placeholder="email">
								    <input type="password" name="password" placeholder="password">
								    <input type="text" name="mobile" id="mobile" required pattern="[6-9]{1}[0-9]{9}" placeholder="Mobile No"/>
								    <input type="text" name="code" placeholder="Zip / Postal Code *">
									<input type="text" name="address" placeholder="Address">
									<select name="city">
										<option>City</option>
										<option value="indore">Indore</option>
										<option value="jabalpur">Jabalpur</option>
										<option value="bhopal">Bhopal</option>
										<option value="gwalior">Gwalior</option>
									</select>
									
									<br>
									<br>
									<br>
					<div class="payment-options">
					<span>
					<input type="radio" name="pay" value="cod">COD
					&nbsp
				    <input type="radio" name="pay" value="netbanking">Net-Banking
				    <br>
				    <br>
                    <input type="submit" class="btn btn-warning" value="Order-Place" name="submit" style="height: 40px;width: 150px;margin: 0;padding: 0;">
					</span>
					<br>
					</div>	
                    </form>
					</div>
					</div>
					</div>
									
				</div>


<?php

} 

else
{
$uid=$_SESSION['user'];
$res=mysqli_query($conn,"select * from users where email ='$uid'");
$row=mysqli_fetch_array($res); 
if(isset($_POST["continue"]))
{
echo $username=$_POST["username"];
echo $email=$_POST["email"];
echo $address=$_POST["address"];
echo $city=$_POST["city"];
echo $code=$_POST["code"];
echo $payment=$_POST["pay"];
echo $total_price=$total;
echo $payment_status='success';	
echo $order_status='1';
$added_on=date('d-m-y h:i:s');
$insert=mysqli_query($conn,"insert into myorder(username,user_email,address,city,pincode,payment_type,total_price,pay_status,order_status,addon) values ('$username','$email','$address','$city','$code','$payment','$total_price','$payment_status','$order_status','$added_on')");
echo mysqli_error($conn);
 $order_id=mysqli_insert_id($conn);
$res=mysqli_query($conn,"select * from cart where user_email='$uid'");                            
while($row=mysqli_fetch_assoc($res))
{
	

$pid=$row["pid"];
$pname=$row["pname"];
$qty= $row["qty"];
$price=$row["price"];
mysqli_query($conn,"insert into orderdetail (order_id,pid,pname,qty,price) values('$order_id','$pid','$pname','$qty','$price')");
                         
}
if($insert)
{
	$del=mysqli_query($conn,"delete from cart where user_email='$uid'");
	unset($_SESSION["mycart"]);
}
echo "<script>window.location.href='index.php';</script>";
}
?>
<div class="form-two">
<form method="POST">
<input type="hidden" name="username" placeholder="username" value="<?php echo $row["username"]?>">
<input type="hidden" name="email" placeholder="email" value="<?php echo $row["email"]?>">
<input type="hidden" name="address" placeholder="Address" value="<?php echo $row["address"]?>">
<input type="hidden" name="city" placeholder="Address" value="<?php echo $row["city"]?>">
<input type="hidden" name="code" placeholder="Zip / Postal Code *" value="<?php echo $row["pincode"]?>">
<br>
<br>
<br>
<div class="payment-options">
<span>
<input type="radio" name="pay" value="cod">COD
&nbsp
<input type="radio" name="pay" value="netbanking">Net-Banking
<br>
<br>
<input type="submit" class="btn btn-warning" value="Order-Place" name="continue" style="height: 40px;width: 150px;margin: 0;padding: 0;">
</span>
<br>
</div>	
</form>
</div> 
<?php
}	
?>
</div>
</div>

		<!-- ////// -->
</section> <!--/#cart_items-->

	
<?php 
include 'inc/footer.php';
 ?>
    <script src="assets/js/jquery.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/jquery.scrollUp.min.js"></script>
    <script src="assets/js/jquery.prettyPhoto.js"></script>
    <script src="assets/js/main.js"></script>
</body>
</html>