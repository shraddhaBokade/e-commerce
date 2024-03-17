<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Shop | E-Shopper</title>
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
	 <?php
	 include 'db.php'; 
	 // include 'function.php';
	  ?>
	<section id="advertisement">
		<div class="container">
			<img src="assets/images/shop/advertisement.jpg" alt="" />
		</div>
	</section>
	
	<section>
		<div class="container">
			<div class="row">
	 
		<?php
				include 'inc/sidebar.php'; 
				include_once 'function.php';
				 ?>
				
				<div class="col-sm-9 padding-right">
					<div class="features_items"><!--features_items-->
						<h2 class="title text-center">Features Items</h2>
		                <?php   
	                    if(isset($_GET["pro"]))
                        {
      	                $cat=$_GET["pro"];

      	                
      	                // $sub=$_GET["pid"];
                        $get_pro= "select * from product where cat_id='$cat'";
	                    $run_pro=  mysqli_query($conn,$get_pro);
	                    while($row=mysqli_fetch_array($run_pro))
	                    {   
		                $image=$row["image"];
	                    $id=$row["id"];
		                $name=$row["name"];
		                $price=$row["price"];
		                $description=$row["description"];
		
	

		?>
						<div class="col-sm-4">
		
							<div class="product-image-wrapper">
								<div class="single-products">
									<div class="productinfo text-center">
										<a href="product-details.php?product=<?php echo $row["id"]?>"><img src="admindashboard/media/<?php echo $image ?>"width="80" height="250"/></a>
										<h3><?php echo  $name ?></h3>
										<h2><?php echo  $price ?></h2>
										<p><?php echo  $description ?></p>
										<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
									</div>
									
								</div>

								<div class="choose">
									<ul class="nav nav-pills nav-justified">
										<li><a href=""><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
										<li><a href=""><i class="fa fa-plus-square"></i>Add to compare</a></li>
									</ul>
								</div>

							</div>

						</div>
                       
                         <?php
						}
						} 
						 ?>
						
					
						
						
						
					
						
					
						
					
						
						
						
						
					</div><!--features_items-->
                     
					
				</div>

			</div>
		</div>
	</section>
	
	<?php 
include 'inc/footer.php';
 ?>
  
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/custom.js"></script>
	<script src="assets/js/price-range.js"></script>
    <script src="assets/js/jquery.scrollUp.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/jquery.prettyPhoto.js"></script>
    <script src="assets/js/main.js"></script>
    
   
</body>
</html>