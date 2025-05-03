<?php

session_start();

error_reporting(0);

$conn = mysqli_connect("localhost","root","","php_ecom");

$sql = "SELECT *from products";

$result = mysqli_query($conn,$sql);


?>




<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>

	<link rel="stylesheet" type="text/css" href="style.css">

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>

	<nav>

		<input type="checkbox" id="check">

		<label for="check" class="checkbtn">
			<i class="fa fa-bars"></i>
		</label>


		<label class="my_logo">My Ecom</label>

		<ul>
			<li>
				<a href="#">Home</a>
			</li>

			<li>
				<a href="#">Products</a>
			</li>

			<li>
				<a href="#">Contacts</a>
			</li>

			<?php

			if ($_SESSION['user_email'])

			{

				?>

				<a class="logout_btn" href="user_order.php?email=<?php echo $_SESSION['user_email'] ?>">Orders</a>

				<a class="logout_btn" href="logout.php">Logout</a>

				<?php

			} 
			
			else 

			{

				?>

				<li>

					<a href="home/register.php">Register</a>

				</li>

				<li>

					<a href="home/login.php">Login</a>

				</li>

				<?php

			}
			
			?>




			

		</ul>

	</nav>

	<div>
		
		<img class="my_cover" src="cover.png">

	</div>

	<div>
		<h3 class="p_title">Products</h3>
	</div>

	

	<div class="my_card">


		<?php

		while ($row=mysqli_fetch_assoc($result))
		{

			?>

			<div class="card">

				<img class="p_image" src="product_image/<?php echo $row['image'] ?>">
				<h4><?php echo $row['title'] ?></h4>

				<p> <?php echo $row['description'] ?> </p>
				<p>Price : <?php echo $row['price'] ?></p>

				<?php

				if($_SESSION['user_email'])

				{

					?>

					<a href="my_order.php?id=<?php echo $row['id'] ?>&email=<?php echo $_SESSION['user_email'] ?>">Buy now</a>

					<?php
				}

				else
				{

					?>
					<a href="home/login.php">Buy now</a>

					<?php

				}

				?>



			</div>

			<?php
		}

		?>
		

		



		

		<div class="footer">

			<div class="footer_title">
				<h3>My Ecom</h3>
			</div>

			<div class="footer_content">

				<div>
					<h4>Services</h4>

					<p>
						<a href="#">Web Development</a>
					</p>

					<p>
						<a href="#">App Development</a>
					</p>

					<p>
						<a href="#">Digital Marketing</a>
					</p>
				</div>

				

				<div>
					<h4>Social links</h4>

					<p>
						<a href="#">Facebook</a>
					</p>

					<p>
						<a href="#">Instagram</a>
					</p>

					<p>
						<a href="#">X</a>
					</p>
				</div>


				<div>
					<h4>Quick Links</h4>

					<p>
						<a href="#">Home</a>
					</p>

					<p>
						<a href="#">Products</a>
					</p>

					<p>
						<a href="#">Contact</a>
					</p>

					<p>
						<a href="#">Register</a>
					</p>

					<p>
						<a href="#">Login</a>
					</p>
				</div>




				<div>
					<h4>Location</h4>

					<p>
						Address(street, house number)
					</p>

					<p>
						Email : myecom@gmail.com
					</p>

					<p>
						Phone : +998711234567
					</p>
				</div>
			</div>

			<footer>
				<hr/>
				<h3>Copyright @webtech Knowledge 2030</h3>
			</footer>


		</div>

	</body>
	</html>

