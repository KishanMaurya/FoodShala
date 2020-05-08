
<?php include 'pages/navbar.php'; ?>
<?php include 'pages/sidebar.php'; ?>
<div class="content-inner">
          <!-- Page Header-->
          <header class="page-header">
            <div class="container-fluid">
              <h2 class="no-margin-bottom">Customer</h2>
            </div>
          </header>

          <section class="updates padding-top">
            <div class="container-fluid">
              <div class="row justify-content-center">
                <!-- Recent Updates-->
                <div class="col-lg-10 justify-content-center">
                  <div class="recent-updates card">
                    <div class="card-header bg-dark text-white">
                      <div class="row RightSide">
                        <div class="col-md-6 UserProfile">
                          <h3 class="h5">Profile</h3>
                        </div>
                        <div class="col-md-6 text-right UserID">
                          <h3 class="h5">User-ID: <?php echo $_SESSION['customer_id']; ?></h3>
                        </div>
                      </div>
                    </div>
                    <div class="card-body no-padding px-5 py-4">
                      <?php
                        $id=$_SESSION['customer_id'];
                        $query="SELECT * FROM register WHERE id=$id ";
                        $run=mysqli_query($con,$query);
                        $count=mysqli_num_rows($run);
                        $row=mysqli_fetch_array($run);
                        foreach ($row as $user) {
                          $id=$row['id'];
                          $name=$row['name'];
                          $email=$row['email'];
                          $phone=$row['phone'];
                          $address=$row['address'];
                          $res_type=$row['res_type'];
                          $password=$row['password'];
                          $created_at=$row['created_at'];
                        }
                      ?>
                      <form action="" method="POST">
                        <div class="row">
                        <div class="col-md-6">
                          <label for="" class="font-weight-bold">Name:</label>
                          <div class="form-group">
                            <input type="text" class="form-control" value="<?php echo $name?>">
                          </div>
                        </div>
                        <div class="col-md-6">
                          <label for="" class="font-weight-bold">Email</label>
                          <div class="form-group">
                            <input type="text" class="form-control" value="<?php echo $email?>">
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                          <label for="" class="font-weight-bold">Phone:</label>
                          <div class="form-group">
                            <input type="text" class="form-control" value="<?php echo $phone?>">
                          </div>
                        </div>
                        <div class="col-md-6">
                          <label for="" class="font-weight-bold">Address</label>
                          <div class="form-group">
                            <input type="text" class="form-control" value="<?php echo $address?>">
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                          <label for="" class="font-weight-bold">User Type:</label>
                          <div class="form-group">
                            <select name="usertype" id="" class="form-control">
                              <option value="<?php echo $res_type;?>">
                                <?php echo $res_type;?>
                                </option>
                              <option value="nonveg">Non-veg</option>
                            </select>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <label for="" class="font-weight-bold">Password</label>
                          <div class="form-group">
                            <input type="password" class="form-control" value="<?php echo $password ;?>">
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                          <label for="" class="font-weight-bold">Created Date:</label>
                          <div class="form-group">
                            <input type="text" class="form-control" data-provide="datepicker" 
                            value="<?php echo date("d-m-Y", strtotime($created_at)); ?>">
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group text-right mx-4" style="margin-top: 35px;">
                            <button type="submit" class="btn btn-success px-5 py-1 font-weight-bold SaveBtn">Save Profile</button>
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
          <!-- Page Footer-->

<?php include 'pages/footer.php';?>