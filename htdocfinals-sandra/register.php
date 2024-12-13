<?php
// Include the database connection
require_once($_SERVER['DOCUMENT_ROOT'] . '/htdocfinals2/htdocfinals-sandra/config.php');

// Include PHPMailer files
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader (if using Composer)
require 'vendor/autoload.php';

// Check if the database connection was established
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Sanitize the inputs to prevent SQL injection
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = $_POST['password'];
    $confirm_password = $_POST['confirmPassword'];

    // Validate that the passwords match
    if ($password !== $confirm_password) {
        echo "Passwords do not match!";
        exit;
    }

    // Hash the password for security
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Check if the username or email already exists
    $check_sql = "SELECT * FROM users WHERE username = ? OR email = ?";
    if ($stmt = $conn->prepare($check_sql)) {
        // Bind parameters to the prepared statement
        $stmt->bind_param("ss", $username, $email);
        $stmt->execute();
        $result = $stmt->get_result();

        // If a user with the same username or email exists
        if ($result->num_rows > 0) {
            echo "Username or Email already taken!";
            exit;
        } else {
            // Insert the new user into the database
            $insert_sql = "INSERT INTO users (username, email, password) VALUES (?, ?, ?)";
            if ($stmt = $conn->prepare($insert_sql)) {
                // Bind parameters for the insert query
                $stmt->bind_param("sss", $username, $email, $hashed_password);
                if ($stmt->execute()) {
                    // Send a success email
                    try {
                        // PHPMailer configuration
                        $mail = new PHPMailer(true);

                        // Server settings
                        $mail->isSMTP();                                            // Set mailer to use SMTP
                        $mail->Host       = 'smtp.gmail.com';                         // Gmail SMTP server
                        $mail->SMTPAuth   = true;                                     // Enable SMTP authentication
                        $mail->Username   = 'ghesandra.editor@gmail.com';                // Your Gmail email address
                        $mail->Password   = 'zdwe czjk hhfh qrol';                    // Your Gmail App Password (16 characters)
                        $mail->SMTPSecure = 'tls';                                    // Enable TLS encryption
                        $mail->Port       = 587;                                      // Port 587 for TLS encryption

                        // Recipients
                        $mail->setFrom('ghesandra.editor@gmail.com', 'Visitor System');
                        $mail->addAddress($email, $username);                         // Add a recipient

                        // Content
                        $mail->isHTML(true);                                          // Set email format to HTML
                        $mail->Subject = "Registration Successful!";
                        $mail->Body    = "
                            <html>
                                <head>
                                    <title>Registration Successful</title>
                                    <style>
                                        /* Add styles for the email */
                                        body {
                                            font-family: Arial, sans-serif;
                                            background-color: #f4f4f4;
                                            margin: 0;
                                            padding: 0;
                                        }
                                        .email-container {
                                            width: 100%;
                                            max-width: 600px;
                                            margin: 0 auto;
                                            background-color: #fff;
                                            border: 1px solid #ddd;
                                            border-radius: 10px;
                                            overflow: hidden;
                                        }
                                        .email-header {
                                            background-color: #6a1b9a; /* Purple color */
                                            color: white;
                                            padding: 20px;
                                            text-align: center;
                                            font-size: 24px;
                                            font-weight: bold;
                                        }
                                        .email-body {
                                            padding: 30px;
                                            font-size: 18px;
                                            color: #333;
                                        }
                                        .email-body p {
                                            line-height: 1.6;
                                        }
                                        .email-footer {
                                            background-color: #f4f4f4;
                                            text-align: center;
                                            padding: 20px;
                                            font-size: 14px;
                                            color: #888;
                                        }
                                        .btn {
                                            background-color: #6a1b9a; /* Purple color */
                                            color: white; /* White text */
                                            padding: 12px 24px;
                                            text-decoration: none;
                                            font-size: 18px;
                                            border-radius: 5px;
                                            display: inline-block;
                                            margin-top: 20px;
                                            text-align: center;
                                            width: 100%;
                                        }
                                        .btn:hover {
                                            background-color: #8e24aa; /* Darker purple on hover */
                                        }
                                    </style>
                                </head>
                                <body>
                                    <div class='email-container'>
                                        <div class='email-header'>
                                            Welcome to Visitor System!
                                        </div>
                                        <div class='email-body'>
                                            <p>Hi " . htmlspecialchars($username) . ",</p>
                                            <p>Thank you for registering with our Visitor Management System!</p>
                                            <p>Your account has been successfully created. You can now log in to your account and manage your visits.</p>
                                            <p>To get started, simply click the button below to log in:</p>
                                            <a href='http://localhost/htdocfinals/login.php' class='btn'>Go to Login</a>
                                            <p>If you have any questions or issues with logging in, feel free to reply to this email, and we will assist you as soon as possible.</p>
                                            <p>Thanks again for joining our system. We look forward to your visits!</p>
                                        </div>
                                        <div class='email-footer'>
                                            <p>&copy; " . date("Y") . " Visitor System. All rights reserved.</p>
                                            <p>Visitor Management Team</p>
                                        </div>
                                    </div>
                                </body>
                            </html>";

                        // Send the email
                        $mail->send();
                    } catch (Exception $e) {
                        echo "Error sending confirmation email: " . $mail->ErrorInfo;
                    }

                    // Registration successful, redirect to register_process.php with success status
                    header('Location: register_process.php?status=success');
                    exit;
                } else {
                    echo "Error: " . $stmt->error;
                }
            }
        }
    } else {
        echo "Error with checking the username or email: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Page</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f5f5dc;
            font-family: Arial, sans-serif;
        }
        .header {
            background-color: #39204C;
            color: white;
            padding: 20px;
        }
        .header h1 {
            margin: 0;
        }
        .card {
            border-radius: 20px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }
        .card-header {
            background-color: #39204C;
            color: white;
        }
        .form-control {
            border-radius: 25px;
            margin-bottom: 15px;
        }
        .btn-register {
            background-color: #76A3C8;
            color: white;
            border-radius: 25px;
            padding: 12px 30px;
            font-size: 1.1rem;
        }
    </style>
</head>
<body>
    <!-- Header Section -->
    <div class="header">
        <h1>VISITOR MANAGEMENT SYSTEM</h1>
    </div>

    <!-- Main Registration Form Section -->
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header text-center">
                        <h3><strong>Sign Up and Register</strong></h3>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="register.php">
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" class="form-control" name="username" id="username" placeholder="Enter your username" required>
                            </div>
                            <div class="form-group">
                                <label for="email">Email Address</label>
                                <input type="email" class="form-control" name="email" id="email" placeholder="Enter your email address" required>
                            </div>
                            <div class="form-group">
                                <label for="password">Set Your Password</label>
                                <input type="password" class="form-control" name="password" id="password" placeholder="Set your password" required>
                            </div>
                            <div class="form-group">
                                <label for="confirmPassword">Re-enter Your Password</label>
                                <input type="password" class="form-control" name="confirmPassword" id="confirmPassword" placeholder="Confirm your password" required>
                            </div>
                            <button type="submit" class="btn btn-register btn-block">Register</button>
                        </form>
                    </div>
                    <div class="card-footer text-muted">
                        <p>Already have an account? <a href="login.php">Log In</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
