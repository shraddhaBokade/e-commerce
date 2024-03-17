<?php
include 'db.php';
?>
<?php
// status
if(isset($_GET['type']) && $_GET['type']!=''){
  $type=($_GET['type']);
  if($type=='status'){
    $operation=($_GET['operation']);
    $id=($_GET['id']);
    if($operation=='active'){
      $status='1';
    }else{
      $status='0';
    }
    $update_status_sql="update category set status='$status' where cat_id='$id'";
    mysqli_query($conn,$update_status_sql);
    echo mysqli_error($conn);

  }

  // Delete
if($type=='delete')
{
$id=$_GET['id'];
$delete_cat= "delete from category where cat_id = '$id'";
mysqli_query($conn,$delete_cat);
}
} 


 
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
                        <tr class="text-center">
                          <th>sn.</th>
                          <th>Cat_id</th>
                          <th>Cat_name</th>
                          <th>Status</th>
                          <th>Edit</th>
                          <th>Delete</th>
                         
                        </tr>
                      </thead>
                      <tbody>
                     


                        <?php
                        $query=mysqli_query($conn,"select * from category order by cat_id asc");
                        echo  mysqli_error($conn);
                        $i="1";
                        while($row=mysqli_fetch_array($query))
                        {
                         ?>
                       
                        <tr class="text-center">
                          <td><?php echo $i?></td>
                          <td><?php echo $row['cat_id']?></td>
                          <td><?php echo $row['cat_name']?></td>
                          <td>
                          <?php
                          if($row["status"]==1)
                          {
                              echo "<button class='btn btn-success'><a href='?type=status&operation=deactive&id=".$row['cat_id']."'>Active</a></button>";
                            
                          }
                          else
                          {
                             echo "<button class='btn btn-success
                             '><a href='?type=status&operation=active&id=".$row['cat_id']."'>Dective</a></button>";
                           
                          } 
                           ?>
                           </td>
                          <td><button class="btn btn-warning"><?php echo "<a href='update_category.php?type=update&id=".$row['cat_id']."'>update</a>"?></button></td>
                          <td><button class="btn btn-primary"><?php echo "<a href='?type=delete&id=".$row['cat_id']."'>Delete</a>"?></button></td>
                         
      
                         <?php 
                          $i++;
                          }
                          ?>
                        </tr>
                      
                      
                      
                      
                      </tbody>
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

















 