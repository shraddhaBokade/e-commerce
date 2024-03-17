
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
        <h1 class="page-title">Sub_Categories</h1>
     
            </div>
            <div class="row">
            <?php
             $msg='';
             $subcategories='';
             if(isset($_GET['id']) && $_GET['id']!='')
             {
             $id=$_GET['id'];
             $res=mysqli_query($conn,"select * from subcategory where sub_id='$id'");
             $check=mysqli_num_rows($res);
             if($check>0){
             $row=mysqli_fetch_assoc($res);
             $subcategories=$row['sub_name'];
             }else{
             header('location:subcategory.php');
            die();
            }
            }

            if(isset($_POST['update'])){
           $subcategories=$_POST['sub-name'];
           $res=mysqli_query($conn,"select * from subcategory where sub_name='$subcategories'");
           $check=mysqli_num_rows($res);
           if($check>0){
           if(isset($_GET['id']) && $_GET['id']!=''){
           $getData=mysqli_fetch_assoc($res);
          if($id==$getData['sub_id']){
      
          }else{
          $msg="This Subcategory already exist";
          }
          }
          }
  
         if($msg==''){
         if(isset($_GET['id']) && $_GET['id']!='')
         {
         mysqli_query($conn,"update subcategory set sub_name='$subcategories' where sub_id='$id'");
         }
   
         }
         } 
             ?>
            <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
            <div class="card-body">
            <h1 class="card-title">Sub_category</h1>
           <form method="POST">
<div class="form-group">
<label for="username">Category name</label>
<input type="text" class="form-control"  name="sub-name" value="<?php echo $subcategories ?>">
</div>
<br>

<span style="font-family: sans-serif;color: red;margin-bottom: 10px;"><?php echo $msg; ?></span>
<br>
<br>
<input type="submit" name="update" value="update">
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