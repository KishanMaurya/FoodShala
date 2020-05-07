<?php include 'config/db_config.php'; session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Login...!Page</title>
  <link rel="icon" href="img/p2.png" sizes="16x16">
  <script type='text/javascript' src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/0.4.2/sweet-alert.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/0.4.2/sweet-alert.css">
</head>
<body>
<?php
          
                      
        if(isset($_POST['login'])) {
            $usertype=mysqli_real_escape_string($con,$_POST['usertype']);//for cutomer only
            $prefer=mysqli_real_escape_string($con,$_POST['prefer']);
            $username=mysqli_real_escape_string($con,$_POST['email']);
            $password=mysqli_real_escape_string($con,$_POST['password']);
            $hashpass=md5($password);
            if ($usertype == 'Customer') {
                $query="SELECT * FROM register WHERE email='$username' AND password='$hashpass' AND res_type='$prefer'";
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
                            title: "Welcome to Resturant...! Customer",
                            text: "Just wait for a Second",
                            type: "success"
                          },
                          function () {
                            window.location.href = 'index.php';
                          });
                    </script>
                  <?php
                  }else{
                    unset($_SESSION['resturant']);
                    unset($_SESSION['login_type']);
                    unset($_SESSION['preference']);
                    unset($_SESSION['customer_id']);
                    session_destroy();
                    ?>
                      <script>
                      sweetAlert(
                        {
                          title: "UserName Or Password is Incorrect.! Customer",
                          text: "Just wait for a Second",
                          type: "error"
                        },
                        function () {
                          window.location.href = 'index.php';
                        });
                  </script>
                  <?php
                }
            }
            elseif ($usertype == 'Resturant') {
              $query="SELECT * FROM register WHERE email='$username' AND password='$hashpass'";
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
                          title: "Welcome to Resturant...!",
                          text: "Just wait for a Second",
                          type: "success"
                        },
                        function () {
                          window.location.href = 'index.php';
                        });
                  </script>
                <?php
                }else{
                  unset($_SESSION['resturant']);
                  unset($_SESSION['login_type']);
                  unset($_SESSION['preference']);
                  unset($_SESSION['customer_id']);
                  session_destroy();
                  ?>
                    <script>
                      sweetAlert(
                        {
                          title: "UserName Or Password is Incorrect.! Resturant",
                          text: "Just wait for a Second",
                          type: "error"
                        },
                        function () {
                          window.location.href = 'index.php';
                        });
                  </script>
                <?php
              }
            }
            else{
              unset($_SESSION['resturant']);
              unset($_SESSION['login_type']);
              unset($_SESSION['preference']);
              unset($_SESSION['customer_id']);
              session_destroy();
              ?>
                <script>
                      sweetAlert(
                        {
                          title: "Please Check your connection..",
                          text: "Just wait for a Second",
                          type: "error"
                        },
                        function () {
                          window.location.href = 'index.php';
                        });
                  </script>
              <?php
            }
          }
        ?>