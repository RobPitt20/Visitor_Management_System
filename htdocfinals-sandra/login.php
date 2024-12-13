<?php
session_start();
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Check if user exists
    $sql = "SELECT * FROM users WHERE email = '$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        // Verify password
        if (password_verify($password, $row['password'])) {
            $_SESSION['user_id'] = $row['id'];
            header("Location: http://localhost/htdocfinals2/homepage.php");
            exit();
        } else {
            echo "Invalid password.";
        }
    } else {
        echo "No user found with that email.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Login Page</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<style>
    body {
        position: relative;
        overflow: hidden;
        background: linear-gradient(45deg, #F5F5DC 25%, #FFFFFF 50%, #F5F5DC 75%); /* Cream to white gradient */
        background-size: 400% 400%; /* For smoother background animation */
        animation: moveBackground 10s ease infinite; /* Slow-moving background animation */
        font-family: Arial, sans-serif; /* Arial font */
    }

    @keyframes moveBackground {
        0% {
            background-position: 0% 50%;
        }
        50% {
            background-position: 100% 50%;
        }
        100% {
            background-position: 0% 50%;
        }
    }

    .header {
        background-color: #39204C; /* Purple header */
        color: white;
        padding: 20px 0; /* Padding for header */
        text-align: center;
    }

    .container-login {
        border-radius: 15px; /* Curved container */
        padding: 40px; /* Padding for the login box */
        box-shadow: 0 0 60px rgba(0, 0, 0, 0.2);
        background: white; /* White background for the login box */
        margin-top: 20px; /* Space between header and login box */
    }

    .icon {
        font-size: 3rem;
    }

    .form-control {
        border-radius: 25px; /* Curved edges for the input boxes */
        margin-bottom: 20px; /* Space between fields */
    }

    .btn-login {
        background-color: #76A3C8; /* Blue background for Login button */
        color: white; /* White text for Login button */
        border-radius: 25px; /* Rounded button */
        padding: 12px 30px; /* Padding for better size */
        font-size: 1.1rem; /* Larger text */
    }

    .btn-login:hover {
        background-color: #5a7a96; /* Darker blue on hover */
    }

    .btn-forgot {
        color: #76A3C8; /* Blue color for Forgot Password link */
    }

    .btn-signup {
        color: red; /* Sign Up button color */
    }

    .btn-login-wrapper {
        margin: 0.25in; /* Very thin margin around the login button */
        background-color: #333B72; /* Outer margin color */
        padding: 5px;
        border-radius: 30px; /* Rounded container around the login button */
        width: auto; /* Shorter width to make it not too long */
    }

    .text-muted a {
        text-decoration: none;
    }

    .text-muted a:hover {
        text-decoration: underline;
    }

    .text-center p {
        font-size: 1rem;
    }

    /* Custom Styling for WELCOME and "Don't have an account?" */
    .welcome-text {
        font-weight: bold;
        font-size: 2rem;
        color: #333; /* Dark color for the WELCOME text */
    }

    .account-text {
        font-weight: bold;
        color: black; /* Black color for the account text */
    }

    .sign-up-link {
        font-weight: bold;
        color: #2D5477; /* Sign up link color */
    }

    .welcome-footer {
        font-weight: bold;
        font-size: 1.1rem;
        color: black; /* For the whole text under WELCOME */
    }

</style>
</head>
<body>
<div class="header">
<h1>VISITOR MANAGEMENT SYSTEM</h1> <!-- Purple header -->
</div>
 
<div class="container mt-5">
<div class="row justify-content-center">
<div class="col-md-8"> <!-- Increased column size -->
<div class="container-login">
<div class="text-center">
<h3 class="welcome-text">WELCOME</h3> <!-- Changed "Login" to "WELCOME" -->
<!-- Under WELCOME -->
<p class="welcome-footer">
<span class="account-text">Don't have an account? </span> 
<a href="register.php" class="sign-up-link">Sign Up and Register</a>
</p>
</div>
<div class="card-body">
<form method="POST" action="login.php">
    <div class="form-group">
        <label for="email">Email</label>
        <input type="text" class="form-control" id="email" name="email" placeholder="Enter your email">
    </div>
    <div class="form-group">
        <label for="password">Password</label>
        <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password">
    </div>
    <div class="form-group form-check">
        <input type="checkbox" class="form-check-input" id="rememberMe" name="rememberMe">
        <label class="form-check-label" for="rememberMe">Remember Me</label>
    </div>
    <div class="btn-login-wrapper">
        <button type="submit" class="btn btn-login btn-block"> <href="http://localhost/htdocfinals2/homepage.php">Login</button>
    </div>
</form>
 
                    <!-- Outer margin box with color -->

 
                <div class="text-center">
<p class="text-muted"><a href="forgot_password.php" class="btn-forgot">Forgot Password?</a></p>
</div>
</div>
</div>
</div>
</div>
</body>
</html>
