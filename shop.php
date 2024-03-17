<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Home | E-Shopper</title>
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
    <link rel="shortcut icon" href="images/ico/favicon.ico">
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
	include_once 'function.php'; 
	  ?>
	
				
	
	<section>
		<div class="container">
			<div class="row">
				
				<?php
				include 'inc/sidebar.php'; 
				 ?>
				<div class="col-sm-9 padding-right ">
					<div class="features_items pt-5"><!--features_items-->
						
						<?php
							if(isset($_GET["sort"]))
                       	{
                       		$sort= $_GET["sort"];

                       if($sort=="High")
                       {
                           $sort_order=mysqli_query($conn,"SELECT * FROM Product WHERE Price BETWEEN 150 AND 500 order by price asc");
                       }
                        if($sort=="Low")
                       {
                           $sort_order=mysqli_query($conn,"SELECT * FROM Product WHERE Price BETWEEN 150 AND 1000 order by price asc");
                       }
                        if($sort=="New")
                       {
                           $sort_order=mysqli_query($conn,"SELECT * FROM Product WHERE Price BETWEEN 150 AND 3000 order by price asc");
                       }
                        if($sort=="Old")
                       {
                           $sort_order=mysqli_query($conn,"SELECT * FROM Product WHERE Price BETWEEN 10000 AND 50000 order by price asc");
                       }
                      
						
						
						while($data=mysqli_fetch_array($sort_order))
                        {
                        	$image=$data["image"];
                        	$name=$data["name"];
                        	$description=$data["description"];
                        	$price=$data["price"];

		                    
						
                        ?>
						
						<div class="col-sm-4">
							<div class="product-image-wrapper">
								<div class="single-products">
										<div class="productinfo text-center">
											
											<a href="product-details.php?product=<?php echo $data["id"]?>"><img src="admindashboard/media/<?php echo $data['image'] ?>"  width="100" height="200"/></a>
											<h2><?php echo $data["name"] ?></h2>
											<h3><?php echo $data["price"] ?></h3>
											<p><?php echo $data["description"] ?></p>
											<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
										</div>
										
									
								</div>
								<div class="choose">
									<ul class="nav nav-pills nav-justified">
										<li><a href="#"><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
										<li><a href="#"><i class="fa fa-plus-square"></i>Add to compare</a></li>
									</ul>
								</div>
							</div>
						</div>
					<?php
					} 
					 }
					else
					{?>
					<section>
		<div class="container">
			<div class="row">
				
			

				<div class="col-sm-9 padding-right">
					<div class="features_items"><!--features_items-->
						<h2 class="title text-center">Features Items</h2>
						<?php
						$limit=6;
						if(isset($_GET['page']))
	                    {
                        $page=$_GET['page'];
	                    }
	                    else
	                    {
                        $page=1;
	                    }
	                    $offset=($page-1)*$limit;
						$qry=mysqli_query($conn,"select * from product order by name asc limit {$offset},{$limit}");
		               while($data=mysqli_fetch_array($qry))
		                {?> 
						
						<div class="col-sm-4">
							<div class="product-image-wrapper">
								<div class="single-products">
										<div class="productinfo text-center">
											
<a href="product-details.php?product=<?php echo $data["id"]?>"><img src="admindashboard/media/<?php echo $data['image'] ?>"  width="100" height="200"/></a>
<h2><?php echo $data["name"] ?></h2>
<h3><?php echo $data["price"] ?></h3>
<p><?php echo $data["description"] ?></p>
											<!-- <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a> --></div>
										
									
								</div>
								<div class="choose">
									<ul class="nav nav-pills nav-justified">
										<li><a href="#"><i class="fa fa-heart"></i>Add to wishlist</a></li>
										<!-- <li><a href="#"><i class="fa fa-plus-square"></i>Add to compare</a></li> -->
									</ul>
								</div>
							</div>
						</div>
					
					
						
						
					<?php
				    } 
					?>
					</div><!--features_items-->
				 <!-- pagination -->
						
						
						<?php
						$sql=mysqli_query($conn,"select * from product");
						if(mysqli_num_rows($sql)>0) 
						{
							$total=mysqli_num_rows($sql);
							
							$total_page=ceil($total/$limit);
							echo '<ul class="pagination">';
							if($page > 1){
                            
							echo '<li><a href="shop.php?page='.($page-1).'">Prev</a></li>';
							}
							
							for($i=1;$i<=$total_page;$i++)
							{
								if($i==$page)
								{
                                 $active="active";   
								}
								else
								{
                                 $active="";
								}
                             echo '<li class="'.$active.'"><a href="shop.php?page='.$i.'">'.$i.'</a></li>';
							}
							if($total_page>$page)
							{
								echo '<li><a href="shop.php?page='.($page+1).'">next</a></li>';
							}
							
							echo '</ul>';
						}	
						 ?>
			
			</div>
		</div>
	</section>	
				<?php	}	
					 ?>
			
					
					
						
						
					
				 <!-- pagination -->
						
						
						
					</div><!--features_items-->
					<!-- <ul class="pagination">
							<li class="active"><a href="">1</a></li>
							<li><a href="">2</a></li>
							<li><a href="">3</a></li>
							<li><a href="">&raquo;</a></li>
						</ul> -->
					
					<div class="recommended_items"><!--recommended_items-->
						<h2 class="title text-center">recommended items</h2>
						
						<div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
							<div class="carousel-inner">
								<div class="item active">	
									<div class="col-sm-4">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
													<img src="assets/images/home/recommend1.jpg" alt="" />
													<h2>$56</h2>
													<p>Easy Polo Black Edition</p>
													<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
												</div>
												
											</div>
										</div>
									</div>
									<div class="col-sm-4">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
													<img src="assets/images/home/recommend2.jpg" alt="" />
													<h2>$56</h2>
													<p>Easy Polo Black Edition</p>
													<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
												</div>
												
											</div>
										</div>
									</div>
									<div class="col-sm-4">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
													<img src="assets/images/home/recommend3.jpg" alt="" />
													<h2>$56</h2>
													<p>Easy Polo Black Edition</p>
													<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
												</div>
												
											</div>
										</div>
									</div>
								</div>
								<div class="item">	
									<div class="col-sm-4">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
													<img src="assets/images/home/recommend1.jpg" alt="" />
													<h2>$56</h2>
													<p>Easy Polo Black Edition</p>
													<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
												</div>
												
											</div>
										</div>
									</div>
									<div class="col-sm-4">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
													<img src="assets/images/home/recommend2.jpg" alt="" />
													<h2>$56</h2>
													<p>Easy Polo Black Edition</p>
													<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
												</div>
												
											</div>
										</div>
									</div>
									<div class="col-sm-4">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
													<img src="assets/images/home/recommend3.jpg" alt="" />
													<h2>$56</h2>
													<p>Easy Polo Black Edition</p>
													<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
												</div>
												
											</div>
										</div>
									</div>
								</div>
							</div>
							 <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
								<i class="fa fa-angle-left"></i>
							  </a>
							  <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
								<i class="fa fa-angle-right"></i>
							  </a>			
						</div>
					</div><!--/recommended_items-->
					
				</div>
			</div>
		</div>
	</section>
	
<?php 
include 'inc/footer.php';
 ?>
	

  
    <script src="assets/js/jquery.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
	<script src="assets/js/jquery.scrollUp.min.js"></script>
	<script src="assets/js/price-range.js"></script>
    <script src="assets/js/jquery.prettyPhoto.js"></script>
    <script src="assets/js/main.js"></script>
    <script type="text/javascript">
    	function price_drop(sub_id)
    	{
    		var price = $('#price').val();
    		window.location.href="http://127.0.0.1/project2/shop.php?id="+sub_id+"&sort="+price;
    	}
    </script>
</body>
</html>