<?php

require_once 'connection.php';

// Check if item_id is provided to remove the item from the cart
if (isset($_GET["item_id"])) {
    $item_id = $_GET["item_id"];

    // Remove the item from the cart using item_id
    $sql = "DELETE FROM cart WHERE item_id = $item_id";

    if ($conn->query($sql) === TRUE) {
        echo "Removed from cart";
    } else {
        echo "Error removing item from cart: " . $conn->error;
    }
}

?>
