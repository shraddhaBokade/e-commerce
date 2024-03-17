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
											<!-- <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a> -->
										</div>
										
									
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
						
					