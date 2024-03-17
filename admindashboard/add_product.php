<?php
 include 'db.php';
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Purple Admin</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="assets/images/favicon.png" />
  </head>
  <body>
    <!-- insert -->
    <?php
if(isset($_POST["add"]))
{  
echo $cname=$_POST["category"];
echo $sname=$_POST["subcategory"];
echo $pname=$_POST["product"];
echo $price=$_POST["price"];
echo $des=$_POST["description"];
echo $qty=$_POST["quantity"];
echo $filename=$_FILES["img"]["name"];
echo $filetname=$_FILES["img"]["tmp_name"];
move_uploaded_file($filetname,"media/".$filename);

$qry1=mysqli_query($conn,"select * from product where name= '$pname'");
$check=mysqli_num_rows($qry1);
if($check>0)
{
   echo "<script>alert('product already exist')</script>";
}
else
{
  $addpro=mysqli_query($conn,"insert into product (cat_id,sub_id,name,price,description,quantity,image,status)values('$cname','$sname','$pname','$price','$des','$qty','$filename','1')");
  echo mysqli_error($conn);
  header('location:product.php');
    die(); 

}
}
?>
    <div class="container-scroller">
      <!-- partial:partials/_navbar.html -->
      <?php include 'navbar.php'; ?>
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.html -->
       <?php
       include 'sidebar.php'; 
        ?>
        <!-- partial -->
        <div class="main-panel">
        <div class="content-wrapper">
        <div class="page-header">
        <h1 class="page-title">Cetegories</h1>
     
            </div>
            <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
            <div class="card-body">
            <h1 class="card-title">cetegories</h1>
            <form method="POST" enctype="multipart/form-data">
             <div class="form-group">
            <label for="category">Category</label>
            <select name="category" id="category" class="form-control" onchange="subcat(this.value)" required>
              <option value="">Select Category</option>

              <?php
               $res=mysqli_query($conn,"select cat_name,cat_id from category");
              while($row=mysqli_fetch_array($res)) 
              {
                 echo "<option value=".$row['cat_id'].">".$row['cat_name']."</option>";
              }  
               ?>
             
            </select>
            </div>
            <br>
             <div class="form-group">
            <label for="subcategory">Subcategory</label>
           <select id="subcategory" name="subcategory" class="form-control">
           <option>select subcategory</option>
           </select> 
            </div>
            <!--  -->
          
             <div class="form-group">
                  <label for="categories" class=" form-control-label">Product name</label>
                  <input type="text" name="product" placeholder="Enter product name" class="form-control" required>
                </div>
            <!--  -->
             <div class="form-group">
                  <label for="categories" class=" form-control-label">Product Price</label>
                  <input type="text" name="price" placeholder="Enter Price" class="form-control" required>
                </div>
            <!--  -->
             <div class="form-group">
                  <label for="categories" class=" form-control-label">Description</label>
                <textarea name="description" rows="4" cols="60" class="form-control" placeholder="Enter description"></textarea>

                </div>
            <!--  -->
             <div class="form-group">
                  <label for="categories" class=" form-control-label">Quantity</label>
                  <input type="text" name="quantity" placeholder="Enter quantity" class="form-control" required>
                </div>
            <!--  -->
             <div class="form-group">
                  <label for="categories" class=" form-control-label">Product image</label>
                  <input type="file" name="img" class="form-control" required>
                </div>
            <!--  -->
            <br>
            <br>
            <input type="submit" name="add" value="add-product">
            </form>
            </div>
            </div>
          </div>
         

             
             
           
            </div>
          </div>
          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
        <?php
        include 'footer.php'; 
         ?>
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="assets/js/jquery.min.js"></script>
    <script type="text/javascript">
      function subcat(id)
      {
        // $("#subcategory").html('');
        $.ajax({
          type:'POST',
          url:'ajax.php',
          data:{uid:id},
          success:function(data){
            $("#subcategory").html(data);
          }
        })
      } 
    </script>
     
   
    </script>
    <script src="assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="assets/js/off-canvas.js"></script>
    <script src="assets/js/hoverable-collapse.js"></script>
    <script src="assets/js/misc.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <!-- End custom js for this page -->

   
  </body>
</html>