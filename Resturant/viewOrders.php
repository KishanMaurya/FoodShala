<?php include 'pages/navbar.php'; ?>
<?php include 'pages/sidebar.php'; ?>
<div class="content-inner">
          <!-- Page Header-->
          <header class="page-header">
            <div class="container-fluid">
              <h2 class="no-margin-bottom">Resturant</h2>
            </div>
          </header>

          <section class="updates padding-top">
            <div class="container-fluid">
              <div class="row justify-content-center">
                <!-- Recent Updates-->
                <div class="col-lg-12">
                  <div class="recent-updates card">
                    <div class="card-header">
                      <h3 class="h4">All Orders</h3>
                    </div>
                    <div class="card-body no-padding">
                      <!-- Item-->
                      <div class="item d-flex justify-content-between">
                        <div class="info d-flex">
                            <table id="example" 
                              class="table table-hover display" style="width:100%">
                              <thead>
                                <tr>
                                  <th >#</th>
                                  <th >Product <br>Image </th>
                                  <th >Product<br>Name</th>
                                  <th >Product<br>Type</th>
                                  <th >Product<br>Preference</th>
                                  <th >Product<br>Price</th>
                                  <th class="th-sm text-center">Customer<br>Name</th>
                                  <th class="th-sm text-center">Customer <br> Email</th>
                                  <th >Customer <br>Phone</th>
                                  <th >Customer <br>Address</th>
                                  <th >Order <br>Date</th>
                                  <th class="th-sm text-center">View</th>
                                </tr>
                              </thead>
                              <tbody class="text-center">
                          <?php
                            $rest_id=$_SESSION['resturant_id'];
                            $query="SELECT product.p_id,product.p_name,product.p_category,product.p_price,product.p_title,product.p_image,register.id,register.name,register.address,
                              orders.order_id,register.email,register.phone,register.res_type,orders.created_at
                              FROM ((orders INNER JOIN product ON orders.product_id = product.p_id)
                              INNER JOIN register ON orders.customer_id = register.id);";

                              $run=mysqli_query($con,$query);
                              while ($row=mysqli_fetch_array($run)) {
                                $order_id=$row['order_id'];
                                $product_name=$row['p_name'];
                                $category=$row['p_category'];
                                $price=$row['p_price'];
                                $title=$row['p_title'];
                                $customer_name=$row['name'];
                                $customer_email=$row['email'];
                                $customer_phone=$row['phone'];
                                $customer_address=$row['address'];
                                $product_image=$row['p_image'];
                                $orders_date=$row['created_at'];
                                ?>
                                <tr style="height: 100px !important; overflow-y: scroll;">
                                    <td width="2%" class="font-weight-bold"><?php echo $row['order_id'];?></td>
                                    <td>
                                      <img class="rounded img-thumbnail" 
                                      src="img/<?php echo htmlentities($product_image);?>" 
                                      style="width: 100px; height: 80px;"></td>
                                    <td><?php echo $product_name;?></td>
                                    <td><?php echo $category;?></td>
                                    <td><?php echo $price;?></td>
                                    <td><?php echo $title;?></td>
                                    <td><?php echo $customer_name;?></td>
                                    <td><?php echo $customer_email;?></td>
                                    <td><?php echo $customer_phone;?></td>
                                    <td><?php echo $customer_address;?></td>
                                    
                                    <td width="9%">
                                      <?php echo date("d-m-Y", strtotime($orders_date));?>
                                    </td>
                                    <td>
                                      <button class="btn btn-info btn-sm viewProduct px-2
                                      font-weight-bold"><i class="fas fa-eye"></i></button>
                                    </td>
                                  </tr>
                                <?php
                              }

                             ?>
                              </tbody>
                              <tfoot>
                                <tr>
                                  <th>#</th>
                                  <th >Product <br>Image </th>
                                  <th >Product<br>Name</th>
                                  <th >Product<br>Type</th>
                                  <th >Product<br>Preference</th>
                                  <th >Product<br>Price</th>
                                  <th class="th-sm text-center">Customer<br>Name</th>
                                  <th class="th-sm text-center">Customer <br> Email</th>
                                  <th >Customer <br>Phone</th>
                                  <th >Customer <br>Address</th>
                                  <th >Date</th>
                                  <th class="th-sm text-center" colspan="2">Action</th>
                                </tr>
                              </tfoot>

                            </table>
                        </div>
                      </div>

                    </div>
                  </div>
                </div>
              </div>
            </div>
          </section>



<!---------Update product----------->

<div class="modal fade" id="updateproduct">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header bg-dark" >
          <h4 class="modal-title text-white">Veiw Orders</h4>
          <button type="button" class="close text-white" data-dismiss="modal">&times;</button>
        </div>

        <!-- Modal body -->
        <div class="modal-body">
           <table class="table table-bordered table-responsive">
             <tr>
               <td>OrderID</td>
               <td></td>
             </tr>
             <tr>
               <td>Product Image</td>
               <td></td>
             </tr>
             <tr>
               <td>Product Name</td>
               <td></td>
             </tr>
             <tr>
               <td>Product Category</td>
               <td></td>
             </tr>
             <tr>
               <td>Product Prefernce</td>
               <td></td>
             </tr>
             <tr>
               <td>Product Price</td>
               <td></td>
             </tr>
             <tr>
               <td>Customer Name</td>
               <td></td>
             </tr>
             <tr>
               <td>Customer Email</td>
               <td></td>
             </tr>
             <tr>
               <td>Customer Phone</td>
               <td></td>
             </tr>
             <tr>
               <td>Customer Address</td>
               <td></td>
             </tr>
             <tr>
               <td>Order Date</td>
               <td></td>
             </tr>
           </table>
        </div>

        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger btn-sm font-weight-bold" data-dismiss="modal">Close</button>
        </div>

      </div>
    </div>
  </div>


  <!--------Delete product-->

  <div class="modal fade" id="delproduct">
    <div class="modal-dialog">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header bg-dark" >
          <h5 class="modal-title text-white">Delete Product</h5>
    <button type="button" class="close text-white" data-dismiss="modal">&times;</button>
        </div>

        <form action="" method="post">
        <!-- Modal body -->
        <div class="modal-body">

          <input type="hidden" name="id" id="id">
          <h6>
            You want to delete : <span class="mx-4 px-3 py-1  badge-pill badge-success" id="product_name"></span>
           </h6>

        </div>
        <div class="modal-footer">
  <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
  <button type="submit" name="delete_product"
                class="btn btn-primary font-weight-bold btn-sm">Delete</button>
        </div>

        </form>


      </div>
    </div>
  </div>


<?php
  if (isset($_POST['update_product'])) {
     $id=mysqli_escape_string($con,$_POST['id']);
     $p_cat=mysqli_escape_string($con,$_POST['product_category']);
     $p_name=mysqli_escape_string($con,$_POST['product_name']);
     $p_stype=mysqli_escape_string($con,$_POST['sub_type']);
     $p_price=mysqli_escape_string($con,$_POST['p_price']);
     $p_desc=mysqli_escape_string($con,$_POST['desc']);
     $p_size=mysqli_escape_string($con,$_POST['size']);
     $file=mysqli_real_escape_string($con , $_FILES["file"]["name"]);

      $dir="img/";
      if(!is_dir($dir))
        {
          mkdir("img/");
        }
      move_uploaded_file($_FILES["file"]["tmp_name"],"img/".$_FILES["file"]["name"]);

      $query="UPDATE product SET cat_id=$p_cat , p_name='$p_name' ,p_type=$p_stype, p_price='$p_price' , p_desc='$p_desc' , p_size='$p_size',p_image='$file' WHERE p_id=$id";
      $run=mysqli_query($con,$query);
      if ($run > 0) {
          ?>
            <script>
              sweetAlert(
                  {
                    title: "One Product Updated...!!",
                    text: "Just wait for a Second",
                    type: "success"
                  },
                  function () {
                  window.location.href = 'view_product.php';
              });
          </script>
        <?php
      }
  }



  // Delete Product

  if (isset($_POST['delete_product'])) {
      $id=mysqli_real_escape_string($con,$_POST['id']);
      $query="DELETE FROM product WHERE p_id=$id";
      $run=mysqli_query($con,$query);
      if ($run > 0) {
        ?>
          <script>
            sweetAlert(
              {
                title: "One Product Deleted..!",
                text: "Just wait for a Second",
                type: "success"
              },
            function () {
              window.location.href = 'view_product.php';
            });
          </script>
        <?php
      }
  }




?>
          <!-- Page Footer-->
          <?php include 'pages/footer.php';?>
