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
	 ?>
	<section class="container">
		<table class="table">
			<thead>
				<th>ORDER-ID</th>
				<th>ORDER-Date</th>
				<th>Address</th>
				<th>price</th>
				<th>Payment-type</th>
				<th>Order-status</th>

			</thead>
			<tbody>
				<?php
				if(isset($_SESSION["user"]))
				{
					$uid=$_SESSION["user"];
				$res=mysqli_query($conn,"select * from myorder where user_email='$uid'");
				while($row=mysqli_fetch_array($res))
				{
			    ?>
			    <form method="POST">
                <tr>
				<td class="cart_price">
				<p><a href="orderdetail.php?myid='<?php echo $row["id"]?>'">View-Detail</a></p>
				</td>
				<td class="cart_price">
				<p><?php echo $row["addon"]?></p>
				</td>
				<td class="cart_price">
				<p><?php echo $row["address"]?>/
				<?php echo $row["city"]?>/<?php echo $row["pincode"]?>
				</p>
				</td>
				<td class="cart_price">
				<p><?php echo $row["total_price"]?></p>
				</td>
				<td class="cart_price">
				<p><?php echo $row["payment_type"]?></p>
				</td>
				<td class="cart_price">
				<p><?php echo $row["order_status"]?></p>
				</td>
				</tr>
				</form>
				</tbody>
			<?php
			}
				} 
				else
				{

					
				}	
				 ?>
				
		</table>
	</section>
	
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