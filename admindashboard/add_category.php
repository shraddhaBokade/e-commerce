
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
echo $cname=$_POST["cat-name"];

$qry1=mysqli_query($conn,"select * from category where cat_name= '$cname'");
$check=mysqli_num_rows($qry1);
if($check>0)
{
echo "<script>alert('category already exist')</script>";
}
else
{
$qry=mysqli_query($conn,"insert into category (cat_name,status)values('$cname','1')");
header("location:Category.php");
echo mysqli_error($conn); 
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
            <form method="POST">
            <div class="form-group">
            <label for="username">Category name</label>
            <input type="text" class="form-control"  name="cat-name" required>
            </div>
            <br>
            <br>
            <input type="submit" name="add" value="add_category">
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