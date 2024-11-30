<?php
require_once "connection.php"; // Include the database connection
$signup_message = "";

if (isset($_POST['sign-in'])) {
    // Get data from form
    $uname = $_POST['username'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];
    $pword = $_POST['password'];

 

    // Convert gender value to char
    if ($gender == 'male') {
        $gender = 'M';
    } elseif ($gender == 'female') {
        $gender = 'F';
    } else {
        $gender = 'O'; // Handle "other" gender
    }

    // Begin database transaction
    mysqli_begin_transaction($conn);

    try {
        // Prepare the SQL queries
        $sql_user_account = "INSERT INTO user_account (username, password, email) VALUES ('$uname', '$pword', '$email')";
        error_log("SQL for user_account: $sql_user_account");  // Log query for debugging
        if (!mysqli_query($conn, $sql_user_account)) {
            throw new Exception("Error inserting into user_account: " . mysqli_error($conn));
        }

        // Get the u_id from the user_account table
        $u_id = mysqli_insert_id($conn);

        // Insert into customer_profile table
        $sql_customer_profile = "INSERT INTO customer_profile (name, gender, ua_id) VALUES ('$name', '$gender', '$u_id')";
        

        if (!mysqli_query($conn, $sql_customer_profile)) {
            throw new Exception("Error inserting into customer_profile: " . mysqli_error($conn));
        }

        // Commit the transaction
        mysqli_commit($conn);

        $signup_message = "Sign-up Successful!";
        echo "
            <script>
            setTimeout(function(){
                window.location.href = 'home.php';
            }, 2000);
            </script>";
    } catch (Exception $e) {
        // Rollback transaction if an error occurs
        mysqli_rollback($conn);
        $signup_message = "Failed to sign up: " . $e->getMessage();
    }

    // Close the database connection
    mysqli_close($conn);
}
?>











<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stylish Registration Page - GymFit</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">

    <!-- Font Awesome for Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <link rel="stylesheet" href="../css/sign_up.css">
</head>

<body>
    <div class="register-container">
        <div class="register-left fade-in">
            <h2 class="fade-in">SIGN UP</h2>
            <!--Display the sign-up message -->
            <?php if (!empty($signup_message)): ?>
                <div class="alert alert-info">
                    <?php echo $signup_message; ?>
                </div>
                <?php endif; ?>
            <form action="sign_up.php" method="POST">
                <div class="mb-3 fade-in">
                    <input type="text" class="form-control" id="username" name="username" placeholder="Username" required>
                </div>
                <div class="mb-3 fade-in">
                    <input type="text" class="form-control" id="name" name="name" placeholder="Full Name" required>
                </div>
                <div class="mb-3 fade-in">
                    <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
                </div>
                <div class="mb-3 gender-dropdown fade-in">
                    <select class="form-control" id="gender" name="gender" required>
                        <option value="" disabled selected>Select Gender</option>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                        <option value="other">Other</option>
                    </select>
                </div>
                <div class="mb-3 position-relative fade-in">
                    <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                    <i id="togglePassword" class="fa-solid fa-eye password-toggle"></i>
                </div>
                <div class="mb-3 position-relative fade-in">
                    <input type="password" class="form-control" id="confirmPassword" name="confirmPassword" placeholder="Confirm Password"
                        required>
                    <i id="toggleConfirmPassword" class="fa-solid fa-eye password-toggle"></i>
                </div>
                <div class="form-check fade-in">
                    <input class="form-check-input" type="checkbox" id="terms" required>
                    <label class="form-check-label" for="terms">I agree to the terms & conditions</label>
                </div>
                <button type="submit" name="sign-in" class="btn btn-primary fade-in">Register</button>
            </form>
        </div>

        <div class="register-right fade-in">
            <img src="../pics/logo .png" alt="GymFit Logo" class="img-fluid fade-in"
                style="width: 120px; margin-bottom: 1rem;">
            <h2 class="welcome-text fade-in">JOIN GYMFIT TODAY!</h2>
            <p class="signup-link fade-in">Already have an account?</p>
            <button class="btn btn-outline-light oval-button fade-in" onclick="window.location.href='login.php'">Log
                In</button>
        </div>
    </div>

    <script>
        // Toggle password visibility for the password fields
        const passwordInput = document.getElementById('password');
        const togglePassword = document.getElementById('togglePassword');
        const confirmPasswordInput = document.getElementById('confirmPassword');
        const toggleConfirmPassword = document.getElementById('toggleConfirmPassword');

        togglePassword.addEventListener('click', () => {
            const type = passwordInput.type === 'password' ? 'text' : 'password';
            passwordInput.type = type;
            togglePassword.classList.toggle('fa-eye', type === 'password');
            togglePassword.classList.toggle('fa-eye-slash', type === 'text');
        });

        toggleConfirmPassword.addEventListener('click', () => {
            const type = confirmPasswordInput.type === 'password' ? 'text' : 'password';
            confirmPasswordInput.type = type;
            toggleConfirmPassword.classList.toggle('fa-eye', type === 'password');
            toggleConfirmPassword.classList.toggle('fa-eye-slash', type === 'text');
        });
    </script>
</body>

</html>