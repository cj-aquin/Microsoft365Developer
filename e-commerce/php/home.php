<?php 
require_once 'connection.php';

// Query to fetch all products
$sql = "SELECT * FROM items";
$all_product = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="font/css/all.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <title>Ecommerce Website</title>
    <style>
 /* Modal Styles */
.modal {
    display: none; /* Hidden by default */
    position: fixed;
    z-index: 9999; /* Ensure the modal stays on top of other content */
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.5); /* Semi-transparent background */
    overflow: auto;
    padding-top: 60px;
}

/* Modal content */
.modal-content {
    background-color: #fff;
    margin: 5% auto;
    padding: 20px;
    border: 1px solid #888;
    width: 80%;
    max-width: 400px;
    text-align: center;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
}

/* Increase the font size of the message */
#modalMessage {
    font-size: 2rem !important;  /* Make text large */
    font-weight: bold;
    color: #333; /* Adjust text color */
}

/* Modal success/failure styles */
.modal-content.success {
    background-color: #d4edda;
    color: #155724;
}

.modal-content.failure {
    background-color: #f8d7da;
    color: #721c24;
}

/* Close button styles */
.close {
    color: #aaa;
    font-size: 28px;
    font-weight: bold;
    position: absolute;
    right: 15px;
    top: 5px;
}

.close:hover,
.close:focus {
    color: black;
    text-decoration: none;
    cursor: pointer;
}
      
    </style>
</head>
<body>

    <div class="search-bar"> 
        <input type="text" placeholder="Search Products">
    </div>

    <?php include_once 'header.php'; ?>

    <main>
        <?php
        while ($row = mysqli_fetch_assoc($all_product)) {
            ?>
            <div class="card">
                <div class="image">
                    <img src="<?php echo $row["product_image"]; ?>" alt="">
                </div>
                <div class="caption">
                    <p class="rate">
                        <?php for ($i = 0; $i < 10; $i++) echo '<i class="fas fa-star"></i>'; ?>
                    </p>
                    <p class="item_name"><?php echo $row["item_name"]; ?></p>
                    <p class="item_price"><b>₱<?php echo $row["item_price"]; ?></b></p>
                </div>
                <button class="add" data-id="<?php echo $row["item_id"]; ?>">Add to cart</button>
            </div>
        <?php
        }
        ?>
    </main>

    <!-- Modal for success/failure message -->
    <div id="addToCartModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <p id="modalMessage">Product added to cart</p>
        </div>
    </div>

    <script>
        // JavaScript to handle adding product to cart
        document.querySelectorAll('.add').forEach(button => {
            button.addEventListener('click', function() {
                const itemId = this.getAttribute('data-id');

                // Send AJAX request to add the product to the cart
                const xhr = new XMLHttpRequest();
                xhr.open('POST', 'cart.php', true);
                xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                xhr.onload = function() {
                    const modal = document.getElementById('addToCartModal');
                    const modalMessage = document.getElementById('modalMessage');
                    const modalContent = document.querySelector('.modal-content');

                    if (xhr.status == 200) {
                        // Show success message in the modal
                        modalMessage.innerText = 'Product added to cart';
                        modalContent.classList.remove('failure');
                        modalContent.classList.add('success');
                    } else {
                        // Show failure message in the modal
                        modalMessage.innerText = 'Failed to add to cart';
                        modalContent.classList.remove('success');
                        modalContekmlnt.classList.add('failure');
                    }
                    
                    modal.style.display = 'block'; // Show the modal
                };
                xhr.send('item_id=' + itemId);
            });
        });

        // Close the modal when the "x" is clicked
        document.querySelector('.close').addEventListener('click', function() {
            document.getElementById('addToCartModal').style.display = 'none';
        });

        // Close the modal when clicked outside of the modal content
        window.onclick = function(event) {
            if (event.target === document.getElementById('addToCartModal')) {
                document.getElementById('addToCartModal').style.display = 'none';
            }
        };
    </script>

</body>
</html>
