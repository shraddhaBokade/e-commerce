<<?php
include 'db.php'; 
 ?>
<select  name="subcategory">
<option>select categories</option>
 <?php
 if(isset($_POST["uid"]))
 {
 	$id=$_POST["uid"];

 	$query=mysqli_query($conn,"select sub_id,sub_name from subcategory where cat_id ='$id'");
 	while($row=mysqli_fetch_array($query))
 	{   

 		echo "<option value=".$row["sub_id"].">".$row['sub_name']."</option>";
 	}
 } 
 ?>   
 </select>
