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
            <div class="recent-updates card" style="padding-bottom: 21px;">
              <div class="card-close">
                
              </div>
              <div class="card-header">
                <h3 class="h4">Add Product</h3>
              </div>
              <div class="card-body padding">
                <form action="" method="post" enctype="multipart/form-data">
                  <div class="row">
                    <div class="col-sm-6">
                      <label for="p_name" class="font-weight-bold">Product-Name(Title OF Food) :</label>
                      <div class="form-group">
                        <input type="text" id="p_name" name="product_name" class="form-control" placeholder="Enter Product name..." required>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <label for="product_category" class="font-weight-bold">Product-Category :</label>
                      <div class="form-group">
                        <select name="product_category" class="form-control text-dark" required>
                          <option value="">Select product category</option>
                          <option value="veg">Veg</option>
                          <option value="non-veg">Non-Veg</option>
                        </select>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-sm-6">
                      <label for="file" class="font-weight-bold">Product-Image</label>
                      <div class="form-group">
                        <input type="file" id="file" name="file" class="form-control" placeholder="Choose Product Image..." required>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <label for="price" class="font-weight-bold">Product-Price</label>
                      <div class="form-group">
                        <input type="text" id="price" name="price" class="form-control text-dark" placeholder="Enter product price Rs..." required>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-sm-6" >
                      <label for="size" class="font-weight-bold">Title fo food (Size,Thalis,Jambo,Mini,fries,Pasta,Maggi Berger,Pizza)</label>
                      <div class="form-group">
                         <input type="text" name="size" class="form-control" placeholder="Enter the food of the name ,Size,Thalis,Jambo,Mini,fries,Pasta,Maggi Berger,Pizza" required>
                      </div>
                    </div>
                    
                    <div class="col-sm-6" >
                      <label for="desc" class="font-weight-bold">Product-Description:</label>
                      <div class="form-group">
                        <textarea id="desc" name="desc" class="form-control" placeholder="Enter product description..." required id="" cols="30" rows="3"></textarea>
                      </div>
                    </div>

                  </div>
                  <div class="row">
                    <div class="col-sm-6">
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group text-right" style="position: relative;top: 10px;">
                        <button type="submit" name="add_product" class="btn btn-primary px-5 font-weight-bold btn-dark">
                        Add Product</button>
                      </div>
                    </div>

                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>


    <?php

      if(isset($_POST['add_product']))
        {
          //// escape variables for security
        $category=mysqli_real_escape_string($con,$_POST['product_category']);
        $Product_name=mysqli_real_escape_string($con,$_POST['product_name']);
          // $sub_type=mysqli_real_escape_string($con,$_POST['sub_type']);
        $Product_price=mysqli_real_escape_string($con,$_POST['price']);
        $Product_desc=mysqli_real_escape_string($con,$_POST['desc']);
        $Product_title=mysqli_real_escape_string($con,$_POST['size']);
        $Product_image=mysqli_real_escape_string($con,$_FILES["file"]["name"]);
          
        $dir="img/";
        if(!is_dir($dir))
        {
          mkdir("img/");
        }

        move_uploaded_file($_FILES["file"]["tmp_name"],"img/".$_FILES["file"]["name"]);

        $rest_id = $_SESSION['resturant_id'];
        $timezone  = -7.5; //(GMT +5:30) IST (INDIA. & KOLKATA )
        $currentTime = gmdate("Y/m/j H:i:s", time() + 3600*($timezone+date("I")));

      $Query="INSERT INTO product (rest_id,p_name,p_category,p_price,p_description,p_title,p_image,created_at) 
          VALUES 
          ('$rest_id','$Product_name','$category','$Product_price','$Product_desc',
          '$Product_title','$Product_image','$currentTime')";

          $run=mysqli_query($con , $Query);
          
              if ($run > 0) {
                  ?>
                    <script>
                      sweetAlert(
                          {
                              title: "Wow One Product Added...!",
                              text: "Just wait for a Second",
                              type: "success"
                          },
                          function () {
                              window.location.href = 'addProduct.php';
                          });
                  </script>
                  <?php
              }
              else{
                ?>
                    <script>
                      sweetAlert(
                          {
                              title: "Somthing Went Wrong .Please Try Again Latter...!",
                              text: "Just wait for a Second",
                              type: "error"
                          },
                          function () {
                              window.location.href = 'addProduct.php';
                          });
                  </script>
                <?php
              }
            }
    ?>





    <!-- Page Footer-->
    <?php include 'pages/footer.php';?>