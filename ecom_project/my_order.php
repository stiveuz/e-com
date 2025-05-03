<?php
session_start();

$conn = mysqli_connect("localhost", "root", "", "php_ecom");

if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());
}

if (isset($_GET['email']) && isset($_GET['id'])) {
	$_SESSION['user_email'] = $_GET['email'];
	$p_id = $_GET['id'];
    $u_email = $_GET['email']; // to'g'rilandi

    // Mahsulot ma'lumotlarini olish
    $p_sql = "SELECT * FROM products WHERE id = '$p_id'";
    $p_result = mysqli_query($conn, $p_sql);
    $p_row = mysqli_fetch_assoc($p_result);

    if ($p_row) {
    	$p_title = $p_row['title'];
    	$p_price = $p_row['price'];
        $p_image = $p_row['image']; // bu yerda o'zgaruvchi nomi $p_image bo'lishi kerak

        // Foydalanuvchi ma'lumotlarini olish
        $u_sql = "SELECT * FROM users WHERE email = '$u_email'";
        $u_result = mysqli_query($conn, $u_sql);
        $u_row = mysqli_fetch_assoc($u_result);

        if ($u_row) {
        	$u_name = $u_row['name'];
        	$u_email = $u_row['email'];
        	$u_phone = $u_row['phone'];
        	$u_address = $u_row['address'];
        	$status = "In progress";

            // Buyurtmani kiritish
        	$order_sql = "INSERT INTO orders(title, price, image, username, email, phone, address, status) 
        	VALUES ('$p_title', '$p_price', '$p_image', '$u_name', '$u_email', '$u_phone', '$u_address', '$status')";

        	$order_result = mysqli_query($conn, $order_sql);

        	if ($order_result) {
        		header("Location: user_order.php");
        		exit;
        	} else {
        		echo "Buyurtma bazaga qo‘shilmadi: " . mysqli_error($conn);
        	}
        } else {
        	echo "Foydalanuvchi topilmadi.";
        }
    } else {
    	echo "Mahsulot topilmadi.";
    }
} else {
	echo "Email yoki ID uzatilmagan.";
}
?>
