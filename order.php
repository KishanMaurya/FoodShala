<?php
session_start();
include 'config/db_config.php';
$cust_id=$_GET['cust_id'];


$reg_id=$_SESSION['customer_id'];
$timezone  = -7.5; //(GMT +5:30) IST (INDIA. & KOLKATA )
$currentTime= gmdate("Y/m/j H:i:s", time() + 3600*($timezone+date("I")));
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Order...!Page</title>
  <link rel="icon" href="img/p2.png" sizes="16x16">
  <script type='text/javascript' src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/0.4.2/sweet-alert.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/0.4.2/sweet-alert.css">
</head>
<body>
<?php

$query=mysqli_query($con,"SELECT product.p_id,product.p_name,product.p_category,product.p_price,product.p_description,product.p_title,product.p_image,cart.cart_id,cart.product_id,cart.register_id 
	FROM product 
	INNER JOIN cart ON 
	product.p_id=cart.product_id 
	WHERE cart.register_id=$cust_id ");

$re=mysqli_num_rows($query);

while($row=mysqli_fetch_array($query))
{
	$cart_id=$row['cart_id'];
	$prod_id=$row['p_id'];
	$p_price=$row['p_price'];
	
	$Query="INSERT INTO `orders` (cart_id,product_id,customer_id,payment,created_at) VALUES ('$cart_id','$prod_id','$reg_id','$p_price','$currentTime')";
	$run=mysqli_query($con,$Query);
	
	if($run>0)
	{
		$q="DELETE FROM cart WHERE cart_id=$cart_id ";
		$r=mysqli_query($con,$q);
		if($r>0)
		{
			?>
			<script>
				sweetAlert(
						{
							title: "Horray..!Successfull Your Order .! Enjoy Your order",
							text: "Just wait for a Second",
							type: "success"
						},
						function () {
						window.location.href = 'cart.php';
				});
			</script>
		<?php
		}
	}
	else
	{
		echo "failed";
	}
}
?>