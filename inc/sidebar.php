
<div class="col-sm-3">
					<div class="left-sidebar">
						<div class="price-range"><!--price-range-->
							<h2>Price Range</h2>
							<div class="well">
								 <input type="text" class="span2" value="" data-slider-min="0" data-slider-max="600" data-slider-step="5" data-slider-value="[250,450]" id="sl2" ><br />
								 <b>$ 0</b> <b class="pull-right">$ 600</b>
							</div>
						</div><!--/price-range-->


                         	<div class="price-range"><!--Select-Price-->
							<h2>Price Range</h2>
							<div class="well">
							<select onchange="price_drop('<?php echo $sub_id ?>')" id="price">
								<option value="">Price</option>
								<option value="High">Under 500</option>
								<option value="Low">Under 1000</option>
								<option value="New">Under 3000</option>
								<option value="Old">Above 5000</option>
							</select>	
							</div>
						</div><!--/Select-Price-->
                         
						<h2>Category</h2>

						<div class="brands_products"><!--Category_products-->


							<?php
                            if(isset($_GET["pro"]))
                            {
                            	 $cat=$_GET["pro"];
                            
							$get_subcats= "select * from subcategory where cat_id='$cat'";
	                        $run_subcats= mysqli_query($conn,$get_subcats);
	                        while($row_subcats=mysqli_fetch_array($run_subcats))
	                        {
	                        $cat_id=$row_subcats['cat_id'];
		                    $sub_id=$row_subcats['sub_id'];
		                    $sub_name=$row_subcats['sub_name'];

		                  
	                      
							 ?>
							<div class="brands-name">
							<ul class="nav nav-pills nav-stacked">
							<li><a href=""><span class="pull-right"><input type="checkbox" name="check"  id="check"></span><?php echo $sub_name ?></a></li>

							</ul>
							</div>
							<?php
							}
							}
							 
							?>
						</div><!--/Category_products-->
					
						
						
					
						
						<div class="shipping text-center"><!--shipping-->
							<img src="assets/images/home/shipping.jpg" alt="" />
						</div><!--/shipping-->
						
					</div>
				</div>

