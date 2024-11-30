<?php

require_once 'connection.php';

// Query to fetch all items in the cart
$sql_cart = "SELECT * FROM cart";
$all_cart = $conn->query($sql_cart);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="font/css/all.min.css">
    <link rel="stylesheet" href="../css/cart.css">
    <title>In Cart Products</title>
</head>
<body>
    <?php include_once 'header.php'; ?>

    <main>
        <h1><?php echo mysqli_num_rows($all_cart); ?> Items in Your Cart</h1>
        <hr>
        <?php
        while ($row_cart = mysqli_fetch_assoc($all_cart)) {
            // Fetch product details from the product table using item_id
            $sql = "SELECT * FROM items WHERE item_id = " . $row_cart["item_id"];
            $all_product = $conn->query($sql);
            while ($row = mysqli_fetch_assoc($all_product)) {
        ?>
        <div class="card">
            <div class="images">
                <img src="<?php echo $row["product_image"]; ?>" alt="Product Image">
            </div>

            <div class="caption">
                <p class="rate">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </p>
                <p class="product_name"><?php echo $row["item_name"]; ?></p>
                <p class="price"><b>₱<?php echo $row["item_price"]; ?></b></p>
                <!-- Removed the discount part -->
                <button class="remove" data-id="<?php echo $row["item_id"]; ?>">Remove from Cart</button>
            </div>
        </div>
        <?php
            }
        }
        ?>
    </main>

    <script>
        var removeButtons = document.getElementsByClassName("remove");
        for (var i = 0; i < removeButtons.length; i++) {
            removeButtons[i].addEventListener("click", function(event) {
                var target = event.target;
                var item_id = target.getAttribute("data-id"); // Use item_id

                // Send AJAX request to remove the item from the cart
                var xml = new XMLHttpRequest();
                xml.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        // On success, update the button text and opacity
                        target.innerHTML = this.responseText;
                        target.style.opacity = 0.3; // Fade out removed item button
                    }
                };

                // Send the item_id to remove it from the cart
                xml.open("GET", "cancel.php?item_id=" + item_id, true);
                xml.send();
            });
        }
    </script>
</body>
</html>
