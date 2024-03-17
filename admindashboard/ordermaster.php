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
        <nav aria-label="breadcrumb">
        <div class="d-flex justify-content-end"> <a href="add_category.php" class="btn btn-info" role="button">add category</a></div>
              </nav>
            </div>
            <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
            <div class="card-body">
            <h1 class="card-title">cetegories</h1>
          <table class="table">
      <thead>
        <th>ORDER-ID</th>
        <th>ORDER-Date</th>
        <th>Address</th>
        <th>price</th>
        <th>Payment-type</th>
        <th>Order-status</th>

      </thead>
      <tbody>
        <?php
       
       
        $res=mysqli_query($conn,"select * from myorder");
        while($row=mysqli_fetch_array($res))
        {
          ?>
       
                <tr>
        <td class="cart_price">
        <p><a href="orderstatus.php">View-Detail</a></p>
        </td>
        <td class="cart_price">
        <p><?php echo $row["addon"]?></p>
        </td>
        <td class="cart_price">
        <p><?php echo $row["address"]?>/
        <?php echo $row["city"]?>/<?php echo $row["pincode"]?>
        </p>
        </td>
        <td class="cart_price">
        <p><?php echo $row["total_price"]?></p>
        </td>
        <td class="cart_price">
        <p><?php echo $row["payment_type"]?></p>
        </td>
        <td class="cart_price">
        <p><?php echo $row["order_status"]?></p>
        </td>
        </tr>
      
        </tbody>
      <?php
      }
       
         ?>
        
    </table>



   
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

















 