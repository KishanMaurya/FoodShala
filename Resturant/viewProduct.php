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
                      <h3 class="h4">All Product</h3>
                    </div>
                    <div class="card-body no-padding">
                      <!-- Item-->
                      <div class="item d-flex justify-content-between">
                        <div class="info d-flex">
                            <table id="example" class="table table-bordered table-responsive" width="100%">
                              <thead>
                                <tr>
                                  <th>#</th>
                                  <th>Product<br>Name</th>
                                  <th>Category</th>
                                  <th>Price</th>
                                  <th>Description</th>
                                  <th>Product<br>Size</th>
                                  <th>Product<br>Image</th>
                                  <th>Date</th>
                                  <th>View</th>
                                  <th>Delete</th>
                                </tr>
                              </thead>
                              <tbody class="text-center">
                          <?php
                            $rest_id=$_SESSION['resturant_id'];
                            $query="SELECT *
                            FROM product ";

                              $run=mysqli_query($con,$query);
                              while ($row=mysqli_fetch_array($run)) {
                                $img=$row['p_image'];
                                $create_at=$row['created_at'];
                                ?>
                                <tr style="height: 120px !important; overflow-y: scroll;">
                                    <td><?php echo $row['p_id'];?></td>
                                    <td><?php echo $row['p_name'];?></td>
                                    <td><?php echo $row['p_category'];?></td>
                                    <td><?php echo $row['p_price'];?></td>
                                    <td width="20%" class="text-justify"><?php echo $row['p_description'];?></td>
                                    <td><?php echo $row['p_title'];?></td>
                                    <td class="text-center">
                                      <img class="rounded img-thumbnail" src="img/<?php echo htmlentities($img);?>" 
                                      style="width: 100px; height: 100px;">

                                    </td>
                                    <td width="9%"><?php echo date("d-m-Y", strtotime($create_at));?></td>
                                    <td>
                                      <button class="btn btn-info btn-sm editProduct px-4 font-weight-bold">Edit</button>
                                    </td>
                                    <td class="text-center">
                                      <button class="btn btn-danger btn-sm deletproduct px-3 font-weight-bold">Delete</button></td>
                                  </tr>
                                <?php
                              }

                             ?>
                              </tbody>

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
          <h4 class="modal-title text-white">Update Product</h4>
          <button type="button" class="close text-white" data-dismiss="modal">&times;</button>
        </div>

        <!-- Modal body -->
        <div class="modal-body">
           <form action="" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" id="p_id">
                  <div class="row">
                    <div class="col-sm-6">
                      <label for="p_name">Product-Name :</label>
                      <div class="form-group">
                        <input type="text" id="p_name" name="product_name" class="form-control" placeholder="Enter Product name...">
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <label for="product_category">Product-Category :</label>
                      <div class="form-group">
                        <select name="product_category" required="required" id="p_cat" onChange="getSubCat(this.value);" class="form-control text-dark">
                          <option value="">Select product category</option>
                          <option value="veg" selected>Veg</option>
                          <option value="non-veg" selected>Non-Veg</option>
                        </select>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-sm-6">
                      <label for="p_type">Product-SubCategory:</label>
                      <div class="form-group">
                        
                      </div>
                    </div>
                    <div class="col-sm-6">

                      <label for="price">Product-Price</label>
                      <div class="form-group">
                        <input type="text" id="p_price" name="p_price" class="form-control text-dark" placeholder="Enter product price Rs...">
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-sm-6">
                       <label for="desc">Product-Description:</label>
                      <div class="form-group">
                        <input type="text" id="p_desc" name="desc" class="form-control" placeholder="Enter product description...">
                      </div>
                    </div>

                    <div class="col-sm-6">
                      <label for="size">Product-Size</label>
                      <input type="text" id="p_size" class="form-control">
                    </div>

                  </div>
                  <div class="row">

                    <div class="col-sm-6">
                      <label for="file">Product-Image</label>
                      <div class="form-group">
                        <input type="file" id="p_image" name="file" class="form-control" placeholder="Choose Product Image...">
                      </div>
                    </div>

                    <div class="col-sm-6">
                      <div class="form-group text-right" style="position: relative;top: 31px;">
                        <button type="submit" name="update_product" class="btn btn-block btn-dark font-weight-bold">
                        UpdateProduct</button>
                      </div>
                    </div>

                  </div>
                </form>
        </div>

        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
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
