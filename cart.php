
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Cart | E-Shopper</title>
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

	<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="index.php">Home</a></li>
				  <li class="active"><a href="editcart.php">Empty-Cart</a></li>
				</ol>
			</div>
			<?php
			
			include 'db.php'; 
			 ?>
			<div class="table-responsive cart_info">
				<table class="table table-condensed">

					<thead>
						<tr class="cart_menu">
							<td class="image">sn</td>
							<td class="description">Item</td>
							<td class="description">id</td>
							<td class="price">Name</td>
							<td class="quantity">Price</td>
							<td class="quantity">Quantity</td>
							<td class="total">Total</td>
							<td class="total">Edit</td>
							<td class="total">Remove</td>
						</tr>
					</thead>
					<tbody>

						<?php
						if(!isset($_SESSION["user"]))
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
                        echo "<td>".$values["item_id"]."</td>";
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
                        echo "<tr>";
                        echo "<td colspan='5' style='text-align:right;font-size:28px;'>Total Price:-</td>";
                        echo "<td colspan='1' style='font-size:28px;'>".$total."</td>";
                        echo "</tr>";
						}

						else
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
                        <td><?php echo $row["user_email"]; ?></td>
                        <td class="cart_description"><h4><a href=""><?php echo $row["pname"]; ?></a></h4></td>
                        <td><?php echo  $row["price"]; ?></td>
                        <td><?php  echo $row["qty"]; ?></td>
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
						echo "<tr>";
                        echo "<td colspan='5' style='text-align:right;font-size:28px;'>Total Price:-</td>";
                        echo "<td colspan='1' style='font-size:28px;'>".$total."</td>";
                        echo "</tr>";
						}
                        
						 ?>
                      
						
							
						
					</tbody>
				</table>
				
			</div>
		</div>
	</section> <!--/#cart_items-->
<?php 
if(isset($_GET["action"]))
{
if($_GET["action"] == "delete")
{
foreach($_SESSION["mycart"] as $keys => $values)
{
if($values["item_id"] == $_GET["id"])
{
unset($_SESSION["mycart"][$keys]);
echo '<script>alert("Item Removed")</script>';
echo '<script>window.location="cart.php"</script>';
}
}
}
}
 ?>


 <?php 
 if(isset($_GET["type"]))
 {
 	if($_GET["type"] == "delete")
 	{
      $id=$_GET['id'];
     $delete_cart= "delete from cart where sn = '$id'";
     mysqli_query($conn,$delete_cart);
     echo '<script>alert("Item Removed")</script>';
     echo '<script>window.location="cart.php"</script>';
 	}
 }
  ?>
	<section id="do_action">
		<div class="container">
			<div class="heading">
				<h3>What would you like to do next?</h3>
				<p>Choose if you have a discount code or reward points you want to use or would like to estimate your delivery cost.</p>
			</div>
			<div class="row">
				<div class="col-sm-6">
					<div class="chose_area">
						<ul class="user_option">
							<li>
								<input type="checkbox">
								<label>Use Coupon Code</label>
							</li>
							<li>
								<input type="checkbox">
								<label>Use Gift Voucher</label>
							</li>
							<li>
								<input type="checkbox">
								<label>Estimate Shipping & Taxes</label>
							</li>
						</ul>
						<ul class="user_info">
							<li class="single_field">
								<label>Country:</label>
								<select>
									<option>United States</option>
									<option>Bangladesh</option>
									<option>UK</option>
									<option>India</option>
									<option>Pakistan</option>
									<option>Ucrane</option>
									<option>Canada</option>
									<option>Dubai</option>
								</select>
								
							</li>
							<li class="single_field">
								<label>Region / State:</label>
								<select>
									<option>Select</option>
									<option>Dhaka</option>
									<option>London</option>
									<option>Dillih</option>
									<option>Lahore</option>
									<option>Alaska</option>
									<option>Canada</option>
									<option>Dubai</option>
								</select>
							
							</li>
							<li class="single_field zip-field">
								<label>Zip Code:</label>
								<input type="text">
							</li>
						</ul>
						<a class="btn btn-default update" href="">Get Quotes</a>
						<a class="btn btn-default check_out" href="">Continue</a>
					</div>
				</div>
				<div class="col-sm-6">
					<div class="total_area">
						<ul>
							
							<li>Eco Tax <span>No tax applied</span></li>
							<li>Shipping Cost <span>Free</span></li>
							<li style="font-size: 26px;color: black">Total:<span ><?php echo $total  ?></span></li>
						</ul>
							<a class="btn btn-default update" href="">Update</a>
							<a class="btn btn-default check_out" href="checkout2.php">Check Out</a>
					</div>
				</div>
			</div>
		</div>
	</section><!--/#do_action-->

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