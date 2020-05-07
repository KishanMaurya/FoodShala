<?php include 'pages/navbar.php'; ?>
<div id="about" class="container my-5">
  <div class="row">
    <div class="col-sm-8">
      <h2 class="text-secondary">About FoodShala Page</h2><br>
      <h4 class="text-secondary">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</h4><br>
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
      <br><button class="btn btn-default btn-lg">Get in Touch</button>
    </div>
    <div class="col-sm-4">
      <div class="card bg-white border-0 boxShadow">
      	<div class="card-body content_img">
      		<img src="img/kishan.jpeg" class="rounded" alt="" width="100%">
      		<div class="text-center mt-1 font-weight-bold text-secondary">Kishan Maurya </div>
      		<p class="text-center  text-secondary font-italic">Professional Software Developer</p>
      	</div>
      </div>
    </div>
  </div>
</div>
<!-- Container (Contact Section) -->
<div id="contact" class="container bg-grey my-5 rounded" style="margin-bottom: 100px !important;">
  <div class="card shadow-lg border-0" style="border-radius: 25px;
">
  	<div class="card-body">
  		<h2 class="text-left ml-5 text-secondary pb-3">
  			<span class="badge-pill headtext">CONTACT <i class="far fa-paper-plane"></i></span>
  		</h2>
		  <div class="row justify-content-center">
		    <div class="col-sm-3">
		      <h5 class="text-secondary">
		      Contact us and we'll get back to you within 24 hours.</h5>
		      <p><span class="glyphicon glyphicon-map-marker"></span> Pune, IN</p>
		      <p class="badge badge-pill bg-info text-whites">
		      	<i class="fas fa-mobile-alt"></i> +91 9598608579</p>
		      <p><i class="far fa-envelope mr-2"></i> fullstack49kishan@gmail.com</p>
		    </div>
		    <div class="col-md-2"></div>
		    <div class="col-sm-5 slideanim">
		    <form action="" method="POST">
			      <div class="row">
			        <div class="col-sm-6 form-group">
			          <input type="text" class="form-control" id="contact_name" name="name" placeholder="Name"  required autofocus>
			        </div>
			        <div class="col-sm-6 form-group">
			          <input type="email" class="form-control" name="email" id="contact_email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" title="Please Enter Currect Email.." placeholder="Email"  required>
			        </div>
			      </div>
			      <textarea class="form-control" id="comments" name="comments" placeholder="Comment" rows="5"></textarea><br>
			      <div class="row">
			        <div class="col-sm-12 form-group text-right">
			          <button class="btn btn-outline-secondary px-4 font-weight-bold py-1" name="mail" type="submit">Send <i class="far fa-paper-plane"></i></button>
			        </div>
			      </div>
			</form>
		    </div>
		</div>
  	</div>
  </div>
</div>
<div class="container my-5 mt-5">
	<div class="row">
		<div class="col-md-12"></div>
	</div>
</div>

<?php include 'pages/footer.php';


		   if (isset($_POST['mail'])) {

			   $mailto = $_POST['name'];
			   $mailSub = $_POST['email'];
			   $mailMsg = $_POST['comments'];
			   $timezone  = -7.5; //(GMT +5:30) IST (INDIA. & KOLKATA )
               $currentTime= gmdate("Y/m/j H:i:s", time() + 3600*($timezone+date("I")));
               $cust="INSERT INTO `contact` (name,email,massage,created_at) VALUES ('$mailto','$mailSub','$mailMsg','$currentTime')";
            	mysqli_query($con,$cust);

			   require 'PHPMailer-master/PHPMailerAutoload.php';
			   $mail = new PHPMailer();
			   $mail ->IsSmtp();
			   $mail ->SMTPDebug = 0;
			   $mail ->SMTPAuth = true;
			   $mail ->SMTPSecure = 'ssl';
			   $mail ->Host = "smtp.gmail.com";
			   $mail ->Port = 465; // or 578
			   $mail ->IsHTML(true);
			   $mail ->Username = "useremail@gmail.com";
			   $mail ->Password = "password";
			   $mail ->SetFrom("useremail@gmail.com");
			   $mail ->Subject = $mailSub;
			   $mail ->Body ='
					<!DOCTYPE html>
					<html lang="en">
					<head>
						<meta charset="UTF-8">
						<title>massage</title>
					</head>
					<body>
						<h3></h3>
						<p class="text-danger">Thank you '.$mailto.' for contact us.</p>
						<p class="text-dark">Regards:</p>
						<p>FoodShala</p>
						<p>+91 9598608579</p>
					</body>
					</html>
			   ';
			   $mail ->AddAddress($mailto);

			   if(!$mail->Send())
			   {
			    ?>
					<script>
						swal("Mail Not Send", "You clicked the button!", "error");
					</script>
		 		<?php
			   }
			   else
			   {
			      ?>
			      <script>
			        sweetAlert(
			              {
			                  title: "Thanks for contact us..Please check your mail.",
			                  text: "Just wait for the email!",
			                  type: "success"
			              },

			          function () {
			              window.location.href = 'about.php';
			          });
			      </script>
			    <?php
			   }
		}

	?>
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
                  ?>
                    <script>
                      sweetAlert(
                        {
                          title: "UserName Or Password is Incorrect.! Resturant",
                          text: "Just wait for a Second",
                          type: "error"
                        },
                        function () {
                          window.location.href = './index.php';
                        });
                  </script>
                <?php
              }
            }
            else{
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