<?php
  include 'config/db_config.php';
  session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>FoodShala | Resgister Page.!</title>
  <link href="css/main.css" rel="stylesheet">
  
  <link rel="stylesheet" href="include/css/bootstrap.css">
  <link rel="stylesheet" href="include/css/bootstrap.min.css">
  <link rel="icon" href="img/p2.png" sizes="16x16">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
</head>

<body>

  <!-- Navigation -->
  <?php include 'pages/navbar.php' ?>

  <!-- Page Content -->
  <div class="container mt-5">
    <div class="row">
      <div class="col-md-12">
        <div class="card shadow-md">
          <div class="card-body bg-info">
            <h2 class="text-white text-uppercase mx-4 ">
              <i class="fas fa-users mx-3"></i>
               Register Here
              <i class="far fa-hand-point-right ml-4"></i>
            </h2>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="container">

    <div class="row justify-content-center">

          <div class="col-lg-4 mt-5 card-1">
            <a href="#" class="btn rounded hover:opacity-75 " data-toggle="modal" data-target="#myModal1">
              <div class="card shadow-lg card-1">
              <div class="card-body bg-info card-1">
                <h2 class="p-5 text-center text-white">
                  CUSTOMER
                </h2>
              </div>
            </div>
            </a>
          </div>
          <div class="col-md-4 mt-5">
           <a href="resturant.php" class="btn" data-toggle="modal" data-target="#myModal2">
             <div class="card shadow-lg rounded card-2">
              <div class="card-body bg-info card-2">
                <h2 class="p-5 text-center text-white">
                  RESTURANT
                </h2>
              </div>
            </div>
           </a>
          </div>
      </div>
      <!-- /.col-lg-9 -->

    <!-- /.row -->

  </div>
  <!-- /.container -->

  <!-- Footer -->
  <?php include 'pages/footer.php'; ?>
  
  <!---modal form Customer Register--->

    <div id="myModal1" class="modal fade" role="dialog">
      <div class="modal-dialog modal-md">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header bg-info">
            <h4 class="modal-title text-white">Customer Register</h4>
            <button type="button" class="close text-white" data-dismiss="modal">&times;</button>
          </div>
          <form action="#" method="POST">
            <div class="modal-body">
              <div class="row">
                <div class="col-md-6">
                  <label for="" class="font-weight-bold">Name:</label>
                  <div class="form-group">
                    <input type="text" name="name" class="form-control" placeholder="Enter the Name.." required="required" autofocus>
                  </div>
                  <label for="" class="font-weight-bold">Phone:</label>
                  <div class="form-group">
                    <input type="text" name="phone" class="form-control" placeholder="Enter the Phone.." required="required">
                  </div>
                  <label for="Preference">Preference:</label>
                  <div class="form-group">
                    <select name="Preference" id="Preference" class="form-control" required="">
                      <option value="">Select Preference..</option>
                      <option value="veg">Veg</option>
                      <option value="nonveg">NonVeg</option>
                    </select>
                  </div>
                  
                </div>
                <div class="col-md-6">
                  <label for="" class="font-weight-bold">Email:</label>
                  <div class="form-group">
                    <input type="email" class="form-control" name="email" placeholder="Enter the Email.." required="required" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" title="Please Enter Currect Email..">
                  </div>
                  <label for="" class="font-weight-bold">Address:</label>
                  <div class="form-group">
                    <input type="text" class="form-control" name="address" placeholder="Enter the Address.." required="required">
                  </div>
                  <label for="" class="font-weight-bold">Password:</label>
                  <div class="form-group">
                    <input type="password" name="password" class="form-control" placeholder="Enter the Password.." required="required">
                  </div>
                  
                </div>
              </div>
                <div class="form-group text-right">
                    <button type="submit" name="Customer" class="btn btn-success font-weight-bold p-1 px-3">Register</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>


 <!---modal form Resturant Register--->

    <div id="myModal2" class="modal fade" role="dialog">
      <div class="modal-dialog modal-md">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header bg-info">
            <h4 class="modal-title text-white">Resturant Register</h4>
            <button type="button" class="close text-white" data-dismiss="modal">&times;</button>
          </div>
          <form action="#" method="POST">
           
              <div class="card shadow-lg">
                <div class="card-body">
                  <div class="modal-body">
                    <div class="row">
                      <div class="col-md-6">
                        <label for="" class="font-weight-bold">Name:</label>
                        <div class="form-group">
                          <input type="text" name="name" class="form-control" placeholder="Enter the Name.." required="required" autofocus>
                        </div>
                        <label for="" class="font-weight-bold">Phone:</label>
                        <div class="form-group">
                          <input type="text" name="phone" class="form-control" placeholder="Enter the Phone.." required="required">
                        </div>
                        <label for="" class="font-weight-bold">Password:</label>
                        <div class="form-group">
                          <input type="password" name="password" class="form-control" placeholder="Enter the Password.." required="required">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <label for="" class="font-weight-bold">Email:</label>
                        <div class="form-group">
                          <input type="email" class="form-control" name="email" placeholder="Enter the Email.." required="required" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" title="Please Enter Currect Email..">
                        </div>
                        <label for="" class="font-weight-bold">Address:</label>
                        <div class="form-group">
                          <input type="text" class="form-control" name="address" placeholder="Enter the Address.." required="required">
                        </div>
                        <div class="form-group mt-5 text-center">
                          <button type="submit" name="resturant" class="btn btn-block btn-success font-weight-bold">Register</button>
                        </div>
                      </div>
                    </div>
                  </div>
              </div>
            </div>
          
          <!-- <div class="modal-footer">
            <button type="button" class="btn btn-dark btn-sm font-weight-bold" data-dismiss="modal">Close</button>
          </div> -->
          </form>
        </div>

      </div>
    </div>
      
      <!-- start php script -->

      <?php

      //Customer register start

       if (isset($_POST['Customer'])) {
          $name=mysqli_real_escape_string($con , $_POST['name']);
          $email=mysqli_real_escape_string($con , $_POST['email']);
          $phone=mysqli_real_escape_string($con , $_POST['phone']);
          $address=mysqli_real_escape_string($con , $_POST['address']);
          $Preference=mysqli_real_escape_string($con , $_POST['Preference']);
          $password=mysqli_real_escape_string($con , $_POST['password']);
          $hashpassword=md5($password);//encrypt password..
          
          //email valid check
          $match="SELECT * FROM `register` WHERE email='$email'";
          $execute=mysqli_query($con,$match);
          $row=mysqli_fetch_array($execute);
          if ($row['email'] === $email) {
              ?>
                  <script>
                      sweetAlert(
                          {
                              title: "Email allready taken..! Please try other one.",
                              text: "Just wait for a Second",
                              type: "error"
                          },
                          function () {
                              window.location.href = 'register.php';
                          });
                  </script>
              <?php
          }
          else{
            $timezone  = -7.5; //(GMT +5:30) IST (INDIA. & KOLKATA )
            $currentTime= gmdate("Y/m/j H:i:s", time() + 3600*($timezone+date("I")));
            // echo dd();
            $user_type="Customer";
            $cust="INSERT INTO `register` (name,email,phone,address,res_type,password,created_at) VALUES ('$name','$email','$phone','$address','$Preference','$hashpassword','$currentTime')";
            mysqli_query($con,$cust);

            $query="SELECT * FROM register WHERE email='$email' AND password='$hashpassword' AND res_type='$Preference'" ;
            $run=mysqli_query($con,$query);
            $row=mysqli_fetch_array($run);
            if (mysqli_num_rows($run) == 1) {
                $_SESSION['resturant']=$row['name'];
                $_SESSION['customer_id']=$row['id'];
                $_SESSION['preference']=$row['res_type'];
                $_SESSION['login_type']='Customers';
                ?>
                  <script>
                    sweetAlert(
                        {
                            title: "Resgister Successfull Cheers...!",
                            text: "Just wait for a Second",
                            type: "success"
                        },
                        function () {
                            window.location.href = 'index.php';
                        });
                  </script>
              <?php
            }
            else{
              ?>
                <script>
                    sweetAlert(
                        {
                            title: "Please check your connection..!",
                            text: "Just wait for a Second",
                            type: "error"
                        },
                        function () {
                            window.location.href = 'register.php';
                        });
                  </script>  
              <?php
            }
          }
      }


      //Resturant register start


      if (isset($_POST['resturant'])) {
          $name=mysqli_real_escape_string($con , $_POST['name']);
          $email=mysqli_real_escape_string($con , $_POST['email']);
          $phone=mysqli_real_escape_string($con , $_POST['phone']);
          $address=mysqli_real_escape_string($con , $_POST['address']);
          $password=mysqli_real_escape_string($con , $_POST['password']);
          $hashpassword=md5($password);//encrypt password..
          
          //email valid check
          $match="SELECT * FROM `register` WHERE email='$email'";
          $execute=mysqli_query($con,$match);
          $row=mysqli_fetch_array($execute);
          if ($row['email'] === $email) {
              ?>
                  <script>
                      sweetAlert(
                          {
                              title: "Email allready taken..! Please try other one.",
                              text: "Just wait for a Second",
                              type: "error"
                          },
                          function () {
                              window.location.href = 'register.php';
                          });
                  </script>
              <?php
          }
          else{
            $timezone  = -7.5; //(GMT +5:30) IST (INDIA. & KOLKATA )
            $currentTime= gmdate("Y/m/j H:i:s", time() + 3600*($timezone+date("I")));
            // echo dd();
            $Query="INSERT INTO `register` (name,email,phone,address,password,created_at) VALUES ('$name','$email','$phone','$address','$hashpassword','$currentTime')";

           // echo dd();
            mysqli_query($con,$Query);//this method execute query..

            $query="SELECT * FROM register WHERE email='$email' AND password='$hashpassword'";
            $run=mysqli_query($con,$query);
            $row=mysqli_fetch_array($run);
            if (mysqli_num_rows($run) == 1) {
            $_SESSION['resturant']=$row['name'];
            $_SESSION['resturant_id']=$row['id'];
            $_SESSION['login_type']='Resturants';
                ?>
                  <script>
                    sweetAlert(
                        {
                            title: "Resgister Successfull Cheers...!",
                            text: "Just wait for a Second",
                            type: "success"
                        },
                        function () {
                            window.location.href = 'index.php';
                        });
                  </script>
              <?php
            }
            else{
              ?>
                <script>
                    sweetAlert(
                        {
                            title: "Please check your connection..!",
                            text: "Just wait for a Second",
                            type: "error"
                        },
                        function () {
                            window.location.href = 'register.php';
                        });
                  </script>  
              <?php
            }
          }
      }

      ?>

  