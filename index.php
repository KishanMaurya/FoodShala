

  <!-- Navigation -->
  <?php include 'pages/navbar.php'; ?>

  <!-- Page Content -->
  <div class="container">

    <div class="row">

      <div class="col-lg-3">

        <h1 class="my-4 font-mono textfood">FoodShala</h1>
        <div class="list-group list">
          <a href="#" class="list-group-item">HOME</a>
          <a href="about.php" class="list-group-item">ABOUT</a>
          <a href="#" class="list-group-item">MORE</a>
        </div>

      </div>
      <!-- /.col-lg-3 -->

      <div class="col-lg-9">

        <div id="carouselExampleIndicators" class="carousel slide my-4" data-ride="carousel">
          <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="4"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="5"></li>
          </ol>
          <div class="carousel-inner" role="listbox">
            <div class="carousel-item active">
              <img class="d-block img-fluid slider" src="img/p8.jpg"  alt="First slide">
              <div class="carousel-caption">
                <h3 class="h3-responsive">Egg Roll</h3>
                <p><span class="badge-pill badge-primary opacity-25">Veg And non veg Roll</span></p>
              </div>
            </div>
            <div class="carousel-item">
              <img class="d-block img-fluid slider" src="img/litti.jpg"  alt="Second slide">
              <div class="carousel-caption">
                <h3 class="h3-responsive">Rosted Bihari </h3>
                <p><span class="badge-pill badge-primary">Litti Chokha</span></p>
              </div>
            </div>
            <div class="carousel-item">
              <img class="d-block img-fluid slider" src="img/p3.jpg"  alt="Third slide">
              <div class="carousel-caption">
                <h3 class="h3-responsive">Pure veg food</h3>
                <p><span class="badge-pill badge-primary">Non Roti,Paneer</span></p>
              </div>
            </div>
            <div class="carousel-item">
              <img class="d-block img-fluid slider" src="img/p10.jpg"  alt="Fouth slide">
              <div class="carousel-caption">
              <h3 class="h3-responsive">Pure veg food</h3>
                <p><span class="badge-pill badge-primary">Non Roti,Paneer</span></p>
            </div>
            </div>
            <div class="carousel-item">
              <img class="d-block img-fluid slider" src="img/p9.jpg"  alt="Fifth slide">
              <div class="carousel-caption">
              <h3 class="h3-responsive">Pure veg food</h3>
                <p><span class="badge-pill badge-primary">Non Roti,Paneer</span></p>
            </div>
            </div>
            <div class="carousel-item">
              <img class="d-block img-fluid slider" src="img/p3.jpg"  alt="Sixth slide">
              <div class="carousel-caption">
              <h3 class="h3-responsive">Pure veg food</h3>
                <p><span class="badge-pill badge-primary">Non Roti,Paneer</span></p>
            </div>
            </div>
          </div>
          <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>
        
       <div class="row ">
        <?php
        if (!isset($_SESSION['login_type'])) {
            if (isset($_GET['page'])) {
                $page=$_GET['page'];
            }else{
              $page=1;
            }
            $Previous = $page - 1;
            $Next = $page + 1;
            $number_par_page=9;
            $start_from=($page-1)*9;
            $query=" SELECT * FROM product LIMIT $start_from,$number_par_page";
            $run=mysqli_query($con,$query);
            while ($row=mysqli_fetch_array($run)) {
            $id=$row['p_id'];
            $img=$row['p_image'];
            $name=$row['p_name'];
            $category=$row['p_category'];
            $desc=$row['p_description'];
            $price=$row['p_price'];
            $create_at=$row['created_at'];
          ?>
            <div class="col-lg-4 col-md-6 mb-4">
              <div class="card h-100">
                <a href="#">
                  <img class="card-img-top productImg"
                   src="img/<?php echo htmlentities($img);?>" alt="product image">
                </a>
                <div class="card-body">

                  <h4 class="card-title">
                    <a href="#" style="font-size: 18px">
                      <?php echo $name;?>
                    </a> 
                    <span class="ml-4 uppercase badge badge-pill badge-success" 
                    style="font-size: 12px;text-transform: uppercase;">
                      <?php echo $row['p_category'];?>
                    </span>
                  </h4>
                  <p>
                    <span style='font-family:Arial;'>&#8377;</span>
                    <?php echo $price;?>
                  </p>
                  <p class="card-text more">
                    <?php echo $desc;?>
                  </p>

                </div>
                <div class="card-footer">
                  <form action="" method="POST">
                  <small class="text-muted">
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star"></span>
                    <span class="fa fa-star"></span>
                  </small>
                    <button type="submit" class="btn btn-primary btn-sm ml-4 addtocart" name="addtocart" 
                    data="<?php echo $id;?>" value="<?php echo $id;?>">
                    Add to Cart</button>
                  </form>
                </div>
              </div>
            </div>

          <?php 
          }
        }
        elseif ($_SESSION['login_type'] == 'Resturants') {
            if (isset($_GET['page'])) {
                $page=$_GET['page'];
            }else{
              $page=1;
            }
            $Previous = $page - 1;
            $Next = $page + 1;
            $number_par_page=9;
            $start_from=($page-1)*9;
            $query=" SELECT * FROM product LIMIT $start_from,$number_par_page";

            $run=mysqli_query($con,$query);
            while ($row=mysqli_fetch_array($run)) {
            $id=$row['p_id'];
            $img=$row['p_image'];
            $name=$row['p_name'];
            $category=$row['p_category'];
            $desc=$row['p_description'];
            $price=$row['p_price'];
            $create_at=$row['created_at'];
            
            ?>
            <div class="col-lg-4 col-md-6 mb-4">
              <div class="card h-100">
                <a href="#">
                  <img class="card-img-top productImg"
                   src="img/<?php echo htmlentities($img);?>" alt="product image">
                </a>
                <div class="card-body">

                  <h4 class="card-title">
                    <a href="#" style="font-size: 18px">
                      <?php echo $name;?>
                    </a> 
                    <span class="ml-4 uppercase badge badge-pill badge-success" 
                    style="font-size: 12px;text-transform: uppercase;">
                      <?php echo $row['p_category'];?>
                    </span>
                  </h4>
                  <p>
                    <span style='font-family:Arial;'>&#8377;</span>
                    <?php echo $price;?>
                  </p>
                  <p class="card-text more">
                    <?php echo $desc;?>
                  </p>

                </div>
                <div class="card-footer">
                  <small class="text-muted">
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star"></span>
                    <span class="fa fa-star"></span>
                  </small>
                  <button class="btn btn-secondary btn-sm ml-4 addtocart" data="<?php $id;?>" disabled>Add to Cart</button>
                </div>
              </div>
            </div>

          <?php  
          } 
        }
        elseif ($_SESSION['login_type'] == 'Customers' && $_SESSION['preference'] == 'veg') {
            if (isset($_GET['page'])) {
                $page=$_GET['page'];
            }else{
              $page=1;
            }
            $Previous = $page - 1;
            $Next = $page + 1;

            $number_par_page=9;
            $start_from=($page-1)*9;
            $query=" SELECT * FROM product WHERE p_category='veg' LIMIT $start_from,$number_par_page";
            $run=mysqli_query($con,$query);
            while ($row=mysqli_fetch_array($run)) {
            $id=$row['p_id'];
            $img=$row['p_image'];
            $name=$row['p_name'];
            $category=$row['p_category'];
            $desc=$row['p_description'];
            $price=$row['p_price'];
            $created_at=$row['created_at'];
          ?>
            <div class="col-lg-4 col-md-6 mb-4">
              <div class="card h-100">
                <a href="#">
                  <img class="card-img-top productImg" 
                   src="Resturant/img/<?php echo htmlentities($img);?>"  alt="product image">
                </a>
                <div class="card-body">

                  <h4 class="card-title">
                    <a href="#" style="font-size: 18px">
                      <?php echo $name;?>
                    </a> 
                    <span class="ml-4 uppercase badge badge-pill badge-success" 
                    style="font-size: 12px;text-transform: uppercase;">
                      <?php echo $row['p_category'];?>
                    </span>
                  </h4>
                  <p>
                    <span style='font-family:Arial;'>&#8377;</span>
                    <?php echo $price;?>
                  </p>
                  <p class="card-text more">
                    <?php echo $desc;?>
                  </p>

                </div>
                <div class="card-footer">
                  <form action="" method="POST">
                  <small class="text-muted">
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star"></span>
                    <span class="fa fa-star"></span>
                  </small>
                    <button type="submit" class="btn btn-primary btn-sm ml-3 addtocart" 
                    name="addtocart" data="<?php echo $id;?>" 
                    value="<?php echo $id;?>">
                    Add to Cart</button>
                  </form>
                </div>
              </div>
            </div>

          <?php  
        }
      }
      elseif ($_SESSION['login_type'] == 'Customers' && $_SESSION['preference'] == 'nonveg') {
        if (isset($_GET['page'])) {
                $page=$_GET['page'];
            }else{
              $page=1;
            }
            $Previous = $page - 1;
            $Next = $page + 1;

            $number_par_page=9;
            $start_from=($page-1)*9;
            $query=" SELECT * FROM product WHERE p_category='non-veg' LIMIT $start_from,$number_par_page";
            $run=mysqli_query($con,$query);
            while ($row=mysqli_fetch_array($run)) {
            $id=$row['p_id'];
            $img=$row['p_image'];
            $name=$row['p_name'];
            $category=$row['p_category'];
            $desc=$row['p_description'];
            $price=$row['p_price'];
            $created_at=$row['created_at'];
        ?>
            <div class="col-lg-4 col-md-6 mb-4">
              <div class="card h-100">
                <a href="#">
                  <img class="card-img-top productImg" 
                   src="Resturant/img/<?php echo htmlentities($img);?>"  alt="product image">
                </a>
                <div class="card-body">

                  <h4 class="card-title">
                    <a href="#" style="font-size: 18px">
                      <?php echo $name;?>
                    </a> 
                    <span class="ml-4 uppercase badge badge-pill badge-success" 
                    style="font-size: 12px;text-transform: uppercase;">
                      <?php echo $row['p_category'];?>
                    </span>
                  </h4>
                  <p>
                    <span style='font-family:Arial;'>&#8377;</span>
                    <?php echo $price;?>
                  </p>
                  <p class="card-text more">
                    <?php echo $desc;?>
                  </p>

                </div>
                <div class="card-footer">
                  <form action="" method="POST">
                  <small class="text-muted">
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star"></span>
                    <span class="fa fa-star"></span>
                  </small>
                    <button type="submit" class="btn btn-primary btn-sm ml-3 addtocart" 
                    name="addtocart" data="<?php echo $id;?>" 
                    value="<?php echo $id;?>">
                    Add to Cart</button>
                  </form>
                </div>
              </div>
            </div>

          <?php  
        }
      }
      ?>
      </div>
        <!-- /.row -->
        <div class="row mt-2 mb-5 justify-content-center">
          <div class="col-md-12 mb-5 text-right">
            <?php
              $number_par_page=9;
              $query="SELECT * FROM product";
              $run=mysqli_query($con,$query);
              $row=mysqli_num_rows($run);
              $total_page=ceil($row/$number_par_page);
              for ($i=1; $i <$total_page ; $i++) { 
                ?>
                  <nav aria-label="Page navigation" class="page">
                    <ul class="pagination pageCenter">
                      <li class="page-item">
                        <a href="index.php?page=<?= $Previous; ?>" class="page-link" aria-label="Previous">
                          <span aria-hidden="true">&laquo; Previous</span>
                        </a>
                      </li>
                      <?php for($i = 1; $i<= $total_page; $i++) : ?>
                        <li class="page-item">
                          <a href="index.php?page=<?= $i; ?>" class="page-link"><?= $i; ?></a></li>
                      <?php endfor; ?>
                      <li class="page-item">
                        <a href="index.php?page=<?= $Next; ?>" class="page-link" aria-label="Next">
                          <span aria-hidden="true">Next &raquo;</span>
                        </a>
                      </li>
                    </ul>
                  </nav>
                <?php
              }
            ?>
          </div>
        </div>

      </div>
      <!-- /.col-lg-9 -->

    </div>
    <!-- /.row -->

  </div>
  <!-- /.container -->

  <!-- Footer -->
  <?php include 'pages/footer.php'; ?>
  
  <!---modal form login--->

    <div id="myModal" class="modal fade" role="dialog">
      <div class="modal-dialog modal-md">
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header bg-info">
            <h4 class="modal-title text-white">Login</h4>
            <button type="button" class="close text-white" data-dismiss="modal">&times;</button>
          </div>
          
          <form action="login.php" method="post">
                <div class="modal-body">

                  <label for="type" class="font-weight-bold">UserType:</label>
                  <div class="form-group">
                    <select name="usertype" id="usertype" class="form-control " required>
                      <option value="" selected="selected">---Select User Type---</option>
                      <option value="Customer">Customer</option>
                      <option value="Resturant">Resturant</option>
                    </select>
                  </div>
                  
                  <div class="form-group" id="Preference">
                    <label for="Preference" class="font-weight-bold">Preference:</label>
                    <select name="prefer" id="Preferenced" class="form-control ">
                      <option value="">Select Preference..</option>
                      <option value="veg">Veg</option>
                      <option value="nonveg">Non-veg</option>
                    </select>
                  </div>
                  <label for="email" class="font-weight-bold">Email:</label>
                  <div class="form-group">
                    <input type="email" name="email" id="email" class="form-control " placeholder="Enter the email..." required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" title="Please Enter Currect Email..">
                  </div>
                  <label for="Password" class="font-weight-bold">Password:</label>
                  <div class="form-group">
                    <input type="Password" name="password" id="Password" class="form-control " placeholder="Enter the Password..." required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Please Enter Currect Password..">
                  </div>
                  <div class="form-group text-right">
                    <button type="submit" name="login" class="btn btn-success btn-sm font-weight-bold px-3">Login</button>
                  </div>

                </div>
          </form>

        </div>
      </div>
    </div>

    <script>
      //login script

      $(document).ready(function(){
        $('#Preference').hide();
        $('#usertype').bind('change keyup',function () {
          var user=$(this).children("option:selected").attr('value');
          if (user == 'Customer') {
            $('#Preference').show();
          }
          else{
            $('#Preference').hide();
          }
        });
      });

    </script>


  <!-- Bootstrap core JavaScript -->

  <script src="include/js/bootstrap.js"></script>
  <script src="include/js/bootstrap.min.js"></script>
</body>
</html>
