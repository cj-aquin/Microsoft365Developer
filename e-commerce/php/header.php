<?php
require_once 'connection.php';

// Query to get all items from the cart
$sql_cart = "SELECT * FROM cart";
$all_cart = $conn->query($sql_cart);

// Count the number of rows in the cart
$cart_item_count = $all_cart ? mysqli_num_rows($all_cart) : 0;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/header.css">
    <title>Header</title>
</head>
<body>
    <header>
        <!-- Logo with a link to the homepage -->
        <h1>
            <a href="home.php">
                <img src="../pics/1logo.png" alt="Logo" style="width: 115px; height: 67px;">
            </a>
        </h1>

        <!-- Main navigation tabs with images only (stacked vertically) -->
        <nav id="main_tabs">
            <a href="upload.php">
                <img src="../pics/upload-icon.png" alt="Upload" style="width: 30px; height: 30px;">
            </a>
            <a href="home.php">
                <img src="../pics/products-icon.png" alt="Products" style="width: 30px; height: 30px;">
            </a>

            <!-- Cart link with item count and image icon -->
            <a href="cart.php">
                <img src="../pics/cart-icon.png" alt="Cart" style="width: 50px; height: 25px;">
                <span id="badge"><?php echo htmlspecialchars($cart_item_count, ENT_QUOTES, 'UTF-8'); ?></span>
            </a>


            <a href="workout_plans.php">
                <img src="../pics/workout-icon.png" alt="Workout Plans" style="width: 30px; height: 30px;">
            </a>
            <a href="support.php">
                <img src="../pics/support-icon.png" alt="Support" style="width: 30px; height: 30px;">
            </a>
            
          
        </nav>
    </header>
</body>
</html>
