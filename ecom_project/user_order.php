<?php

error_reporting(0);

session_start();

$conn = mysqli_connect("localhost", "root", "", "php_ecom");

$my_email = $_SESSION['user_email'] ?? '';

$user_email = $_GET['email'];

if($my_email)

{
	$sql = "SELECT * FROM orders WHERE email='$my_email'";

	$result = mysqli_query($conn, $sql);

}

else if($user_email)

{
	$sql = "SELECT * FROM orders WHERE email='$user_email'";

	$result = mysqli_query($conn, $sql);

}

else 
{
	header("location:home/login.php");
}


?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>My Orders</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

	<nav>
		<input type="checkbox" id="check">
		<label for="check" class="checkbtn">
			<i class="fa fa-bars"></i>
		</label>
		<label class="my_logo">My Ecom</label>
		<ul>
			<li><a href="#">Home</a></li>
			<li><a href="#">Products</a></li>
			<li><a href="#">Contacts</a></li>
			<?php 
			if (!empty($_SESSION['user_email'])): ?>

				<a class="logout_btn" href="user_order.php?email=<?php echo $_SESSION['user_email'] ?>">Orders</a>


				<a class="logout_btn" href="logout.php">Logout</a>

			<?php 

		else: ?>
				<li><a href="home/register.php">Register</a></li>
				<li><a href="home/login.php">Login</a></li>
			<?php endif; ?>
		</ul>
	</nav>

	<table border="1" cellpadding="10" cellspacing="0">
		<tr>
			<th>Product Title</th>
			<th>Price</th>
			<th>Image</th>
		</tr>

		<?php

		while($row = mysqli_fetch_assoc($result))

		{

			?>


			<tr>
				<td><?php echo $row['title']?></td>
				<td><?php echo $row['price']?></td>
				<td>
					<img width="100"height="100" src="product_image/<?php echo $row['image']?>">
				</td>
			</tr>



			<?php

		} 



		?>


	</table>

</body>
</html>
