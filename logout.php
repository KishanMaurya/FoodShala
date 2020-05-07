<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Admin Logout...!</title>
	<script type='text/javascript' src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/0.4.2/sweet-alert.min.js"></script>
		<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/0.4.2/sweet-alert.css">
</head>
<body>
	<?php
	

	if (isset($_SESSION['resturant']))
	{
		unset($_SESSION['resturant']);
		unset($_SESSION['login_type']);
		unset($_SESSION['preference']);
		unset($_SESSION['customer_id']);
		session_destroy();
		?>
			<script>
				sweetAlert(
						{
							title: "Logout ! Now You are free private Browsing...!!",
							text: "Just wait for a Second",
							type: "success"
						},
						function () {
						window.location.href = 'index.php';
				});
			</script>
		<?php
		exit();
	}
?>
</body>
</html>
