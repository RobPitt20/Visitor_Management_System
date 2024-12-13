<?php
// Include the database connection
require_once($_SERVER['DOCUMENT_ROOT'] . '/htdocfinals/config.php'); // Ensure the correct path to config.php

// Include PHPMailer files
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader (if using Composer)
require 'vendor/autoload.php';

// Initialize the alert message
$alert_message = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Sanitize the email input to prevent SQL injection
    $email = mysqli_real_escape_string($conn, $_POST['email']);

    // Check if the email exists in the database
    $check_sql = "SELECT * FROM users WHERE email = ?";
    if ($stmt = $conn->prepare($check_sql)) {
        // Bind parameters to the prepared statement
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        // If no user with that email, show the error message
        if ($result->num_rows === 0) {
            $alert_message = "<div class='alert alert-danger' role='alert'>
                                <span class='emoji'>&#128577;</span> 
                                Uh-oh! We couldn’t find an account with that email. Double-check and give it another go!
                              </div>";
        } else {
            // If email exists, generate a reset token
            $user = $result->fetch_assoc();
            $reset_token = bin2hex(random_bytes(16)); // Generate a unique token
            
            // Store the token in the database with an expiration time (e.g., 1 hour)
            $expires = date("Y-m-d H:i:s", strtotime("+1 hour"));
            $update_token_sql = "UPDATE users SET reset_token = ?, reset_token_expiry = ? WHERE email = ?";
            if ($stmt = $conn->prepare($update_token_sql)) {
                $stmt->bind_param("sss", $reset_token, $expires, $email);
                $stmt->execute();
                
                // Send the reset email to the user
                $reset_link = "new_password.php" . $reset_token;
                $subject = "Password Reset Request";
                $message = "
                    <html>
                    <head>
                        <title>Password Reset Request</title>
                    </head>
                    <body>
                        <p>Hello " . htmlspecialchars($user['username']) . ",</p>
                        <p>A request has been received to change your password to your account. If you did not request this, please ignore this email.</p>
                        <p>To reset your password, click the link below:</p>
                        <p><a href='" . $reset_link . "' style='background-color: #39204C; color: white; padding: 10px 20px; text-decoration: none;'>RESET PASSWORD</a></p>
                        <p>If you have any questions, please contact support.</p>
                    </body>
                    </html>";

                // Send the email using PHPMailer
                $mail = new PHPMailer(true);

                try {
                    // Server settings
                    $mail->isSMTP();                                            // Set mailer to use SMTP
                    $mail->Host       = 'smtp.gmail.com';                         // Gmail SMTP server
                    $mail->SMTPAuth   = true;                                     // Enable SMTP authentication
                    $mail->Username   = 'system.bsit04@gmail.com';                // Your Gmail email address
                    $mail->Password   = 'wcfm rzpo idpd ywsr';                    // Your Gmail App Password (16 characters)
                    $mail->SMTPSecure = 'tls';                                    // Enable TLS encryption
                    $mail->Port       = 587;                                      // Port 587 for TLS encryption

                    // Recipients
                    $mail->setFrom('system.bsit04@gmail.com', 'Visitor System');
                    $mail->addAddress($email, $user['username']);                 // Add a recipient

                    // Content
                    $mail->isHTML(true);                                          // Set email format to HTML
                    $mail->Subject = $subject;
                    $mail->Body    = $message;

                    // Send the email
                    $mail->send();
                    $alert_message = "<div class='alert alert-success' role='alert'>
                                        <span class='emoji'>&#128077;</span> 
                                        Email found! A reset link has been sent to your email address.
                                      </div>";
                } catch (Exception $e) {
                    $alert_message = "<div class='alert alert-danger' role='alert'>
                                        <span class='emoji'>&#128577;</span> 
                                        There was an issue sending the reset email. Please try again later. Error: {$mail->ErrorInfo}
                                      </div>";
                }
            }
        }
    } else {
        $alert_message = "<div class='alert alert-danger' role='alert'>
                            <span class='emoji'>&#128577;</span> 
                            There was an error processing your request. Please try again later.
                          </div>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
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
            background-color: #76A3C8; 
            color: white; 
            border-top-left-radius: 20px; 
            border-top-right-radius: 20px; 
            padding: 20px; 
            text-align: center; 
        }

        .card-body { 
            background-color: white; 
            border-bottom-left-radius: 20px; 
            border-bottom-right-radius: 20px; 
            padding: 40px; 
            text-align: center; 
        }

        .form-group label { 
            font-size: 1.2rem; 
        }

        .btn-send { 
            background-color: #39204C; 
            color: white; 
            font-size: 1.2rem; 
            padding: 15px; 
        }

        .alert { 
            font-size: 1.2rem; 
            text-align: center; 
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 10px;
            padding: 20px;
            border-radius: 8px;
            margin-bottom: 20px;
            transition: all 0.3s ease;
        }

        .alert-danger { 
            background-color: #f8d7da; 
            color: #721c24; 
            border: 1px solid #f5c6cb;
        }

        .alert-success { 
            background-color: #d4edda; 
            color: #155724; 
            border: 1px solid #c3e6cb;
        }

        .emoji {
            font-size: 2rem;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>VISITOR MANAGEMENT SYSTEM</h1>
    </div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Forgot Password</h4>
                    </div>
                    <div class="card-body">
                        <!-- Display the alert message -->
                        <?php echo $alert_message; ?>

                        <p>Please enter your registered email address. If it's not registered, please check the email address you entered.</p>
                        
                        <form method="POST" action="">
                            <div class="form-group">
                                <label for="email">Email Address</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>
                            <button type="submit" class="btn btn-send btn-block">Send</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
