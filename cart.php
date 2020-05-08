<?php
include 'config/db_config.php';
	session_start();

	extract($_REQUEST);
	
	$gtotal=array();
	$ar=array();
	$total=0;
	if(isset($_GET['product']))//product id
	{
		$product_id=$_GET['product'];
	}
	else
	{
		$product_id="";
	}
 	if(isset($_SESSION['customer_id']))
 	{
 		$cust_id=$_SESSION['customer_id'];
 		$qq=mysqli_query($con,"select * from register where id=$cust_id ");
		$qqr= mysqli_fetch_array($qq);
 	}
	if(empty($cust_id))
	{
		// header("location:index.php?msg=you must login first");
		?>
			<script>
				sweetAlert(
                    {
                        title: "you must be login first",
                        text: "Just wait for a Second",
                        type: "success"
                        },
                        function () {
                           window.location.href = 'index.php';
                    });
			</script>
		<?php
	}
	if(!empty($product_id && $cust_id ))
	{
		$query="INSERT INTO `cart` (product_id,register_id) value ('$product_id','$cust_id')";
		$run=mysqli_query($con,$query);
		echo $run;
		if($run>0)
		{
			$product_id="";
			?>
			<script>
				sweetAlert(
                    {
                        title: "Successfully Added One !",
                        text: "Just wait for a Second",
                        type: "success"
                        },
                        function () {
                           window.location.href = 'cart.php';
                    });
			</script>
		<?php

		}
		else
		{
			echo "failed";
		}
	}
	if(isset($del))
	{
		// echo $cust_id;
		// echo $del;
		$delQuery="DELETE FROM cart WHERE cart_id=$del AND register_id=$cust_id ";
		$run=mysqli_query($con,$delQuery);
		// echo $run;
		// dd();
		if($run>0)
		{
			header('location:deletecart.php');
		}
	
	}
 
 
if(isset($logout))
{
	session_destroy(); 
	header("location:index.php");
}
if(isset($login))
{
	session_destroy(); 
	header("location:index.php");
}
 
//update section
$cust_details=mysqli_query($con,"SELECT * FROM register WHERE id=$cust_id ");
$det_res=mysqli_fetch_array($cust_details);
$name=$det_res['name'];
$email=$det_res['email'];
$mobile=$det_res['phone'];
$password=$det_res['password'];
if(isset($update))
{
	   
	if(mysqli_query($con,"UPADTE register SET name='$name',phone='$mobile',password='$pswd' WHERE id=$cust_id"))
    {
		header("location:customerupdate.php");
	}
}
  
$query=mysqli_query($con,"SELECT product.p_name,product.p_category,product.p_price,product.p_description,product.p_title,product.p_image,cart.cart_id,cart.product_id,cart.register_id FROM product INNER JOIN cart ON product.p_id=cart.product_id WHERE cart.register_id=$cust_id" );
	$re=mysqli_num_rows($query);
  
?>



	 <script>
		  function del(id)
		  {
			  if(confirm('are you sure you want to cancel order')== true)
			  {
				  window.location.href='cancelorder.php?id=' +id;
			  }
		  }
		</script>


<?php include 'pages/navbar.php';?>
<div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-10">
      	<div class="middle" style="  padding:60px;  width:100%;">
       <!--tab heading-->
	   <ul class="nav nav-tabs nabbar_inverse bg-info InlineSet" id="myTab" style="border-radius:10px 10px 10px 10px;" role="tablist">
          <li class="nav-item">
             <a class="nav-link active" style="color:#BDDEFD;" id="viewitem-tab" data-toggle="tab" href="#viewitem" role="tab" aria-controls="viewitem" aria-selected="true">View Cart</a>
          </li>
          <li class="nav-item">
              <a class="nav-link" style="color:#BDDEFD;" id="manageaccount-tab" data-toggle="tab" href="#manageaccount" role="tab" aria-controls="manageaccount" aria-selected="false">Account Settings</a>
          </li>
		  <li class="nav-item">
              <a class="nav-link" style="color:#BDDEFD;" id="orders-tab" data-toggle="tab" href="#orders" role="tab" aria-controls="orders" aria-selected="false">Orders</a>
          </li>
		  
       </ul>
	   <br><br>
	<!--tab 1 starts-->   
	<div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="viewitem" role="tabpanel" aria-labelledby="home-tab">
            <table class="table table-bordered text-center TableResponsive">
                <tbody>
	        	    <?php
	                	$query=mysqli_query($con,"SELECT product.p_name,product.p_category,product.p_price,product.p_description,product.p_title,product.p_image,cart.cart_id,cart.product_id,cart.register_id FROM product INNER JOIN cart ON product.p_id=cart.product_id WHERE cart.register_id=$cust_id");
	                	$re=mysqli_num_rows($query);
	                	
	                   	if($re)
	                    {
		                	while($res=mysqli_fetch_array($query))
		                  	{
				                
	                		?>
                      <tr class="font-weight-bold">
                         <td>
                         	<img class="rounded img-thumbnail" 
                         	src="Resturant/img/<?php echo $res['p_image'];?>" height="100px" width="100px">
                         </td>
                         <td class="grand"><?php echo $res['p_name'];?></td>
                         <td class="grand"><i class="fas fa-rupee-sign">
                         	<?php echo $res['p_price'];?></td>
                         <td class="grand"><?php echo $res['p_title'];?></td>
		                <form method="POST" enctype="multipart/form-data">
                           <td>
                           <button type="submit" name="del"  value="<?php echo $res['cart_id']?>" class="btn btn-danger btn-sm px-3 grand">Delete</button>
                       	</td>
                        </form>
                        <?php 
                        	$total=$total+$res['p_price'];
                         	$gtotal[]=$total;  
                        ?>
                      </tr> 
                   <?php
	                }
					?>
					<tr>
						<td colspan="2">
					  		<h5 style="color:red;" class="grand">Grand Total</h5>
					  	</td>
					  	<td>
					  		<h5 class="grand"><i class="fas fa-rupee-sign"></i>&nbsp;
					  			<?php echo end($gtotal); ?>
					  		</h5>
					  	</td>
					  	<td colspan="3" style="padding:30px; text-align:center;">
					  		<a href="order.php?cust_id=<?php echo $cust_id; ?>">
					  			<button type="button" style=" color:white; font-weight:bold; text-transform:uppercase;" class="btn btn-primary 
					  			Process-to-check">
					  			Proceed to checkout
					  			</button>
					  		</a>
					  	</td>
					</tr>
						
					<?php
	
	                }
					else
					{
						  
	                ?>
						<tr>
							<button type="button" class="btn btn-outline-success">
								<a href="index.php" style="color:green; text-decoration:none;">No Items In cart Let's Shop Now</a>
							</button>
						</tr>
					<?php
					}
				?>
                 </tbody>
	    	</table>	
			<span style="color:green; text-align:centre;">
				<?php if(isset($success)) { echo $success; }?></span>
    	</div>	 
	  
		<!--tab 1 ends-->	   
		<!--tab 2 starts-->
        <div class="tab-pane fade" id="manageaccount" role="tabpanel" aria-labelledby="manageaccount-tab">
			<form method="post" enctype="multipart/form-data">
                <div class="form-group">
                      <label for="name">Name</label>
                      <input type="text" id="name" value="<?php if(isset($name)){ echo $name;}?>" class="form-control" name="name" required="required"/>
                </div>	
				<div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" value="<?php if(isset($email)){ echo $email;}?>" class="form-control"  readonly/>
                </div>
				<div class="form-group">
                      <label for="mobile">Mobile</label>
                      <input type="text" id="mobile" class="form-control" name="mobile" 
                      pattern="[6-9]{1}[0-9]{2}[0-9]{3}[0-9]{4}" value="<?php if(isset($phone)){ echo $phone;}?>" placeholder="" required>
                </div>
					
                <div class="form-group">
                      <label for="pwd">Password:</label>
                     <input type="password" name="pswd" value="<?php if(isset($password)) { echo $password; }?>"class="form-control"  id="pwd" required/>
                </div>
                <button type="submit" name="update" style="background:#ED2553; border:1px solid #ED2553;" class="btn btn-primary">Update</button>
                <div class="footer" style="color:red;">
                	<?php if(isset($ermsg)) { echo $ermsg; }?>
                	<?php if(isset($ermsg2)) { echo $ermsg2; }?>
                </div>
			</form>
		</div>
		<!--tab 2 ends-->
		<!--tab 3 starts-->
        <div class="tab-pane fade" id="orders" role="tabpanel" aria-labelledby="orders-tab">
			<table class="table table-bordered TableResponsive">
			<th>Order Number</th>
			<th>Item Name</th>
			<th>Price</th>
			<th>Cancel order</th>
				<tbody>
					<?php
						$quer_res=mysqli_query($con,"select * from orders where order_id=$cust_id");
						while($roww=mysqli_fetch_array($quer_res))
						{   
				        	$fid=$roww['product_id'];
				        	$qr=mysqli_query($con,"select * from product where p_id='$fid'");
							$qrr=mysqli_fetch_array($qr);
					?>
					<tr>
					<td><?php echo $roww['order_id']; ?></td>
					<?php
						if(empty($qrr['p_name']))
					   	{
							?>
							<td><span style="color:red;">Product Not Available Now</span></td>
							<?php
						}
						else
						{
							?>
							<td><?php echo $qrr['p_name']; ?></td>
							<?php
						}
					?>  
					<td><?php echo $qrr['p_price']; ?></td>
					<td>
						<a href="#" onclick="del(<?php echo $roww['order_id'];?>);">
						<button type="button" class="btn btn-danger">Cancel Order</button>
					</a>
					</td>
					</tr>
					<?php
					}
					?>  
				</tbody>
			</table>
		</div>
		<!--tab 3 ends-->
	  </div>
</div>
      </div>
    </div>
</div>  
  
	  
<?php include("pages/footer.php");?>

   
</body>
</html>