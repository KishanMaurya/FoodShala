<?php 
session_start(); 
include 'db_config.php'; 
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>FoodShala Homepage</title>

  <link rel="stylesheet" href="include/css/main.css">
  <link rel="stylesheet" href="include/css/bootstrap.css">
  <link rel="stylesheet" href="include/css/bootstrap.min.css">
  <link rel="icon" href="img/p2.png" sizes="20x20" width="20" height="20">
  <script type='text/javascript' src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/0.4.2/sweet-alert.min.js"></script>
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/0.4.2/sweet-alert.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script>
    $(document).ready(function(){
      $('[data-toggle="tooltip"]').tooltip();   
    });
  </script>
</head>
<body>
<?php 
if (!isset($_SESSION['resturant'])) 
{
  ?>
    <script>
        sweetAlert(
            {
              title: "Your Session is Out , Please Goto Login!",
              text: "Just wait for a Second",
              type: "success"
            },
            function () {
            window.location.href = '../index.php';
        });
      </script>
  <?php
  exit();
}
?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container-fluid">
      <a class="navbar-brand" href="../index.php" class="font-weight-bold text-uppercase text-info">
        <img src="img/p2.png" alt="" width="50" height="50" class="imgSetIcon">
      <span class="text-info font-weight-bold white-Shadow">FoodShala</span></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav mr-auto text-uppercase font-weight-bold mx-5">
          <li class="nav-item active">
            <a class="nav-link" href="../index.php" data-toggle="tooltip" data-placement="bottom" title="Home !">
              <i class="fas fa-home"></i> 
              <span class="sr-only">(current)</span>
            </a>
          </li>
        </ul>
        <ul class="navbar-nav ml-auto text-uppercase">
          <?php
            if (!isset($_SESSION['resturant'])) {
              ?>
                <li class="nav-item">
                  <a class="nav-link btn btn-success btn-sm font-weight-bold text-white p-1 px-3" href="login.php" data-toggle="modal" data-target="#myModal">Login</a>
                  </li>
                  <li class="nav-item mx-3">
                    <a class="nav-link btn btn-primary btn-sm font-weight-bold text-white p-1 px-3" href="register.php">Register</a>
                </li>
              <?php
            }
            else{
              ?>
                <li class="nav-item dropdown bg-dark font-normal">
                  <a class="nav-link dropdown-toggle text-white font-weight-bold bg-info" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-user-tie mx-2" style="font-size: 25px;"></i> 
                    <?php echo $_SESSION['resturant'];?>
                  </a>
                  <div class="dropdown-menu bg-info" aria-labelledby="navbarDropdown">
                      <a class="dropdown-item text-white linkHover bg-info" href="#">
                        <i class="fas fa-user px-1"></i> <?php echo $_SESSION['login_type'];?>
                      </a>  
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item text-white linkHover bg-info" href="customer.php"><i class="fas fa-address-card px-1"></i> Profile</a>
                      <a class="dropdown-item text-white linkHover bg-info" href="../cart.php">
                        <i class="far fa-chart-bar px-1"></i> View Order</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item text-white linkHover bg-info" href="../logout.php"> <i class="fas fa-sign-out-alt"></i> Logout  </a>
                  </div>
                </li>
              <?php
            }
          ?>
        </ul>
      </div>
    </div>
  </nav>