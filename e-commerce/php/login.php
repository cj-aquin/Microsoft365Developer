<?php
require_once "connection.php";
session_start();

$login_message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

   // Check if login form was submitted
    if (isset($_POST['login'])) {
        $username = $_POST['email'];
        $password = $_POST['password'];

        // Query to check if user exists
        $sql = "SELECT * FROM user_account WHERE email = ? AND password = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $username, $password);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            // Login successful
            $login_message = "Login successful. Welcome!";
            echo "
            <script>
            setTimeout(function(){
                window.location.href = 'home.php';
            }, 2000);
            </script>";
   

        } else {
            // Invalid credentials
            $login_message = "Invalid email or password.";
        }
    }

}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stylish Login Page - GymFit</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">

    <!-- Font Awesome for Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <link rel="stylesheet" href="../css/login.css">
</head>

<body>

    <div class="login-container">
        <!-- Left Side - Sign In Form -->
        <div class="login-left">
            <h2>Log in</h2>

                <!-- Display the login message here-->
                <?php if (!empty($login_message)): ?>
                    <div class="alert alert-info">
                        <?php echo $login_message; ?>
                </div>
                <?php endif; ?>

            <form action="login.php" method="POST">
                <div class="mb-3 position-relative">
                    <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
                    <i class="fa-solid fa-envelope position-absolute"
                        style="top: 50%; right: 15px; transform: translateY(-50%);"></i>
                </div>
                <div class="mb-3 position-relative">
                    <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                    <i id="togglePassword" class="fa-solid fa-eye password-toggle"></i>
                </div>
                <div class="form-check text-start">
                    <input type="checkbox" class="form-check-input" id="staySignedIn">
                    <label class="form-check-label" for="staySignedIn">Stay signed in</label>
                </div>
                <button type="submit" class="btn btn-primary" name="login">Log In</button>
            </form>
            
            <div class="text-center mt-3">
                <a href="#" class="text-danger">Forgot Password?</a><br>
            </div>
        </div>

        <!-- Right Side - Welcome Message -->
        <div class="login-right">
            <div class="login-right-content">
                <img src="../pics/logo .png" alt="GymFit Logo" class="img-fluid"
                    style="width: 120px; margin-bottom: 1rem;">
                <h2 class="welcome-text">Welcome to GymFit!</h2>
                <p class="signup-link">Don't have an account?</p>
                <button class="btn btn-outline-light btn-small oval-button"
                    onclick="window.location.href='sign_up.php'">Sign Up</button>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>

    <script>
        const togglePassword = document.getElementById('togglePassword');
        const passwordInput = document.getElementById('password');

        togglePassword.addEventListener('click', function () {
            const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordInput.setAttribute('type', type);
            this.classList.toggle('fa-eye');
            this.classList.toggle('fa-eye-slash');
        });
    </script>

</body>

</html>