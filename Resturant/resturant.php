
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
                <div class="col-lg-10">
                  <div class="recent-updates card">
                    <div class="card-header bg-dark text-white">
                      <div class="row">
                        <div class="col-md-6">
                          <h3 class="h5">Profile</h3>
                        </div>
                        <div class="col-md-6 text-right">
                          <h3 class="h5">User-ID: <?php echo $_SESSION['resturant_id']; ?></h3>
                        </div>
                      </div>
                    </div>
                    <div class="card-body no-padding px-5 py-4">
                      <?php
                        $id=$_SESSION['resturant_id'];
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
                            <input type="text" class="form-control" 
                            value="<?php echo $name?>">
                          </div>
                        </div>
                        <div class="col-md-6">
                          <label for="" class="font-weight-bold">Email</label>
                          <div class="form-group">
                            <input type="text" class="form-control" 
                            value="<?php echo $email?>">
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                          <label for="" class="font-weight-bold">Phone:</label>
                          <div class="form-group">
                            <input type="text" class="form-control" 
                            value="<?php echo $phone?>">
                          </div>
                        </div>
                        <div class="col-md-6">
                          <label for="" class="font-weight-bold">Address</label>
                          <div class="form-group">
                            <input type="text" class="form-control" 
                            value="<?php echo $address?>">
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-4">
                          <label for="" class="font-weight-bold">Password:</label>
                          <div class="form-group">
                            <input type="password" class="form-control" 
                            value="<?php echo $password ;?>">
                          </div>
                        </div>
                        <div class="col-md-4">
                          <label for="" class="font-weight-bold">Created Date:</label>
                          <div class="form-group">
                            <input type="text" class="form-control" 
                            data-provide="datepicker" 
                            value="<?php echo date("d-m-Y", strtotime($created_at)); ?>">
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group text-right" style="margin-top: 33px;">
                            <button type="submit" class="btn btn-success px-5 font-weight-bold">Save Profile</button>
                          </div>
                        </div>
                      </div>
                      </form>
                      <!-- <div class="row">
                      	<div class="col-md-12 text-right">
                      		<div class="form-group">
                      			<form action="" method="POST" class="form-inline">
		                        	<input type="hidden" name="delete_id" 
		                        		value="<?php echo $_SESSION['resturant_id'];?>">
		                        	<button type="submit" name="delete_account" 
		                        	class="btn btn-danger px-4 mt-4  font-weight-bold">
		                        Delete Account</button>
	                        </form>
                      		</div>
                      	</div>
                      </div> -->
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </section>
          <!-- Page Footer-->
		<?php
			if (isset($_POST['delete_account'])) {
            $delete_id=mysqli_real_escape_string($con , $_POST['delete_id']);
            if (empty($delete_id)) {
               ?>
                  <script>
                      sweetAlert(
                          {
                              title: "Somthing went wrong...!",
                              text: "Just wait for a Second",
                              type: "error"
                          },
                          function () {
                              window.location.href = 'resturant.php';
                          });
                  </script>
                <?php
            }
            else{
              $query="DELETE FROM register WHERE id=$delete_id ";
              $run=mysqli_query($con , $query);
              if (isset($_SESSION['resturant']))
				{
					unset($_SESSION['login_type']);
            		unset($_SESSION['resturant_id']);
					unset($_SESSION['resturant']);
					session_destroy();
                  ?>
                  <script>
                      swal({
						title: "Are you sure?",
						text: "Once deleted, you will not be able to recover this imaginary file!",
						icon: "warning",
						buttons: true,
						dangerMode: true,
						})
						.then((willDelete) => {
						if (willDelete) {
						    swal("Poof! Your imaginary file has been deleted!", {
						      icon: "success",
						    });
						    window.location.href='../index.php'
						} else {
						    swal("Your imaginary file is safe!");
						  }
						});
                  </script>
                <?php
              }
            }
        }
	?>
<?php include 'pages/footer.php';?>
