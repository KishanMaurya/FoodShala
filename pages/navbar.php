<?php 
  include 'config/db_config.php'; 
  @session_start();
  extract($_REQUEST);
  $arr=array();
  if(isset($_SESSION['customer_id']))
  {
    $cust_id=$_SESSION['customer_id'];
    $cquery=mysqli_query($con,"select * from register where id=$cust_id ");
    $cresult=mysqli_fetch_array($cquery);
    // print_r($cresult);
    // echo dd();
  }
  else
  {
    $cust_id="";
  }
  $query=mysqli_query($con,"SELECT * FROM product");
  while($row=mysqli_fetch_array($query))
  {
    $arr[]=$row['p_id'];
    shuffle($arr);
  } 

  $query="SELECT product.p_name,product.p_category,product.p_price,product.p_description,product.p_title,product.p_image,cart.cart_id,cart.product_id,cart.register_id 
  FROM product
  INNER JOIN cart ON 
  product.p_id=cart.product_id
  WHERE cart.register_id='$cust_id' ";

  $run=mysqli_query($con,$query);
  $re=mysqli_num_rows($run);

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="FoodShala is a food  service portal.">
  <meta name="author" content="Kishan Maurya">
  <meta name="keywords" content="FoodShala,Food, Restorent,Food Service,">
  <title>FoodShala Homepage</title>
  <link rel="stylesheet" href="include/css/main.css">
  <link rel="stylesheet" href="include/css/bootstrap.css">
  <link rel="stylesheet" href="include/css/bootstrap.min.css">
  <link rel="icon" href="img/p2.png" sizes="20x20" width="20" height="20">
  <script type='text/javascript' src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/0.4.2/sweet-alert.min.js"></script>
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/0.4.2/sweet-alert.css">
  <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

</head>

<body>
<?php
if (isset($addtocart)) {
    $addtocart=$_POST['addtocart'];
    if(!empty($_SESSION['customer_id']))
    {
      header("location:cart.php?product=$addtocart");
    }
    else
    {
      ?>
      <script>
        sweetAlert(
            {
              title: "Login is must ,please goto login first.!",
              text: "Just wait for a Second",
              type: "info"
            },
            function () {
            window.location.href = 'index.php';
        });
      </script>
      <?php
    }
}
?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container-fluid">
      <a class="navbar-brand" href="index.php" class="font-weight-bold text-uppercase text-info">
        <img src="img/p2.png" alt="" width="50" height="50">
      <span class="text-info font-weight-bold white-Shadow">FoodShala</span></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav mr-auto text-uppercase font-weight-bold mx-5">
          <li class="nav-item active">
            <a class="nav-link" href="index.php" data-toggle="tooltip" data-placement="bottom" title="Home !">
              <i class="fas fa-home" style="font-size: 25px;"></i> 
              <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="about.php">About</a>
          </li>
          <li class="text-center">
            <form action="" method="POST" class="form-inline" 
            style="position: relative;left: 200px;">
              <input type="text" name="search_text" id="search_text"
              class="form-control bg-dark rounded form-control-sm py-1 mt-1 text-white search" style="border-radius: 15px !important;" placeholder="Search Product by Name,">
            </form>
          </li>
        </ul>
        <ul class="navbar-nav ml-auto text-uppercase">
          <?php
            if (!isset($_SESSION['resturant'])) {
              ?>
                <li class="nav-item">
                  <a href="" class="nav-link text-white  text-white pt-1 px-5 notification" data-toggle="tooltip" data-placement="bottom" title="Cart is empty !">
                    <svg class="svg-icon text-white" style="font-size: 35px; font-weight: bold;" viewBox="0 0 24 24">
                    <path fill="none" d="M9.941,4.515h1.671v1.671c0,0.231,0.187,0.417,0.417,0.417s0.418-0.187,0.418-0.417V4.515h1.672c0.229,0,0.417-0.187,0.417-0.418c0-0.23-0.188-0.417-0.417-0.417h-1.672V2.009c0-0.23-0.188-0.418-0.418-0.418s-0.417,0.188-0.417,0.418V3.68H9.941c-0.231,0-0.418,0.187-0.418,0.417C9.522,4.329,9.71,4.515,9.941,4.515 M17.445,15.479h0.003l1.672-7.52l-0.009-0.002c0.009-0.032,0.021-0.064,0.021-0.099c0-0.231-0.188-0.417-0.418-0.417H5.319L4.727,5.231L4.721,5.232C4.669,5.061,4.516,4.933,4.327,4.933H1.167c-0.23,0-0.418,0.188-0.418,0.417c0,0.231,0.188,0.418,0.418,0.418h2.839l2.609,9.729h0c0.036,0.118,0.122,0.214,0.233,0.263c-0.156,0.254-0.25,0.551-0.25,0.871c0,0.923,0.748,1.671,1.67,1.671c0.923,0,1.672-0.748,1.672-1.671c0-0.307-0.088-0.589-0.231-0.836h4.641c-0.144,0.247-0.231,0.529-0.231,0.836c0,0.923,0.747,1.671,1.671,1.671c0.922,0,1.671-0.748,1.671-1.671c0-0.32-0.095-0.617-0.252-0.871C17.327,15.709,17.414,15.604,17.445,15.479 M15.745,8.275h2.448l-0.371,1.672h-2.262L15.745,8.275z M5.543,8.275h2.77L8.5,9.947H5.992L5.543,8.275z M6.664,12.453l-0.448-1.671h2.375l0.187,1.671H6.664z M6.888,13.289h1.982l0.186,1.671h-1.72L6.888,13.289zM8.269,17.466c-0.461,0-0.835-0.374-0.835-0.835s0.374-0.836,0.835-0.836c0.462,0,0.836,0.375,0.836,0.836S8.731,17.466,8.269,17.466 M11.612,14.96H9.896l-0.186-1.671h1.901V14.96z M11.612,12.453H9.619l-0.186-1.671h2.18V12.453zM11.612,9.947H9.34L9.154,8.275h2.458V9.947z M14.162,14.96h-1.715v-1.671h1.9L14.162,14.96z M14.441,12.453h-1.994v-1.671h2.18L14.441,12.453z M14.72,9.947h-2.272V8.275h2.458L14.72,9.947z M15.79,17.466c-0.462,0-0.836-0.374-0.836-0.835s0.374-0.836,0.836-0.836c0.461,0,0.835,0.375,0.835,0.836S16.251,17.466,15.79,17.466 M16.708,14.96h-1.705l0.186-1.671h1.891L16.708,14.96z M15.281,12.453l0.187-1.671h2.169l-0.372,1.671H15.281z"></path>
                  </svg>
                  <span class="badge cart-badge">0</span>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link btn btn-success btn-sm font-weight-bold text-white p-1 px-3 buttonLogin" href="login.php" data-toggle="modal" data-target="#myModal">Login</a>
                  </li>
                  <li class="nav-item mx-3">
                    <a class="nav-link btn btn-primary btn-sm font-weight-bold text-white p-1 px-3 buttonRegister" href="register.php">Register</a>
                </li>
              <?php
            }
            elseif($_SESSION['login_type'] == 'Resturants'){
              ?>
                <li class="nav-item dropdown bg-dark font-normal">
                  <a class="nav-link dropdown-toggle text-white font-weight-bold" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-user-tie mx-2" style="font-size: 25px;"></i> 
                    <?php echo $_SESSION['resturant'];?>
                  </a>
                  <div class="dropdown-menu bg-info" aria-labelledby="navbarDropdown">
                      <a class="dropdown-item text-white linkHover" href="#">
                        <i class="fas fa-utensils px-1"></i> <?php echo $_SESSION['login_type'];?>
                      </a>  
                      <div class="dropdown-divider"></div>
                      
                      <a class="dropdown-item text-white linkHover" href="Resturant/resturant.php">
                        <i class="fas fa-address-card px-1"></i> Profile</a>
                      <a class="dropdown-item text-white linkHover" href="Resturant/viewOrders.php">
                        <i class="far fa-chart-bar px-1"></i> View Order</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item text-white linkHover" href="logout.php">Logout  <i class="fas fa-sign-out-alt"></i></a>
                  </div>
                </li>
              <?php
            }
            elseif($_SESSION['login_type'] == 'Customers' && $_SESSION['preference']=='veg'){
              ?>
                <li class="nav-item">
                  <a href="cart.php" class="nav-link text-white  text-white pt-1 px-5 notification" data-toggle="tooltip" data-placement="bottom" title="Process to checkout !">
                    <svg class="svg-icon text-white" style="font-size: 35px; font-weight: bold;" viewBox="0 0 24 24">
                    <path fill="none" d="M9.941,4.515h1.671v1.671c0,0.231,0.187,0.417,0.417,0.417s0.418-0.187,0.418-0.417V4.515h1.672c0.229,0,0.417-0.187,0.417-0.418c0-0.23-0.188-0.417-0.417-0.417h-1.672V2.009c0-0.23-0.188-0.418-0.418-0.418s-0.417,0.188-0.417,0.418V3.68H9.941c-0.231,0-0.418,0.187-0.418,0.417C9.522,4.329,9.71,4.515,9.941,4.515 M17.445,15.479h0.003l1.672-7.52l-0.009-0.002c0.009-0.032,0.021-0.064,0.021-0.099c0-0.231-0.188-0.417-0.418-0.417H5.319L4.727,5.231L4.721,5.232C4.669,5.061,4.516,4.933,4.327,4.933H1.167c-0.23,0-0.418,0.188-0.418,0.417c0,0.231,0.188,0.418,0.418,0.418h2.839l2.609,9.729h0c0.036,0.118,0.122,0.214,0.233,0.263c-0.156,0.254-0.25,0.551-0.25,0.871c0,0.923,0.748,1.671,1.67,1.671c0.923,0,1.672-0.748,1.672-1.671c0-0.307-0.088-0.589-0.231-0.836h4.641c-0.144,0.247-0.231,0.529-0.231,0.836c0,0.923,0.747,1.671,1.671,1.671c0.922,0,1.671-0.748,1.671-1.671c0-0.32-0.095-0.617-0.252-0.871C17.327,15.709,17.414,15.604,17.445,15.479 M15.745,8.275h2.448l-0.371,1.672h-2.262L15.745,8.275z M5.543,8.275h2.77L8.5,9.947H5.992L5.543,8.275z M6.664,12.453l-0.448-1.671h2.375l0.187,1.671H6.664z M6.888,13.289h1.982l0.186,1.671h-1.72L6.888,13.289zM8.269,17.466c-0.461,0-0.835-0.374-0.835-0.835s0.374-0.836,0.835-0.836c0.462,0,0.836,0.375,0.836,0.836S8.731,17.466,8.269,17.466 M11.612,14.96H9.896l-0.186-1.671h1.901V14.96z M11.612,12.453H9.619l-0.186-1.671h2.18V12.453zM11.612,9.947H9.34L9.154,8.275h2.458V9.947z M14.162,14.96h-1.715v-1.671h1.9L14.162,14.96z M14.441,12.453h-1.994v-1.671h2.18L14.441,12.453z M14.72,9.947h-2.272V8.275h2.458L14.72,9.947z M15.79,17.466c-0.462,0-0.836-0.374-0.836-0.835s0.374-0.836,0.836-0.836c0.461,0,0.835,0.375,0.835,0.836S16.251,17.466,15.79,17.466 M16.708,14.96h-1.705l0.186-1.671h1.891L16.708,14.96z M15.281,12.453l0.187-1.671h2.169l-0.372,1.671H15.281z"></path>
                  </svg>
                  <span class="badge">
                    <?php 
                    if(isset($re)) 
                      { 
                        echo $re; 
                      }
                    ?>
                  </span>
                  </a>
                </li>
                <li class="nav-item dropdown bg-dark font-normal">
                  <a class="nav-link dropdown-toggle text-white font-weight-bold" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-user-tie mx-2" style="font-size: 25px;"></i> 
                    <?php echo $_SESSION['resturant'];?>
                  </a>
                  <div class="dropdown-menu bg-info" aria-labelledby="navbarDropdown">
                      <a class="dropdown-item text-white linkHover" href="#">
                        <i class="fas fa-user px-1"></i>
                        <?php echo $_SESSION['login_type'];?>
                      </a>
                      <div class="dropdown-divider"></div> 
                      <a href="" class="dropdown-item text-white linkHover">
                        <i class="fas fa-carrot"></i> 
                        <?php echo $_SESSION['preference'];?>
                      </a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item text-white linkHover" href="Customer/customer.php">
                        <i class="fas fa-address-card px-1"></i> Profile
                      </a>
                      <a class="dropdown-item text-white linkHover" href="cart.php">
                        <i class="far fa-chart-bar px-1"></i> View Order
                      </a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item text-white linkHover" href="logout.php">Logout  
                        <i class="fas fa-sign-out-alt"></i>
                      </a>
                  </div>
                </li>
              <?php
            }
            elseif($_SESSION['login_type'] == 'Customers' && $_SESSION['preference']=='nonveg'){
              ?>
                <li class="nav-item">
                  <a href="cart.php" class="nav-link text-white  text-white pt-1 px-5 notification" data-toggle="tooltip" data-placement="bottom" title="Process to checkout !">
                    <svg class="svg-icon text-white" style="font-size: 35px; font-weight: bold;" viewBox="0 0 24 24">
                    <path fill="none" d="M9.941,4.515h1.671v1.671c0,0.231,0.187,0.417,0.417,0.417s0.418-0.187,0.418-0.417V4.515h1.672c0.229,0,0.417-0.187,0.417-0.418c0-0.23-0.188-0.417-0.417-0.417h-1.672V2.009c0-0.23-0.188-0.418-0.418-0.418s-0.417,0.188-0.417,0.418V3.68H9.941c-0.231,0-0.418,0.187-0.418,0.417C9.522,4.329,9.71,4.515,9.941,4.515 M17.445,15.479h0.003l1.672-7.52l-0.009-0.002c0.009-0.032,0.021-0.064,0.021-0.099c0-0.231-0.188-0.417-0.418-0.417H5.319L4.727,5.231L4.721,5.232C4.669,5.061,4.516,4.933,4.327,4.933H1.167c-0.23,0-0.418,0.188-0.418,0.417c0,0.231,0.188,0.418,0.418,0.418h2.839l2.609,9.729h0c0.036,0.118,0.122,0.214,0.233,0.263c-0.156,0.254-0.25,0.551-0.25,0.871c0,0.923,0.748,1.671,1.67,1.671c0.923,0,1.672-0.748,1.672-1.671c0-0.307-0.088-0.589-0.231-0.836h4.641c-0.144,0.247-0.231,0.529-0.231,0.836c0,0.923,0.747,1.671,1.671,1.671c0.922,0,1.671-0.748,1.671-1.671c0-0.32-0.095-0.617-0.252-0.871C17.327,15.709,17.414,15.604,17.445,15.479 M15.745,8.275h2.448l-0.371,1.672h-2.262L15.745,8.275z M5.543,8.275h2.77L8.5,9.947H5.992L5.543,8.275z M6.664,12.453l-0.448-1.671h2.375l0.187,1.671H6.664z M6.888,13.289h1.982l0.186,1.671h-1.72L6.888,13.289zM8.269,17.466c-0.461,0-0.835-0.374-0.835-0.835s0.374-0.836,0.835-0.836c0.462,0,0.836,0.375,0.836,0.836S8.731,17.466,8.269,17.466 M11.612,14.96H9.896l-0.186-1.671h1.901V14.96z M11.612,12.453H9.619l-0.186-1.671h2.18V12.453zM11.612,9.947H9.34L9.154,8.275h2.458V9.947z M14.162,14.96h-1.715v-1.671h1.9L14.162,14.96z M14.441,12.453h-1.994v-1.671h2.18L14.441,12.453z M14.72,9.947h-2.272V8.275h2.458L14.72,9.947z M15.79,17.466c-0.462,0-0.836-0.374-0.836-0.835s0.374-0.836,0.836-0.836c0.461,0,0.835,0.375,0.835,0.836S16.251,17.466,15.79,17.466 M16.708,14.96h-1.705l0.186-1.671h1.891L16.708,14.96z M15.281,12.453l0.187-1.671h2.169l-0.372,1.671H15.281z"></path>
                  </svg>
                  <span class="badge">
                    <?php 
                    if(isset($re)) 
                      { 
                        echo $re; 
                      }
                    ?>
                  </span>
                  </a>
                </li>
                <li class="nav-item dropdown bg-dark font-normal">
                  <a class="nav-link dropdown-toggle text-white font-weight-bold" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-user-tie mx-2" style="font-size: 25px;"></i> 
                    <?php echo $_SESSION['resturant'];?>
                  </a>
                  <div class="dropdown-menu bg-info" aria-labelledby="navbarDropdown">
                      <a class="dropdown-item text-white linkHover" href="#">
                        <i class="fas fa-user px-1"></i>
                        <?php echo $_SESSION['login_type'];?>
                      </a>
                      <div class="dropdown-divider"></div> 
                      <a href="" class="dropdown-item text-white linkHover">
                        <i class="fab fa-the-red-yeti"></i>
                        <?php echo $_SESSION['preference'];?>
                      </a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item text-white linkHover" href="Customer/customer.php">
                        <i class="fas fa-address-card px-1"></i> Profile
                      </a>
                      <a class="dropdown-item text-white linkHover" href="cart.php">
                        <i class="far fa-chart-bar px-1"></i> View Order
                      </a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item text-white linkHover" href="logout.php">Logout  
                        <i class="fas fa-sign-out-alt"></i>
                      </a>
                  </div>
                </li>
              <?php
            }
          ?>
        </ul>
      </div>
    </div>
  </nav>