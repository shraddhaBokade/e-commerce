
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_navbar.php -->
    <?php
    include 'navbar.php'; 
     ?>
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.php -->
      <?php
      include 'sidebar.php'; 
       ?>
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title"> Basic Tables </h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="#">Tables</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Basic tables</li>
                </ol>
              </nav>
            </div>
            <div class="row">
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
    $update_status_sql="update product set status='$status' where id ='$id'";
    mysqli_query($conn,$update_status_sql);
    echo mysqli_error($conn);

  }


  if($type=='delete')
  {
    $id=($_GET['id']);
    $delete_sql="delete from product where id='$id'";
    mysqli_query($conn,$delete_sql);
  }
}
    ?>        
             
             
              <div class="col-lg-12 stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h1 class="card-title">PRODUCT-LIST</h1>
                      <nav aria-label="breadcrumb">
                      <div class="d-flex justify-content-end"> <a href="add_product.php" class="btn btn-info" role="button"><i class='fa fa-plus fa-1x'>add Product</i></a></div>
                      </nav>
                      <br>
                      <br>

                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th>sn</th>
                          <th>Id</th>
                          <th>Product Name</th>
                          <th>Category</th>
                          <th>Subcategory</th>
                          <th>Price</th>
                          <th>Quantity</th>
                          <th>Image</th>
                          <th class="text-center">Status</th>
                          <th>Edit</th>
                          <th>Delete</th>
                         
                        </tr>
                      </thead>
                      <tbody>
                         <?php
                         $i="1";
             $pro_query="select product.id,product.cat_id,product.sub_id,product.name,product.price,product.description,product.quantity,product.image,product.status,category.cat_name,subcategory.sub_name FROM product INNER JOIN category ON product.cat_id=category.cat_id INNER JOIN subcategory ON product.sub_id = subcategory.sub_id order by id asc";
              $product=mysqli_query($conn,$pro_query);
              while($data=mysqli_fetch_array($product))
               {

              ?>
                        <tr>
                          <td class="table-danger"><?php echo $i?></td>
                          <td class="table-info"><?php echo $data["id"];?></td>
                          <td class="table-warning"><?php echo $data["name"];?></td>
                          <td class="table-primary"><?php echo $data["cat_name"];?></td>
                          <td class="table-danger"><?php echo $data["sub_name"];?></td>
                          <td class="table-info"><?php echo $data["price"];?></td>
                          <td  class="table-danger"><?php echo $data["quantity"];?></td>
                          <td><img src="media/<?php echo $data["image"] ?>"></td>
                         <td>
                           <?php
                          if($data["status"]==1)
                          {
                              echo "<button class='btn btn-success'><a href='?type=status&operation=deactive&id=".$data['id']."'>Active</a></button>";
                            
                          }
                          else
                          {
                             echo "<button class='btn btn-success
                             '><a href='?type=status&operation=active&id=".$data['id']."'>Dective</a></button>";
                           
                          } 
                           ?>
                         </td>
                          <td ><a href="update_product.php?id=<?php echo $data['id'];?>"><i class='fa fa-edit fa-2x' style="color: black" ></i></a></td>
                          <td ><a href="product.php?type=delete&id=<?php echo $data['id'];?>"><i class='fa fa-trash fa-2x'  style="color: black" ></i></a></td>
                         
                        </tr>
                     
                      
                       <?php
 $i++;
                       } 

                        ?>
                     
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.php -->
          <footer class="footer">
            <div class="d-sm-flex justify-content-center justify-content-sm-between">
              <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2017 <a href="https://www.bootstrapdash.com/" target="_blank">BootstrapDash</a>. All rights reserved.</span>
              <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with <i class="mdi mdi-heart text-danger"></i></span>
            </div>
          </footer>
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
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