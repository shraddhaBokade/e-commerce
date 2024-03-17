
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
$msg="";
if(isset($_POST["add"]))
{
echo $cname=$_POST["cat_id"];  
echo $sname=$_POST["sub-name"];

$qry1=mysqli_query($conn,"select * from subcategory where sub_name= '$sname'");
$check=mysqli_num_rows($qry1);
if($check>0)
{
  $msg= "subcategory already exists";

}
else
{
$qry=mysqli_query($conn,"insert into subcategory (cat_id,sub_name,status)values('$cname','$sname','1')");
header("location:subcategory.php");
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
        <h1 class="page-title">Subcategories</h1>
     
            </div>
            <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
            <div class="card-body">
            <h1 class="card-title">Subcategories</h1>
            <form method="POST">
            <div class="form-group">
            <label>Category name</label>
            <select  name="cat_id">
            <option>select categories</option>
            <?php 
            $res=mysqli_query($conn,"select cat_name,cat_id from category");
            while($row=mysqli_fetch_array($res))
           {
           echo "<option value=".$row['cat_id'].">".$row['cat_name']."</option>";
           }
           ?>
        </select>
        </div>
            <div class="form-group">
            <label for="username">Category name</label>
            <input type="text" class="form-control"  name="sub-name" required>
            </div>
            <span class="error" style="font-family: sans-serif;color: red;"><?php echo $msg; ?></span>
            <br>

            <br>
            <input type="submit" name="add" value="add_subcategory">

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