<?php

// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$db_name = "gym-fit_dp"; // Ensure this is your correct database name

$conn = new mysqli($servername, $username, $password, $db_name);

// Check if database connection is successful
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Add to cart logic
if (isset($_POST["item_id"])) {
    $item_id = $_POST["item_id"];

    // Check if item is already in the cart
    $sql = "SELECT * FROM cart WHERE item_id = $item_id";
    $result = $conn->query($sql);

    // Query to get the total number of items in the cart
    $total_cart = "SELECT * FROM cart";
    $total_cart_result = $conn->query($total_cart);
    $cart_num = mysqli_num_rows($total_cart_result);

    if (mysqli_num_rows($result) > 0) {
        // If item is already in the cart
        $in_cart = "already in cart";
        echo json_encode(["num_cart" => $cart_num, "in_cart" => $in_cart]);
    } else {
        // Insert item into the cart
        $insert = "INSERT INTO cart(item_id) VALUES($item_id)";
        if ($conn->query($insert) === TRUE) {
            $in_cart = "added to cart";
            echo json_encode(["num_cart" => $cart_num, "in_cart" => $in_cart]);
        } else {
            echo json_encode(["error" => "Failed to insert item into cart"]);
        }
    }
}

// Remove item from cart logic
if (isset($_POST["cart_id"])) {
    $item_id = $_POST["cart_id"];

    // Remove item from cart
    $sql = "DELETE FROM cart WHERE item_id = $item_id";

    if ($conn->query($sql) === TRUE) {
        echo "Removed from cart";
    } else {
        echo "Error removing from cart: " . $conn->error;
    }
}

?>
