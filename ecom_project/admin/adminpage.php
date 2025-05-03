<?php


	session_start();

		if(!isset($_SESSION['user_email']))
		{

			header("location:../home/login.php");

		}



	else if($_SESSION['usertype']=="user")
	{
		header("location:../home/login.php");
	}



?>



<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>

	<link rel="stylesheet" type="text/css" href="admin_style.css">
</head>
<body>

	<div class="wrapper">
		
		<div class="sidebar">
			
			<h2>Ecom Admin</h2>

			<ul>
				<li>
					<a href="adminpage.php">Dashboard</a>
				</li>

				<li>
					<a href="users.php">Users</a>
				</li>

				<li>
					<a href="add_product.php">Add products</a>
				</li>

				<li>
					<a href="display_product.php">View Products</a>
				</li>

				<li>
					<a href="all_orders.php">Orders</a>
				</li>

			</ul>

		</div>

		<div class="header">
			<div class="admin_header">
				<a href="../logout.php">Logout</a>
			</div>

			<div class="info">
				<p>gibberish text to use in web pages, site templates and in typography demos. Get rid of Lorem Ipsum forever. A tool for web designers who want to save time.
				</p>
				
			</div>
			
		</div >

	</div>

</body>
</html>