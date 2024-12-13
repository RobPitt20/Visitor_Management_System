<?php
// Include the database connection
require_once($_SERVER['DOCUMENT_ROOT'] . '/htdocfinals/config.php'); // Ensure the correct path to config.php

// Initialize alert message
$alert_message = '';

// Get the token from the URL
$reset_token = $_GET['token'] ?? ''; // If no token is passed, it will be empty.

if (empty($reset_token)) {
    $alert_message = "<div class='alert alert-danger' role='alert'>
                        <span class='emoji'>&#128577;</span>
                        Invalid reset request. No token provided.
                      </div>";
}

// Validate the token if it's set
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['new_password'], $_POST['confirm_password'], $_POST['confirm_reset'])) {
    $new_password = mysqli_real_escape_string($conn, $_POST['new_password']);
    $confirm_password = mysqli_real_escape_string($conn, $_POST['confirm_password']);
    $token = mysqli_real_escape_string($conn, $_GET['token']);

    // Check if the passwords match
    if ($new_password === $confirm_password) {
        // Check if the token exists and is not expired
        $sql = "SELECT * FROM users WHERE reset_token = ? AND reset_token_expiry > NOW()";
        if ($stmt = $conn->prepare($sql)) {
            $stmt->bind_param("s", $token);
            $stmt->execute();
            $result = $stmt->get_result();
            if ($result->num_rows > 0) {
                // Update the password
                $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
                $update_sql = "UPDATE users SET password = ?, reset_token = NULL, reset_token_expiry = NULL WHERE reset_token = ?";
                if ($stmt = $conn->prepare($update_sql)) {
                    $stmt->bind_param("ss", $hashed_password, $token);
                    $stmt->execute();
                    $alert_message = "<div class='alert alert-success' role='alert'>
                                        <span class='emoji'>&#128077;</span> 
                                        Your password has been successfully reset! <br>
                                        <a href='login.php'>Go to Login</a>
                                      </div>";
                }
            } else {
                $alert_message = "<div class='alert alert-danger' role='alert'>
                                    <span class='emoji'>&#128577;</span> 
                                    Invalid or expired reset token.
                                  </div>";
            }
        }
    } else {
        $alert_message = "<div class='alert alert-danger' role='alert'>
                            <span class='emoji'>&#128577;</span> 
                            Passwords do not match. Please try again.
                          </div>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body { 
            background-color: #f5f5dc; 
            font-family: Arial, sans-serif; 
        }

        .header { 
            background-color: #39204C; 
            color: white; 
            padding: 20px 0; 
            text-align: center; 
            margin-bottom: 20px; 
        }

        .container { 
            margin-top: 20px; 
        }

        .card { 
            border-radius: 20px; 
            box-shadow: 0px 0px 30px rgba(0, 0, 0, 0.2); 
            max-width: 600px; 
            margin: auto; 
            padding: 30px; 
        }

        .card-header { 
            background-color: #39204C; 
            color: white; 
            padding: 20px; 
            text-align: center; 
        }

        .card-body { 
            background-color: white; 
            padding: 40px; 
            text-align: center; 
        }

        .form-group label { 
            font-size: 1.2rem; 
        }

        .btn-reset { 
            background-color: #39204C; 
            color: white; 
            font-size: 1.2rem; 
            padding: 15px; 
        }

        .alert { 
            font-size: 1.2rem; 
            text-align: center; 
            padding: 20px;
            border-radius: 8px;
        }

        .alert-danger { 
            background-color: #f8d7da; 
            color: #721c24; 
        }

        .alert-success { 
            background-color: #d4edda; 
            color: #155724; 
        }
    </style>
</head>
<body>

<!-- Header Section -->
<div class="header">
    <h1>Reset Your Password</h1>
</div>

<!-- Main Container -->
<div class="container">
    <!-- Display Alert Message -->
    <?php if ($alert_message != '') { echo $alert_message; } ?>

    <!-- Reset Password Form -->
    <div class="card">
        <div class="card-header">
            <h3>Set New Password</h3>
        </div>
        <div class="card-body">
            <form method="POST" action="">
                <div class="form-group">
                    <label for="new_password">New Password</label>
                    <input type="password" class="form-control" id="new_password" name="new_password" required>
                </div>
                <div class="form-group">
                    <label for="confirm_password">Confirm Password</label>
                    <input type="password" class="form-control" id="confirm_password" name="confirm_password" required>
                </div>
                <div class="form-group form-check">
                    <input type="checkbox" class="form-check-input" id="confirm_reset" name="confirm_reset" required>
                    <label class="form-check-label" for="confirm_reset">Are you sure you want to reset your password?</label>
                </div>
                <button type="submit" class="btn btn-reset btn-block">Reset Password</button>
            </form>
        </div>
    </div>

</div>

</body>
</html>
