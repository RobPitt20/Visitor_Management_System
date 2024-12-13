<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Include Composer autoload file
require 'vendor/autoload.php';

session_start(); // Start session
include 'db.php'; // Include your database connection file

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Generate a random 6-digit PIN
    $pin = mt_rand(100000, 999999);
    
    // Store verification code in session
    $_SESSION['verification_code'] = $pin;

    // Validate email address
    if (isset($_SESSION['verification_email']) && filter_var($_SESSION['verification_email'], FILTER_VALIDATE_EMAIL)) {
        $to = $_SESSION['verification_email'];
        
        // Create a new PHPMailer instance
        $mail = new PHPMailer(true);
        try {
            // Set up SMTP
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com'; // SMTP server address
            $mail->SMTPAuth = true;
            $mail->Username = 'it2208.pura@gmail.com'; // Your Gmail address
            $mail->Password = 'ggszgowwyqhhbdqe'; // Your Gmail password or app password
            $mail->SMTPSecure = 'tls';
            $mail->Port = 587;
            $mail->SMTPOptions = array(
                'ssl' => array(
                    'verify_peer' => false,
                    'verify_peer_name' => false,
                    'allow_self_signed' => true
                )
            );

            // Set email content
            $mail->setFrom('it2208.pura@gmail.com', 'Coleen Pura'); // Your Gmail address and name
            $mail->addAddress($to); // Add recipient
            $mail->Subject = 'Verification Code';
            $mail->Body = "Your verification code is: $pin";

            // Send email
            $mail->send();
            echo "A verification code has been sent to your email address.";
        } catch (Exception $e) {
            echo "Failed to send verification code. Please try again later. Error: {$mail->ErrorInfo}";
        }
    } else {
        echo "Invalid email address.";
    }
}

// Redirect to registration page if email session variable is not set
if (!isset($_SESSION['verification_email'])) {
    header("Location: register.php");
    exit();
}

// Handle verification code submission
if (isset($_POST['verify'])) {
    $entered_code = $_POST['code'];
    $stored_code = $_SESSION['verification_code'];

    if ($entered_code == $stored_code) {
        // Verification successful, perform necessary actions (e.g., update database)
        echo "Verification successful!";
        // Clear session variables
        unset($_SESSION['verification_email']);
        unset($_SESSION['verification_code']);
    } else {
        // Verification failed
        echo "Invalid verification code. Please try again.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Email Verification</title>
</head>
<body>
    <h1>Email Verification</h1>
    <form action="" method="post">
        <label for="code">Enter verification code:</label>
        <input type="text" id="code" name="code" required>
        <button type="submit" name="verify">Verify</button>
    </form>
</body>
</html>
