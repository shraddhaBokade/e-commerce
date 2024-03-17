<?php
session_start(); 
include 'db.php';
include_once 'function.php';

 

 ?>

<header id="header"><!--header-->
		<div class="header_top"><!--header_top-->
			<div class="container">
				<div class="row">
					<div class="col-sm-6">
						<div class="contactinfo">
							<ul class="nav nav-pills">
								<li><a href="#"><i class="fa fa-phone"></i> +2 95 01 88 821</a></li>
								<li><a href="#"><i class="fa fa-envelope"></i> info@domain.com</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="social-icons pull-right">
							<ul class="nav navbar-nav">
								<li><a href="#"><i class="fa fa-facebook"></i></a></li>
								<li><a href="#"><i class="fa fa-twitter"></i></a></li>
								<li><a href="#"><i class="fa fa-linkedin"></i></a></li>
								<li><a href="#"><i class="fa fa-dribbble"></i></a></li>
								<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header_top-->
		
		<div class="header-middle"><!--header-middle-->
			<div class="container">
				<div class="row">
					<div class="col-sm-3">
						
						<div class="logo pull-left">
							<a href="index.php"><img src="assets/images/home/logo.png" alt="" /></a>
							<span style="font-size: 25px;" >&nbsp &nbsp
							<?php
							if(isset($_SESSION["USER_NAME"]))
							{
							echo $_SESSION['USER_NAME']	;
							}
							 
							 ?></span>
						</div>
						
					</div>
					<div class="col-sm-9">
						<div class="shop-menu pull-right">
							<ul class="nav navbar-nav">
								<li><a href="index.php"><i class="fa fa-home"></i>Home</a></li>
								<li><a href="shop.php"><i class="fa fa-book"></i>Shop</a></li>
								<li><a href="product.php"><i class="fa fa-heart"></i> Wishlist</a></li>
								<li><a href="order.php"><i class="fa fa-crosshairs"></i>Myorder</a></li>
								<?php
								$count="0";
								if(isset($_SESSION["mycart"]))
								{
								$count=count($_SESSION["mycart"]);
								} 
								 ?>
								<li><a href="cart.php"><i class="fa fa-shopping-cart"></i> Cart(<?php echo $count; ?>)</a></li>

							    <li class="dropdown">
                                <a class="dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                                <i class="fa fa-user"></i>
                                 Profile
                                </a>
                                <?php
								if(isset($_SESSION["user"]))
								{
							    echo "<div class='dropdown-menu' style='margin-top: 12px;text-align: center;'>
                                      <a class='dropdown-item' href='user_logout.php'>Logout</a>
                                      </div>";
								}
								else
								{
								 echo "<div class='dropdown-menu' style='margin-top: 12px;text-align: center;'>
                                <a class='dropdown-item' href='login.php'>Login</a>/
                                <a class='dropdown-item' href='login.php'>Register</a>
                              
                                </div>";	
								} 
								?>
                                
                                </li>
								<li><a href="contact-us.php"><i class="fa fa-envelope"></i>Contact</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-middle-->
	
		<div class="header-bottom"><!--header-bottom-->
			<div class="container">
				<div class="row">
					<div class="col-sm-9">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>
						<div class="mainmenu pull-left">
							
							<?php
                           $get_cats= "select * from category where status = '1' order by cat_name asc";
	                       $run_cats= mysqli_query($conn,$get_cats);
	                       while($row_cats=mysqli_fetch_array($run_cats))
	                       {
		                   $cat_id=$row_cats['cat_id'];
		                   $cat_name=$row_cats['cat_name'];

		                 
	                      
						   ?>
							<ul class="nav navbar-nav collapse navbar-collapse">
								
								
								<li class="dropdown"><a href="product.php?pro=<?php echo $cat_id ?>" style="font-size: 17px;font-family: sans-serif;"><?php echo $cat_name ?><i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
                                    	<?php
                                    	
                                    	$get_subcats= "select * from subcategory where cat_id='$cat_id'";
	                                    $run_subcats= mysqli_query($conn,$get_subcats);
	                                    while($row_subcats=mysqli_fetch_array($run_subcats))
	                                   {
		                                $sub_id=$row_subcats['sub_id'];
		                                $cat_id=$row_subcats['cat_id'];
                                        $sub_name=$row_subcats['sub_name'];

		                               
	                                   
                                    	 ?>
                                        <li><a href="subproduct.php?pid=<?php echo $sub_id ?>"><?php echo $sub_name ?></a></li>
										 <?php
                                     }?>
                                    </ul>
                                   
                                </li> 
								
								
							</ul>
						 <?php }
						 ?>
						</div>
					
					</div>
					<div class="col-sm-3">
						      
							<form method="POST" action="search.php">
							<input type="text" name="search" placeholder="Search"/>
							<input type="submit" name="search_btn">
							</form>
						
					</div>
				</div>
			</div>
		</div><!--/header-bottom-->
	</header><!--/header-->
	